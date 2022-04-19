<?php
  require_once __DIR__ . '/../STFSApiAccess.php';
  global $STFSApiAccessURI, $STFSApiAccessID, $STFSApiAccessPW;

  // Connect API
  class db_API {
    // API接続先URI
    public $STFSApiAccessURI;

  // API接続 認証情報
  public $STFSApiAccessID;
  public $STFSApiAccessPW;
  
    const METHOD_GET = 0, METHOD_POST_ = 1, METHOD_PUT = 2, METHOD_DELETE = 3;

    function __construct() {
        $this->setConnect();
    }

    private function setConnect() {
        global $STFSApiAccessURI, $STFSApiAccessID, $STFSApiAccessPW;
        $this->STFSApiAccessURI = "http://192.168.3.25:80";
        $this->STFSApiAccessID  = "hp_server_id";
        $this->STFSApiAccessPW  = "hp_server_pass";
    }
  
    // データ取得
    function GetAPIData($api, $json, $request) {
      $port = (strpos($this->STFSApiAccessURI, ":") !== false) ? explode(":", $this->STFSApiAccessURI)[1] : "80";
      $port = (strpos($port, "/") !== false) ? explode("/", $this->STFSApiAccessURI)[0] : $port;
  
      $curl = curl_init();
      curl_setopt_array($curl, array(
          CURLOPT_PORT => $port,
          CURLOPT_URL => $this->STFSApiAccessURI."/api/".$api,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_CUSTOMREQUEST => $request,
          CURLOPT_POSTFIELDS => $json,
          CURLOPT_HTTPHEADER => array(
              "Accept: */*",
              "Cache-Control: no-cache",
              "Content-Type: application/json",
              "Host: ".str_replace(array("http://", "https://"), "", $this->STFSApiAccessURI),
              "X-Authorization: ".base64_encode($this->STFSApiAccessID.":".$this->STFSApiAccessPW)),
              "X-HTTP-Method-Override: ".$request
      ));
  
      $response = json_decode(curl_exec($curl), true);
      $err = curl_error($curl);
      curl_close($curl);
      return ($err) ? "Error #:".$err : $response;
    }

    // function sql( $param, $method ) {
    //     $i = 0;
    //     $total = count( $param );
    //     while ( $i < $total ) {

    //     }
    // }

    // function getData( $api, $param ) {

    // }

    // function postData( $api, $param ) {
    //     $request = "";
    //     $total = count( $param );
    //     for ( $i = 0; $i < $total; $i++ ) {

    //     }
    //     return $request;
    // }

    // function updateData() {

    // }

    // function deleteData() {

    // }
    
    function prepareRequest($data, $request) {
      $i = 0;
      $sql = '"no":1';
      foreach ($data as $field => $value) {
          $sql .= ($i != 0 || $request != "GET") ? "," : "";
          $sql .= "'{$field}':".((is_array($value)) ? "[{".$this->prepareRequest($value, $request)."}]" : "'{$value}'");
          $i++;
      }
      return $sql;
    }
    
    function RequestData($API, $data, $request, $check = false) {
      $req = "{'{$API}':[{".$this->prepareRequest($data, $request)."}]".(($check === false) ? "" : ",'check':1")."}";
      return str_replace("'", '"', $req);
    }
    
    function ResponseData($API, $data, $request, $check = false) {
      return $this->GetAPIData($API, $this->RequestData($API, $data, $request, $check), $request);
    }
    
    function GetListField($res, &$listData, $field, $parr = "") {
      if (($field == "error" || $field == "err_msg") && 
          $parr == "" && count($res) == 2 && $res["message"] != "") {
          $listErr[] = $res["message"];
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
              $this->GetListField($val, $listData, $field, $parr);
          }
          elseif ($key == $field) {
              $listData[] = $val;
          }
      }
    }
  }
?>
