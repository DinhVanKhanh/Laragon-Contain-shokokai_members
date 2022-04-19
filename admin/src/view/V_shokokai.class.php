<?php
    if (!session_id()) 
        session_start();

    require_once __DIR__ . "/../../config/database.class.php";

    $Conn = new Database;

    //公開フラグ, カテゴリーNo., 短縮タイトル, 正式タイトル, 解説, アラートメッセージ, コメント, 
    //リンク先URL, 別ウィンドウ区分, 画像1, 画像2, TOP非表示, FREE, 簿記9, 簿記10, 簿記11, JA9, JA10, JA11, JA接続キット, 日誌6, 日誌6P

    $col = [
        0 => "ID",
        1 => "member-id",
        2 => "member-status",
        3 => "member-comment"
    ];

    $status = [
        0 => '0:ソリマチ社員',
        1 => '1:都道府県連 職員',
        2 => '2:商工会 職員',
        3 => '3:(未定)'
    ];


    $query  = "SELECT * FROM skkstaff_member";
    //search
    if(!empty($_POST["search"]["value"])){
        $arr = explode(":",$_POST["search"]["value"]);
            switch ($arr[0]) {
                case 'member-id':
                    $query .= ' WHERE `member-id` = "' . $arr[1] . '"';
                    break;
                case 'member-status':
                    $query .= ' WHERE `member-status` = "' . $arr[1] . '"';
                    break;
                case 'member-comment':
                    $query .= ' WHERE `member-comment` LIKE "%' . $arr[1] . '%"';
                    break;
                default:
                    break;
            }
    }

    //order
    if (isset($_POST["order"]) ) {
        $query .= " ORDER BY `" . $col[$_POST["order"]["0"]['column']]."` " . $_POST["order"]["0"]['dir'];
        $count_query = $query;
        // $query .= "ORDER BY `ID` ASC";
    }else{
        $query .= " ORDER BY `ID` ASC ";
    }
    
    if($_POST["length"] != -1){
        $query .= " LIMIT " . $_POST["start"]. " ," . $_POST["length"];
    }

    $stmt = $Conn->conn->prepare($query);
    $stmt->execute();
    $row = $stmt->rowCount();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //calculation paging
    $totalRecordsSql = $Conn->conn->prepare($count_query);
    $totalRecordsSql->execute();
    $rowTotal = $totalRecordsSql->rowCount();

    $data = [];
    foreach ($result as $value) {
        $sub = [];
        $sub[] = $value['ID'];
        $sub[] = $value['member-id'];
        $sub[] = $status[$value['member-status']];
        $sub[] = $value['member-comment'];
        

        $sub[] = '<div class="button_crud"><button type="button" class="btn btn-primary btnEdit" id="' . $value["ID"] . '" onclick="openDialog(this.id,true);" data-toggle="modal" data-target="#centralModalDanger">修正</button>
                 <button name="btnConfirmDel" onclick="testDel(this.value)" value="' . $value["ID"] . '" class="btn btn-primary btnDel btnConfirmDel btnConfirm1" data-toggle="modal" data-target="#modalDel">削除</button></div>';
        $data[] = $sub;
        
    }
    // set paging when search
    // if(!empty($_POST["search"]["value"]))
    //     $rowTotal = $row;

    $output = [
        "draw" => intval($_POST["draw"]),
        "recordsTotal" => intval($rowTotal),
        "recordsFiltered" => intval($rowTotal),
        "data" => $data,
        "POST" => $_POST,
        "row" => $row,
        "query" => $query,
        "query1" => $count_query,
        "stmt" => $stmt,
        "arr" => $_POST["search"]["value"],
        "arr1" => @$arr[1]
    ];

    echo json_encode($output);
?>