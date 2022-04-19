<?php
    require_once __DIR__ . "/webserver_flg.php";
    //*****************************************************************************
    //* ALL RIGHTS RESERVED. COPYRIGHT (C) 2019 ソリマチ株式会社
    //*****************************************************************************
    //* File Name    : STFSApiAccess.php
    //* Function     : TFP専用 API接続情報
    //* System Name  : SORIMACHI Websites
    //* Create       : K.Watanabe  2019/06/26
    //* Update       : 
    //* Comment      : 本ファイルは、TEST環境専用の設定です。
    //*****************************************************************************

    // API接続情報
    global $STFSApiAccessURI, $STFSApiAccessID, $STFSApiAccessPW;

    global $WEBSERVER_FLG;
    // $WEBSERVER_FLG = 1;
    switch ( $WEBSERVER_FLG ) {
        // AWS
        case 0:
            // API接続先URI
            $STFSApiAccessURI = "https://api.ot.tf-dev.sorimachi.me";

            // API接続 認証情報
            $STFSApiAccessID = "hp_api_id";
            $STFSApiAccessPW = "hp_api_pass";
            break;

        // 3.214
        case 1:
            // API接続先URI
            $STFSApiAccessURI = "http://192.168.3.25:80";

            // API接続 認証情報
            $STFSApiAccessID = "hp_server_id";
            $STFSApiAccessPW = "hp_server_pass";
            break;

        // Localhost
        default:
            // API接続先URI
            $STFSApiAccessURI = "http://192.168.3.25:80";
            // $STFSApiAccessURI = "https://api.ot.tf-dev.sorimachi.me"; //AWS開発環境

            // API接続 認証情報
            $STFSApiAccessID = "hp_server_id";
            $STFSApiAccessPW = "hp_server_pass";
            // $STFSApiAccessID = "hp_web_id"; //AWS開発環境
            // $STFSApiAccessPW = "hp_web_pass"; //AWS開発環境
            // $STFSApiAccessID = "sorimachi_id";
            // $STFSApiAccessPW = "sorimachi_pass";
            break;
    }

    // データ取得
    function GetAPIData($api, $json, $request) {
        global $STFSApiAccessURI;
        global $STFSApiAccessID;
        global $STFSApiAccessPW;
        $port = (strpos($STFSApiAccessURI, ":") !== false) ? explode(":", $STFSApiAccessURI)[1] : "80";
        $port = (strpos($port, "/") !== false) ? explode("/", $STFSApiAccessURI)[0] : $port;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_PORT => $port,
            CURLOPT_URL => $STFSApiAccessURI."/api/".$api,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $request,
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "Host: ".str_replace(array("http://", "https://"), "", $STFSApiAccessURI),
                "X-Authorization: ".base64_encode($STFSApiAccessID.":".$STFSApiAccessPW)),
                "X-HTTP-Method-Override: ".$request
        ));

        $response = json_decode(curl_exec($curl), true);
        $err = curl_error($curl);
        curl_close($curl);
        return ($err) ? "Error #:".$err : $response;
    }

    function prepareRequest($data, $request) {
        $i = 0;
        $sql = '"no":1';
        foreach ($data as $field => $value) {
            $sql .= ($i != 0 || $request != "GET") ? ',' : '';
            $sql .= '"'.$field.'":'.((is_array($value)) ? '[{'.prepareRequest($value, $request).'}]' : '"'.addslashes($value).'"');
            $i++;
        }
        return $sql;
    }

    function RequestData($API, $data, $request, $check = false) {
        $req = '{"'.$API.'":[{'.prepareRequest($data, $request).'}]'.(($check === false) ? '' : ',"check":1').'}';
        return $req;
    }

    // function ResponseData($API, $data, $request, $check = false) {
    //     return GetAPIData($API, RequestData($API, $data, $request, $check), $request);
    // }

    function GetListByField($res, &$listData, $field, $parr = "") {
        if (($field == "error" || $field == "err_msg") && 
            $parr == "" && count($res) == 2 && $res["message"] != "") {
            $listData[] = $res["message"];
            return;
        }
        if ($parr == $field) {
            foreach ($res as $val) {
                $listData[] = $val;
            }
            return;
        }
        foreach ($res as $key => $val) {
            if (is_array($val)) {
                $parr = ($key == "0") ? $parr : $key;
                GetListByField($val, $listData, $field, $parr);
            }
            elseif ($key == $field) {
                $listData[] = $val;
            }
        }
    }

    function GetFirstByField($res, $field, $parr = "") {
        if (($field == "error" || $field == "err_msg") && 
            $parr == "" && count($res) == 2 && $res["message"] != "") {
            return $res["message"];
        }
        if ($parr == $field) {
            return $res;
        }
        foreach ($res as $key => $val) {
            if (is_array($val)) {
                $parr = ($key == "0") ? $parr : $key;
                $val = GetFirstByField($val, $field, $parr);
                if ($val != "") {
                    return $val;
                }
            }
            elseif ($key == $field) {
                return $val;
            }
        }
        return "";
    }

    function GetSimpleField($API, $request, $where, $fields) {
        $isArray = (is_array($fields)) ? true : false;
        $str = ($isArray) ? implode(",", $fields) : $fields;
        $arr = (!$isArray && strpos($fields, ",") !== false) ? explode(",", str_replace(" ", "", $fields)) : $fields;
        $json = '{
                    "'.$API.'":{
                        "fields":"'.$str.'",
                        "query":"'.$where.'"
                    }'. (($API == "shin") ? ',"valid_fg" : "1" }' : '}');

        $res = GetAPIData($API, $json, $request);
        if ($isArray || is_array($arr)) {
            $ret = array();
            foreach ($arr as $val) {
                $ret[$val] = GetFirstByField($res, $val);
            }
            return $ret;
        }
        return GetFirstByField($res, $fields);
    }
?>