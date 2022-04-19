<?php
    require_once __DIR__ . "/webserver_flg.php";

    /////////////////////////////////////////////////////////////////////////////////////////
    // 
    // 各データベースへの接続情報
    // DBServer / Schema / User / Pass
    // 
    /////////////////////////////////////////////////////////////////////////////////////////

    // DBサーバー(service_db専用)のアドレス情報です。 2019/12/03 add;
    global $DB_SERVER_SERVICE_NAME;

    // DBサーバー(partner_db専用)のアドレス情報です。 2019/12/03 add;
    global $DB_SERVER_PARTNER_NAME;

    // CMS専用の、DBサーバーのアドレス情報です。
    global $DB_CMS_SERVER_NAME;

    // 各Schemaの接続情報です。
    // SERVICE
    global $NAME_SERVICE_DB;
    global $USER_SERVICE_DB;
    global $PASS_SERVICE_DB;

    // PARTNER
    global $NAME_PARTNER_DB;
    global $USER_PARTNER_DB;
    global $PASS_PARTNER_DB;

    // CMS_PARTNER
    global $NAME_CMS_PARTNER_DB;
    global $USER_CMS_PARTNER_DB;
    global $PASS_CMS_PARTNER_DB;

    // CMS_INFO
    global $NAME_CMS_INFO_DB;
    global $USER_CMS_INFO_DB;
    global $PASS_CMS_INFO_DB;

    // CMS_EVENT '旧DEMO、旧SEMINAR
    global $NAME_CMS_EVENT_DB;
    global $USER_CMS_EVENT_DB;
    global $PASS_CMS_EVENT_DB;

    // CMS_NEWSRELEASE
    global $NAME_CMS_NEWSRELEASE_DB;
    global $USER_CMS_NEWSRELEASE_DB;
    global $PASS_CMS_NEWSRELEASE_DB;

    // TRIALVERSION
    global $NAME_TRIALVERSION_DB;
    global $USER_TRIALVERSION_DB;
    global $PASS_TRIALCERSION_DB;

    // CAMPAIGN
    global $NAME_CAMPAIGN_DB;
    global $USER_CAMPAIGN_DB;
    global $PASS_CAMPAIGN_DB;

    // TAIKEN
    global $NAME_TAIKEN_DB;
    global $USER_TAIKEN_DB;
    global $PASS_TAIKEN_DB;

    // ユーザー登録
    global $NAME_TOUROKU_DB;
    global $USER_TOUROKU_DB;
    global $PASS_TOUROKU_DB;

    global $WEBSERVER_FLG;

    switch ( $WEBSERVER_FLG ) {
        // AWS
        case 0:
            // Host
            $DB_SERVER_SERVICE_NAME = $_ENV['DB_SERVER_SERVICE_NAME'] ?? '';
            $DB_SERVER_SERVICE_NAME = 'mdb-hp-service.apn.mym.sorimachi.biz';
            // $DB_SERVER_PARTNER_NAME = $_ENV['DB_SERVER_PARTNER_NAME'] ?? '';
            $DB_SERVER_PARTNER_NAME = "mdb-hp-wp.apn.mym.sorimachi.biz";
            $DB_CMS_SERVER_NAME     = $_ENV['DB_CMS_SERVER_NAME'] ?? '';

            // PARTNER
            $NAME_PARTNER_DB = "partner_db";
            $USER_PARTNER_DB = "partner_db_write";
            $PASS_PARTNER_DB = "daisuki60";
            
            // $NAME_SERVICE_DB = 'service_db';
            // $USER_SERVICE_DB = 'service_db_write';
            // $PASS_SERVICE_DB = 'daisuki60';

            // Service
            $NAME_SERVICE_DB = 'service_db';
            $USER_SERVICE_DB = 'service_db_write';
            $PASS_SERVICE_DB = 'daisuki60';

            // CMS_PARTNER
            $NAME_CMS_PARTNER_DB = $_ENV['NAME_CMS_PARTNER_DB'] ?? '';
            $USER_CMS_PARTNER_DB = $_ENV['USER_CMS_PARTNER_DB'] ?? '';
            $PASS_CMS_PARTNER_DB = $_ENV['PASS_CMS_PARTNER_DB'] ?? '';

            // CMS_INFO
            $NAME_CMS_INFO_DB = "cms_info_db";
            $USER_CMS_INFO_DB = "cms_info_user";
            $PASS_CMS_INFO_DB = "cms_info_pass";

            // CMS_EVENT '旧DEMO、旧SEMINAR
            $NAME_CMS_EVENT_DB = "cms_event_db";
            $USER_CMS_EVENT_DB = "cms_event_user";
            $PASS_CMS_EVENT_DB = "cms_event_pass";

            // CMS_NEWSRELEASE
            $NAME_CMS_NEWSRELEASE_DB = "cms_newsrelease_db";
            $USER_CMS_NEWSRELEASE_DB = "cms_newsrelease_user";
            $PASS_CMS_NEWSRELEASE_DB = "cms_newsrelease_pass";

            // TRIALVERSION
            $NAME_TRIALVERSION_DB = "trialversion_db";
            $USER_TRIALVERSION_DB = "trialversion_user";
            $PASS_TRIALVERSION_DB = "trialversion_pass";

            // CAMPAIGN
            $NAME_CAMPAIGN_DB = "campaign_db";
            $USER_CAMPAIGN_DB = "campaign_user";
            $PASS_CAMPAIGN_DB = "campaign_pass";

            // TAIKEN
            $NAME_TAIKEN_DB = $_ENV['NAME_SERVICE_DB'] ?? '';
            $USER_TAIKEN_DB = $_ENV['USER_SERVICE_DB'] ?? '';
            $PASS_TAIKEN_DB = $_ENV['PASS_SERVICE_DB'] ?? '';

            // ユーザー登録
            $NAME_TOUROKU_DB = $_ENV['NAME_SERVICE_DB'] ?? '';
            $USER_TOUROKU_DB = $_ENV['USER_SERVICE_DB'] ?? '';
            $PASS_TOUROKU_DB = $_ENV['PASS_SERVICE_DB'] ?? '';

            // ↓↓　<2020/06/19> <VinhDao> <Kakuteiのコネクトのバリューを設定しました。>
            // Kakutei
            $NAME_KAKUTEI_DB = $_ENV['NAME_SERVICE_DB'] ?? '';
            $USER_KAKUTEI_DB = $_ENV['USER_SERVICE_DB'] ?? '';
            $PASS_KAKUTEI_DB = $_ENV['PASS_SERVICE_DB'] ?? '';
            // ↑↑　<2020/06/19> <VinhDao> <Kakuteiのコネクトのバリューを設定しました。>
            break;

        // 3.214
        case 1:
            // Host
            $DB_SERVER_SERVICE_NAME = "192.168.3.215";
            $DB_SERVER_PARTNER_NAME = "192.168.3.215";
            $DB_SERVER_NAME         = "192.168.3.215";
            $DB_CMS_SERVER_NAME     = "192.168.3.215";

            // SERVICE
            $NAME_SERVICE_DB = "service_db";
            $USER_SERVICE_DB = "service_user";
            $PASS_SERVICE_DB = "service_pass";

            // PARTNER
            $NAME_PARTNER_DB = "partner_db";
            $USER_PARTNER_DB = "partner_user";
            $PASS_PARTNER_DB = "partner_pass";

            // CMS_PARTNER
            $NAME_CMS_PARTNER_DB = "cms_partner_db";
            $USER_CMS_PARTNER_DB = "cms_partner_user";
            $PASS_CMS_PARTNER_DB = "cms_partner_pass";

            // CMS_INFO
            $NAME_CMS_INFO_DB = "cms_info_db";
            $USER_CMS_INFO_DB = "cms_info_user";
            $PASS_CMS_INFO_DB = "cms_info_pass";

            // CMS_EVENT '旧DEMO、旧SEMINAR
            $NAME_CMS_EVENT_DB = "cms_event_db";
            $USER_CMS_EVENT_DB = "cms_event_user";
            $PASS_CMS_EVENT_DB = "cms_event_pass";

            // CMS_NEWSRELEASE
            $NAME_CMS_NEWSRELEASE_DB = "cms_newsrelease_db";
            $USER_CMS_NEWSRELEASE_DB = "cms_newsrelease_user";
            $PASS_CMS_NEWSRELEASE_DB = "cms_newsrelease_pass";

            // TRIALVERSION
            $NAME_TRIALVERSION_DB = "trialversion_db";
            $USER_TRIALVERSION_DB = "trialversion_user";
            $PASS_TRIALVERSION_DB = "trialversion_pass";

            // CAMPAIGN
            $NAME_CAMPAIGN_DB = "campaign_db";
            $USER_CAMPAIGN_DB = "campaign_user";
            $PASS_CAMPAIGN_DB = "campaign_pass";

            // TAIKEN
            $NAME_TAIKEN_DB = "service_db";
            $USER_TAIKEN_DB = "service_user";
            $PASS_TAIKEN_DB = "service_pass";

            // ユーザー登録
            $NAME_TOUROKU_DB = "service_db";
            $USER_TOUROKU_DB = "service_user";
            $PASS_TOUROKU_DB = "service_pass";

            // ↓↓　<2020/06/19> <VinhDao> <Kakuteiのコネクトのバリューを設定しました。>
            // Kakutei
            $NAME_KAKUTEI_DB = "service_db";
            $USER_KAKUTEI_DB = "service_user";
            $PASS_KAKUTEI_DB = "service_pass";
            // ↑↑　<2020/06/19> <VinhDao> <Kakuteiのコネクトのバリューを設定しました。>
            break;

        // Localhost
        default:
            // Host
            $DB_SERVER_SERVICE_NAME = $DB_SERVER_PARTNER_NAME = $DB_CMS_SERVER_NAME = "localhost";

            // SERVICE
            $NAME_SERVICE_DB = "service_db";
            $USER_SERVICE_DB = "root";
            $PASS_SERVICE_DB = "";

            // PARTNER
            $NAME_PARTNER_DB = "partner_db";
            $USER_PARTNER_DB = "root";
            $PASS_PARTNER_DB = "";

            // CMS_PARTNER
            $NAME_CMS_PARTNER_DB = "cms_partner_db";
            $USER_CMS_PARTNER_DB = "root";
            $PASS_CMS_PARTNER_DB = "";

            // CMS_INFO
            $NAME_CMS_INFO_DB = "cms_info_db";
            $USER_CMS_INFO_DB = "root";
            $PASS_CMS_INFO_DB = "";

            // CMS_EVENT '旧DEMO、旧SEMINAR
            $NAME_CMS_EVENT_DB = "cms_event_db";
            $USER_CMS_EVENT_DB = "root";
            $PASS_CMS_EVENT_DB = "";

            // CMS_NEWSRELEASE
            $NAME_CMS_NEWSRELEASE_DB = "cms_newsrelease_db";
            $USER_CMS_NEWSRELEASE_DB = "root";
            $PASS_CMS_NEWSRELEASE_DB = "";

            // TRIALVERSION
            $NAME_TRIALVERSION_DB = "trialversion_db";
            $USER_TRIALVERSION_DB = "root";
            $PASS_TRIALVERSION_DB = "";

            // CAMPAIGN
            $NAME_CAMPAIGN_DB = "campaign_db";
            $USER_CAMPAIGN_DB = "root";
            $PASS_CAMPAIGN_DB = "";

            // TAIKEN
            $NAME_TAIKEN_DB = "service_db";
            $USER_TAIKEN_DB = "root";
            $PASS_TAIKEN_DB = "";

            // ユーザー登録
            $NAME_TOUROKU_DB = "service_db";
            $USER_TOUROKU_DB = "root";
            $PASS_TOUROKU_DB = "";

            // ↓↓　<2020/06/19> <VinhDao> <Kakuteiのコネクトのバリューを設定しました。>
            // Kakutei
            $NAME_KAKUTEI_DB = "service_db";
            $USER_KAKUTEI_DB = "root";
            $PASS_KAKUTEI_DB = "";
            // ↑↑　<2020/06/19> <VinhDao> <Kakuteiのコネクトのバリューを設定しました。>
            break;
    }


    function ConnectDatabase( $host, $username, $password, $dbname ) {
                    // SERVICE
            $NAME_SERVICE_DB = "service_db";
            $USER_SERVICE_DB = "service_user";
            $PASS_SERVICE_DB = "service_pass";

        $Conn = mysqli_connect( $host, $username, $password, $dbname ) or die( "Connect Error" );
        // $Conn = mysqli_connect( '192.168.3.215', 'service_user', 'service_pass', 'service_db' ) or die( "Connect Error" );
        mysqli_set_charset( $Conn, "utf8" );
        return $Conn;
    }

    // -------------------- PARTNER -------------------- //
    function ConnectPartner() {
        global $DB_SERVER_PARTNER_NAME;
        global $NAME_PARTNER_DB;
        global $USER_PARTNER_DB;
        global $PASS_PARTNER_DB;
        return ConnectDatabase( $DB_SERVER_PARTNER_NAME, $USER_PARTNER_DB, $PASS_PARTNER_DB, $NAME_PARTNER_DB );
    }

    // -------------------- NEWSRELEASE -------------------- //
    function ConnectNewsRelease() {
        global $DB_SERVER_SERVICE_NAME;
        global $NAME_SERVICE_DB;
        global $USER_SERVICE_DB;
        global $PASS_SERVICE_DB;
        return ConnectDatabase( $DB_SERVER_SERVICE_NAME, $USER_SERVICE_DB, $PASS_SERVICE_DB, $NAME_SERVICE_DB );
    }

    // -------------------- FAQ -------------------- //
    function ConnectFAQ() {
        global $DB_SERVER_SERVICE_NAME;
        global $NAME_SERVICE_DB;
        global $USER_SERVICE_DB;
        global $PASS_SERVICE_DB;
        return ConnectDatabase( $DB_SERVER_SERVICE_NAME, $USER_SERVICE_DB, $PASS_SERVICE_DB, $NAME_SERVICE_DB );
    }

    // -------------------- SORIZO -------------------- //
    function ConnectSorizo() {
        global $DB_SERVER_SERVICE_NAME;
        global $NAME_SERVICE_DB;
        global $USER_SERVICE_DB;
        global $PASS_SERVICE_DB;
        return ConnectDatabase( $DB_SERVER_SERVICE_NAME, $USER_SERVICE_DB, $PASS_SERVICE_DB, $NAME_SERVICE_DB );
    }

    // -------------------- TAIKEN -------------------- //
    function ConnectTaiken() {
        global $DB_SERVER_SERVICE_NAME;
        global $NAME_TAIKEN_DB;
        global $USER_TAIKEN_DB;
        global $PASS_TAIKEN_DB;
        return ConnectDatabase( $DB_SERVER_SERVICE_NAME, $USER_TAIKEN_DB, $PASS_TAIKEN_DB, $NAME_TAIKEN_DB );
    }

    // -------------------- ユーザー登録 -------------------- //
    function ConnectTouroku() {
        global $DB_SERVER_SERVICE_NAME;
        global $NAME_TOUROKU_DB;
        global $USER_TOUROKU_DB;
        global $PASS_TOUROKU_DB;
        $DB_SERVER_SERVICE_NAME ;
        $NAME_TOUROKU_DB ;
        $USER_TOUROKU_DB ;
        $PASS_TOUROKU_DB ;
        // return ConnectDatabase( 'mdb-hp-service.apn.mym.sorimachi.biz', 'service_db', 'service_db', 'service_db' );
        // return ConnectDatabase( 'mdb-hp-service.apn.mym.sorimachi.biz', 'service_user', 'service_pass', 'service_db' );
        return ConnectDatabase( '192.168.3.215', 'service_user', 'service_pass', 'service_db' );

    }

    function ConnectDemo() {
        global $DB_SERVER_SERVICE_NAME;
        global $NAME_SERVICE_DB;
        global $USER_SERVICE_DB;
        global $PASS_SERVICE_DB;
        return ConnectDatabase( $DB_SERVER_SERVICE_NAME, $USER_SERVICE_DB, $PASS_SERVICE_DB, $NAME_SERVICE_DB );
    }

    function ConnectSeminar() {
        global $DB_SERVER_SERVICE_NAME;
        global $NAME_SERVICE_DB;
        global $USER_SERVICE_DB;
        global $PASS_SERVICE_DB;
        return ConnectDatabase( $DB_SERVER_SERVICE_NAME, $USER_SERVICE_DB, $PASS_SERVICE_DB, $NAME_SERVICE_DB );
    }

    // ↓↓　<2020/06/19> <VinhDao> <ConnectKakuteiの関数をついかしました。>
    function ConnectKakutei() {
        global $DB_SERVER_SERVICE_NAME;
        global $NAME_KAKUTEI_DB;
        global $USER_KAKUTEI_DB;
        global $PASS_KAKUTEI_DB;
        return ConnectDatabase( $DB_SERVER_SERVICE_NAME, $USER_KAKUTEI_DB, $PASS_KAKUTEI_DB, $NAME_KAKUTEI_DB );
    }
    // ↑↑　<2020/06/19> <VinhDao> <ConnectKakuteiの関数をついかしました。>

    // データが存在するかチェック
    function hasRecord($Conn, $strSQL) {
        $result = mysqli_query($Conn, $strSQL);
        if ($result === false || mysqli_num_rows($result) < 1) {
            return false;
        }
        mysqli_free_result($result);
        return true;
    }

    // 件数取得
    function getNumRows($Conn, $sql) {
        $result = mysqli_query($Conn, $sql);
        $rows = 0;
        if ($result != false) {
            $rows = mysqli_num_rows($result);
        }
        return $rows;
    }

    // 該当するレコード取得
    function getRow($Conn, $strSQL) {
        $result = mysqli_query($Conn, $strSQL);
        if ($result == false || mysqli_num_rows($result) < 1) {
            return false;
        }
        $res = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $res;
    }

    function getRows($Conn, $strSQL) {
        if ( getNumRows($Conn, $strSQL) < 1 ) {
            return false;
        }

        $result = mysqli_query($Conn, $strSQL);
        while ( $res = mysqli_fetch_assoc($result) ) {
            $data[] = $res;
        }
        mysqli_free_result($result);
        return $data;
    }

    // SQL実施
    function sqlExec($Conn, $strSQL) {
        mysqli_query($Conn, $strSQL);
        return mysqli_affected_rows($Conn);
    }

    /* Get Id */
    function getId($Conn, $sql, $field) {
        $result = mysqli_query($Conn, $sql);
        $sRet = "";

        while ($row = mysqli_fetch_assoc($result)) {
            $id = str_replace(' ', '', $row[$field]);
            $sRet .= ($sRet == "") ? $id : ",". $id;
        }
        mysqli_free_result($result);
        return $sRet;
    }
?>
