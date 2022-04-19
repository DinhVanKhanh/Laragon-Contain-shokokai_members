<?php 
    session_start();

    require_once $_SERVER['DOCUMENT_ROOT'] . "/../common_files/database/db_Mysql.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/../common_files/connect_db.php";
  

    if( !empty($_POST["kakutei"]) ){
        $_SESSION['kakutei'] = strtolower( $_POST["kakutei"] );
        $_SESSION['id'] = $_POST[ $_SESSION['kakutei'] . "-id" ] ?? "";
    }
    elseif( !empty($_POST["etax"]) ){
        $_SESSION['kakutei'] = strtolower( $_POST["etax"] );
        $_SESSION['id'] = $_POST[ $_SESSION['kakutei'] . "-id" ] ?? "";
    }

    $kakutei = strtolower( $_SESSION['kakutei'] );
    $id = $_SESSION['id'];
    $from = @$_GET['from'];
    if( empty($_SESSION['kakutei']) && empty($_POST["kakutei"]) && empty($from))
        die( "失敗したアクセス" );



    // checkData($kakutei, $id, $check_user);


    // function checkData($kakutei, $id, &$check_user){

    //     $conn = ConnectPartner();
    //     // $query_select = "SELECT * FROM id_${kakutei} where ${kakutei}_id = `$id`";
    //     $query_select = "SELECT * FROM id_${kakutei} where ${kakutei}_id = '" . $id . "'";
    //     $result = mysqli_query($conn, $query_select);  
    //     if ($result->num_rows < 1) 
    //      return $check_user = 0; 

    //     return $check_user = 1;
    // }


 ?>