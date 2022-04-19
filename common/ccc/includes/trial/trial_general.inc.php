<?php
    if ( session_id() == "" ) {
        session_start();
    }

    require_once __DIR__ . "/../../www_sorizo/lib/common.php";
    require_once __DIR__ . "/../../webserver_flg.php";
//　↓↓　＜2020/10/08＞　＜VinhDao＞　＜追加＞
    require_once __DIR__ . "/../../IPAdress.php";
//　↑↑　＜2020/10/08＞　＜VinhDao＞　＜追加＞
    global $SERVER_TRIAL_VERSION;

    require_once __DIR__ . "/../../database/db_Mysql.php";
    require_once __DIR__ . "/../../database/db_API.php";
    require_once __DIR__ . "/../../products_version.php";
    global $_prd_div_cd1, $_DownloadProductCategory, $_key_shin, $_DownloadProductName1, $_DownloadProductName2;
    $_prd_div_cd1 = $_DownloadProductCategory = $_key_shin = $_DownloadProductName1 = $_DownloadProductName2 = "";

    global $_prd_name, $_title;
    $_title    = "";
    $_prd_name = "【エラー：製品が選択されていません】";

    // フォーム内の必須項目に用いるデザインレイアウト部分を記述します
    define("__HissuKoumoku__", "<img src='/trial/assets/images_general/hissu_12px.gif'>&nbsp;");

    // 業務製品をダウンロードした場合の自動送信メールの内容
    $_send_mag_text = __DIR__ . "/../../mail-templete/trial_mag001.txt";

      // オペレーター名を取]
    // （漏れがないようにForm、Session、Cooki]の三段構えで…）
    $_trial_admin_operator = formatInput( $_POST["operator"] ?? '' );
    if ( $_trial_admin_operator == "" ) {
        $_trial_admin_operator = $_SESSION["AdminTrialLoginName"] ?? GetCookie("AdminTrialLogin", "Name");
    }

    // 製品コードからカテゴリーの値を取得します
    // 取得する値はafかbsのいずれかになります
    // 2010/08/27 現在
    $_from = formatInput( $_GET["from"] ?? '' );

    if ( !empty( $_GET["prd"] ) || !empty( $_POST["request_prd"] ) ) {
        $Conn = dbTaiken();
        $_prd_div_cd1 = !empty( $_GET["prd"] ) ? formatInput( $_GET["prd"] ) : formatInput( $_POST["request_prd"] );

        // GET Product Category
        $_DownloadProductCategory = $Conn->getRow("SELECT Prd_category FROM Trial_ProductMaster WHERE Prd_div_code1 = '{$_prd_div_cd1}'")["Prd_category"];
        if ( $_DownloadProductCategory == false ) {
            // header("location:http://".$_SERVER["HTTP_HOST"]."/trial/dl_inputform.php?from=srm", TRUE, 301);
            die( '製品が存在しません' );
        }

        // SMB製品では「30日無料版」の表記にすることにあわせ場合分け
        $_title = $_DownloadProductCategory == "bs" ? "30日無料版" : "無料体験版";

        // どの製品をダウンロードしようとしているかを判別しています
        // バージョンの値については別ファイル（以下）を使用しています
        // /products/lib/af_products.inc
        // /products_gyou/lib/bs_products.inc
        // ★★★注意してください！★★★
        //   バージョンが変わる場合、及び製品名を変更する場合には、
        //   体験版自動メール配信システムにも影響があります。
        //   APサーバー内の設定ファイルにも新しい製品名を追加するのを
        //   忘れないようにしてください。
        //   c:\sos\Bin\tvlsend\mm_tvlsend.ini
        switch ( $_prd_div_cd1 ) {
            case "accstd":
                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_accstd;
                $_DownloadProductName1 = "会計王" . $VER_TRIAL_accstd;
                $_DownloadProductName2 = $VER_TRIAL_accstd_addname;
                $_prd_name             = "会計ソフト「" . $_DownloadProductName1 . "" . $_DownloadProductName2 . "」";
                break;

            case "accnpo":
                // 12シリーズ以降
                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_accnpo;
                $_DownloadProductName1 = "会計王" . $VER_TRIAL_accnpo . "NPO法人スタイル";
                $_DownloadProductName2 = $VER_TRIAL_accnpo_addname;
                $_prd_name             = "NPO会計ソフト「" . $_DownloadProductName1 . "" . $_DownloadProductName2 . "」";
                break;

            case "acccar":
                // 12シリーズから
                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_acccar;
                $_DownloadProductName1 = "会計王" . $VER_TRIAL_acccar . "介護事業所スタイル";
                $_DownloadProductName2 = $VER_TRIAL_acccar_addname;
                $_prd_name             = "会計ソフト「" . $_DownloadProductName1 . "" . $_DownloadProductName2 . "」";
                break;

            case "accnet":
                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_accnet;
                $_DownloadProductName1 = "会計王" . $VER_TRIAL_accnet . "PRO";
                $_DownloadProductName2 = $VER_TRIAL_accnet_addname;
                $_prd_name             = "財務会計ソフト「" . $_DownloadProductName1 . "" . $_DownloadProductName2 . "」";
                break;

            case "accper":
                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_accper;
                $_DownloadProductName1 = "みんなの青色申告" . $VER_TRIAL_accper;
                $_DownloadProductName2 = $VER_TRIAL_accper_addname;
                $_prd_name             = "青色申告ソフト「" . $_DownloadProductName1 . "" . $_DownloadProductName2 . "」";
                break;

            case "psl":
                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_psl;
                $_DownloadProductName1 = "給料王" . $VER_TRIAL_psl;
                $_DownloadProductName2 = $VER_TRIAL_psl_addname;
                $_prd_name             = "給与計算ソフト「" . $_DownloadProductName1 . "" . $_DownloadProductName2 . "」";
                break;

            case "sal":
                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_sal;
                $_DownloadProductName1 = "販売王" . $VER_TRIAL_sal;
                $_DownloadProductName2 = $VER_TRIAL_sal_addname;
                $_prd_name             = "販売管理ソフト「" . $_DownloadProductName1 . " " . $_DownloadProductName2 . "」";
                break;

            case "spr":
                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_spr;
                $_DownloadProductName1 = "販売王" . $VER_TRIAL_spr . "販売・仕入・在庫";
                $_DownloadProductName2 = $VER_TRIAL_spr_addname;
                $_prd_name             = "販売管理ソフト「" . $_DownloadProductName1 . " " . $_DownloadProductName2 . "」";
                break;

            case "scl":
                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_scl;
                $_DownloadProductName1 = "顧客王" . $VER_TRIAL_scl;
                $_DownloadProductName2 = $VER_TRIAL_scl_addname;
                $_prd_name             = "顧客管理ソフト「" . $_DownloadProductName1 . " " . $_DownloadProductName2 . "」";
                break;

            case "nbk":
            //　↓↓　＜2020/10/06＞　＜VinhDao＞　＜修正＞
                // $_key_shin = $_prd_div_cd1 . $_ver_trial_nbk;
                // $_DownloadProductName1 = "農業簿記" . $_ver_trial_nbk;

                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_nbk;
                $_DownloadProductName1 = "農業簿記" . $VER_TRIAL_nbk;
            //　↑↑　＜2020/10/06＞　＜VinhDao＞　＜修正＞
                $_DownloadProductName2 = $VER_TRIAL_nbk_addname;
                $_prd_name             = "「" . $_DownloadProductName1 . "" . $_DownloadProductName2 . "」";
                break;

            case "nns":
                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_nns_cd;
                $_DownloadProductName1 = "農業日誌" . $VER_TRIAL_nns;
                $_DownloadProductName2 = $VER_TRIAL_nns_addname;
                $_prd_name             = "「" . $_DownloadProductName1 . "" . $_DownloadProductName2 . "」";
                break;

            case "gbk":
            //　↓↓　＜2020/10/06＞　＜VinhDao＞　＜修正＞
                // $_key_shin = $_prd_div_cd1 . $_ver_trial_gbk;
                // $_DownloadProductName1 = "漁業簿記" . $_ver_trial_gbk;

                $_key_shin = $_prd_div_cd1 . $VER_TRIAL_gbk;
                $_DownloadProductName1 = "漁業簿記" . $VER_TRIAL_gbk;
            //　↑↑　＜2020/10/06＞　＜VinhDao＞　＜修正＞
                $_DownloadProductName2 = $VER_TRIAL_gbk_addname;
                $_prd_name             = "「" . $_DownloadProductName1 . " " . $_DownloadProductName2 . "」";
                break;
        }
    }

    // 体験版お客様番号を削除する際に使用します。
    function GetReasonForDeleteUser( $DUFlag ) {
        switch ( $DUFlag ) {
            case 11:
                return "ソリマチの製品版を購入した";
            case 12:
                return "他社製品を購入した";
            case 13:
                return "体験版が不要になった";
            case 51:
                return "個人情報を削除（お客様からのご要望）";
            case 52:
                return "個人情報を削除（サポート管理者判断）";
            case 61:
                return "複数の体験版お客様番号を発行";
            case 62:
                return "登録内容に不備や問題がある為";
        }
    }

    // ログイン状態かどうかをチェックします。
    function CheckAdminTrialLogin() {
        if ( session_id() == "" ) {
            session_start();
        }

        global $SERVER_TRIAL_VERSION;
        if ( empty( $_SESSION["AdminTrialLoginID"] ) && empty( GetCookie("AdminTrialLogin", "ID") ) ) {
            header("location: " . $SERVER_TRIAL_VERSION . "/login.php?err=11");
        }
    }

    function formatInput( $data ) {
        $data = trim( $data );
        $data = stripslashes( $data );
        $data = htmlspecialchars( $data );
        return $data;
    }
	
	// 住所の半角->全角 変換
    function to2Byte($vars) {
    	return mb_convert_kana($vars, "ASKV");
    }
?>
