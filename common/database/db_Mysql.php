<?php
    // // Connect Mysql
    // class db_Mysql {
    //   protected $Conn;
    //   function __construct($host, $user, $pass, $dbname) {
    //     $this->Conn = mysqli_connect($host, $user, $pass, $dbname);
    //     mysqli_set_charset($this->Conn, "utf8");
    //     if (!$this->Conn) {
    //         die("Connect Error");
    //     }
    //   }

    //   function execute($strSQL) {
    //     return mysqli_query($this->Conn, $strSQL);
    //   }

    //   // データが存在するかチェック
    //   function hasRecord($strSQL) {
    //     $result = mysqli_query($this->Conn, $strSQL);
    //     if ($result == false || mysqli_num_rows($result) < 1) {
    //         return false;
    //     }
    //     mysqli_free_result($result);
    //     return true;
    //   }

    //   // 件数取得
    //   function getNumRows($strSQL) {
    //     $result = mysqli_query($this->Conn, $strSQL);
    //     $rows = 0;
    //     if ($result != false) {
    //         $rows = mysqli_num_rows($result);
    //     }
    //     return $rows;
    //   }

    //   // 該当するレコード取得
    //   function getRow($strSQL) {
    //     $result = mysqli_query($this->Conn, $strSQL);
    //     if ($result == false || mysqli_num_rows($result) < 1) {
    //         return false;
    //     }
    //     $res = mysqli_fetch_array($result);
    //     mysqli_free_result($result);
    //     return $res;
    //   }

    //   // Get List Data
    //   function getListRow($strSQL, $fields = "", $FetchMode="MYSQL_BOTH") {
    //     // MYSQL_ASSOC, MYSQL_NUM, and MYSQL_BOTH.
    //     $result = execute($strSQL);
    //     if ($result == false || mysqli_num_rows($result) < 1) {
    //         return false;
    //     }

    //     if ($fields != "") {
    //       $i = 0;
    //       $field = explode(",", $fields);
    //     }

    //     while ($res = mysqli_fetch_array($result, $FetchMode)) {
    //       if ($fields != "") {
    //         foreach ($field as $value) {
    //           $data[$i][$value] = $res[$value];
    //         }
    //         $i++;
    //       }
    //       else {
    //         $data[$i] = $res;
    //       }
    //     }
    //     mysqli_free_result($result);
    //     return $data;
    //   }

    //   // SQL実施
    //   function sqlExec($strSQL) {
    //     mysqli_query($this->Conn, $strSQL);
    //     return mysqli_affected_rows($this->Conn);
    //   }

    //   /* Get Id */
    //   function getId($strSQL, $field) {
    //     $result = execute($strSQL);
    //     $sRet = "";

    //     while ($row = mysqli_fetch_array($result)) {
    //         $id = str_replace(' ', '', $row[$field]);
    //         $sRet .= ($sRet == "") ? $id : ",". $id;
    //     }
    //     mysqli_free_result($result);
    //     return $sRet;
    //   }

    //   function __destruct() {
    //     mysqli_close($this->Conn);
    //   }
    // }

    // Connect Mysql
    class db_Mysql {
      protected $Conn;
      function __construct($host, $user, $pass, $dbname) {
        try {
          $this->Conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
          $this->Conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $this->Conn->exec("set names 'utf8'");
        }
        catch (PDOException $e) {
          die($e->getMessage());
        }
      }

      // 件数取得
      function getNumRows($strSQL) {
        $stmt = $this->Conn->prepare($strSQL);
        $stmt->execute();
        return $stmt->rowCount();
      }

      // データが存在するかチェック
      function hasRecord($strSQL) {
        return ($this->getNumRows($strSQL) < 1) ? false : true;
      }

      // 該当するレコード取得
      function getRow($strSQL, $fetchMode=PDO::FETCH_BOTH) {
        if ($this->getNumRows($strSQL) < 1) {
            return false;
        }

        $stmt = $this->Conn->prepare($strSQL);
        $stmt->execute();
        $stmt->setFetchMode($fetchMode);
        return $stmt->fetch();
      }

      // Get List Data
      function getListRow($strSQL, $fetchMode=PDO::FETCH_BOTH) {
        if ($this->getNumRows($strSQL) < 1) {
            return false;
        }

        $stmt = $this->Conn->prepare($strSQL);
        $stmt->execute();
        $stmt->setFetchMode($fetchMode);
        return $stmt->fetchAll();
      }

      /* Get Id */
      function getId($strSQL, $fetchMode=PDO::FETCH_BOTH) {
        if ($this->getNumRows($strSQL) < 1) {
          return false;
        }

        $stmt = $this->Conn->prepare($strSQL);
        $stmt->execute();
        $stmt->setFetchMode($fetchMode);
        $listID = '';
        foreach ($stmt->fetchAll() as $id) {
          $listID .= ($listID == "") ? $id : ",$id";
        }
        return $listID;
      }

      // SQL実施
      function execute_edit($strSQL) {
        $stmt = $this->Conn->prepare($strSQL);
        $stmt->execute();
        return $stmt->rowCount();
      }

      function execMultiQuery($strSQLs) {
        try {
          $this->Conn->beginTransaction();
          $num = count($strSQLs);
          $d = 0;
          for ($i = 0; $i < $num; $i++) {
            $this->Conn->exec($strSQLs[$i]);
            $d++;
          }
          $this->Conn->commit();
          return $d;
        }
        catch (PDOException $e) {
          $this->Conn->rollBack();
          return end($this->Conn->errorInfo());
        }
      }

      function __destruct() {
        $this->Conn = null;
      }
    }

    require_once __DIR__ . '/../connect_db.php';
    // Host
    global $DB_SERVER_SERVICE_NAME;

    // Taiken
    global $NAME_TAIKEN_DB;
    global $USER_TAIKEN_DB;
    global $PASS_TAIKEN_DB;

    // Partner
    global $NAME_PARTNER_DB;
    global $USER_PARTNER_DB;
    global $PASS_PARTNER_DB;

    // Service db
    global $NAME_SERVICE_DB;
    global $USER_SERVICE_DB;
    global $PASS_SERVICE_DB;
    
    // -------------------- TAIKEN -------------------- //
    function dbTaiken() {
        global $DB_SERVER_SERVICE_NAME;
        global $NAME_TAIKEN_DB;
        global $USER_TAIKEN_DB;
        global $PASS_TAIKEN_DB;

          // AWS
        //  $DB_SERVER_SERVICE_NAME = 'mdb-hp-service.apn.mym.sorimachi.biz';
        //  $NAME_TAIKEN_DB = 'service_db';
        //  $USER_TAIKEN_DB = 'service_db_write';
        //  $PASS_TAIKEN_DB = 'daisuki60';
        
  //192.168.3.214        
   $DB_SERVER_SERVICE_NAME = '192.168.3.215';
         $NAME_TAIKEN_DB = 'service_db';
         $USER_TAIKEN_DB = 'service_user';
         $PASS_TAIKEN_DB = 'service_pass';


        $Conn = new db_Mysql( $DB_SERVER_SERVICE_NAME, $USER_TAIKEN_DB, $PASS_TAIKEN_DB, $NAME_TAIKEN_DB );
        return $Conn;
    }

    // -------------------- PARTNER -------------------- //
    function dbPartner() {
        global $DB_SERVER_SERVICE_NAME;
        global $NAME_PARTNER_DB;
        global $USER_PARTNER_DB;
        global $PASS_PARTNER_DB;
        $Conn = new db_Mysql( $DB_SERVER_SERVICE_NAME, $USER_PARTNER_DB, $PASS_PARTNER_DB, $NAME_PARTNER_DB );
        return $Conn;
    }

    // -------------------- SORIZO -------------------- //
    function dbSorizo() {
        global $DB_SERVER_SERVICE_NAME;
        global $NAME_SERVICE_DB;
        global $USER_SERVICE_DB;
        global $PASS_SERVICE_DB;
        $Conn = new db_Mysql( $DB_SERVER_SERVICE_NAME, $USER_SERVICE_DB, $PASS_SERVICE_DB, $NAME_SERVICE_DB );
        return $Conn;
    }
?>
