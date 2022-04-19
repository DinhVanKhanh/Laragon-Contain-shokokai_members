<?php
    if ( session_id() == "" ) {
        session_start();
    }
    require_once "/websites-data/common_files/database/db_Mysql.php";
    require_once "/websites-data/common_files/database/db_API.php";
    require_once "/websites-data/www_sorizo/lib/common.php";
    require_once  __DIR__."/products_version.php";
    global $_prd_div_cd1, $_DownloadProductCategory, $_key_shin, $_DownloadProductName1, $_DownloadProductName2;
    $_prd_div_cd1 = $_DownloadProductCategory = $_key_shin = $_DownloadProductName1 = $_DownloadProductName2 = "";

    global $_prd_name, $_title;
    $_title    = "";
    $_prd_name = "【エラー：製品が選択されていません】";

    // フォーム内の必須項目に用いるデザインレイアウト部分を記述します
    define("__HissuKoumoku__", "<img src='../../assets/images_general/hissu_12px.gif'>&nbsp;");

    // 業務製品をダウンロードした場合の自動送信メールの内容
    $_send_mag_text = "/template_mail/trial_mag001.txt";

    // 製品コードからカテゴリーの値を取得します
    // 取得する値はafかbsのいずれかになります
    // 2010/08/27 現在
    $_from = $_GET["from"];

    if ( ( isset( $_GET["prd"] ) && $_GET["prd"] != "" ) || ( isset( $_POST["request_prd"] ) && $_POST["request_prd"] != "" ) ) {
        $Conn = dbTaiken();
        $_prd_div_cd1 = isset( $_GET["prd"] ) ? $_GET["prd"] : $_POST["request_prd"];

        // GET Product Category
        $_DownloadProductCategory = $Conn->getRow("SELECT Prd_category FROM Trial_ProductMaster WHERE Prd_div_code1 = '{$_prd_div_cd1}'")["Prd_category"];
        if ( $_DownloadProductCategory == "" || $_DownloadProductCategory == false ) {
            header("Location:".$_SERVER["HTTP_HOST"]."/trial_version/dl_inputform.php?from=srm", TRUE, 301);
            return;
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
            case "acc":
                $_key_shin = 'accstd'.$_ver_trial;
                $_DownloadProductName1 = "会計王".$_ver_trial;
                $_prd_name             = "会計ソフト「".$_DownloadProductName1." ".$_DownloadProductName2."」";
                break;

            case "accnpo":
                // 12シリーズ以降
                $_key_shin = $_prd_dev_cd1.''.$_ver_trial;
                $_DownloadProductName1 = "会計王".$_ver_trial;
                $_DownloadProductName2 = "NPO法人スタイル";
                $_prd_name             = "NPO会計ソフト「".$_DownloadProductName1." ".$_DownloadProductName2." NPO法人スタイル」";
                break;

            case "acccar":
                // 12シリーズから
                $_key_shin = $_prd_dev_cd1.''.$_ver_trial;
                $_DownloadProductName1 = "会計王".$_ver_trial;
                $_DownloadProductName2 = "介護事業所スタイル";
                $_prd_name             = "会計ソフト「".$_DownloadProductName1." ".$_DownloadProductName2." 介護事業所スタイル」";
                break;

            case "accnet":
                $_key_shin = $_prd_dev_cd1.''.$_ver_trial;
                $_DownloadProductName1 = "会計王".$_ver_trial;
                $_DownloadProductName2 = "PRO";
                $_prd_name             = "財務会計ソフト「".$_DownloadProductName1." ".$_DownloadProductName2." PRO」";
                break;

            case "accper":
            case "min":
                $_key_shin = 'accper'.$_ver_trial_min;
                $_DownloadProductName1 = "みんなの青色申告".$_ver_trial_min;
                $_prd_name             = "青色申告ソフト「".$_DownloadProductName1." ".$_DownloadProductName2."」";
                break;

            case "psl":
                $_key_shin = $_prd_dev_cd1.''.$_ver_trial_psl;
                $_DownloadProductName1 = "給料王".$_ver_trial_psl;
                $_prd_name             = "給与計算ソフト「".$_DownloadProductName1." ".$_DownloadProductName2."」";
                break;

            case "sal":
                $_key_shin = $_prd_dev_cd1.''.$_ver_trial_sal;
                $_DownloadProductName1 = "販売王".$_ver_trial_sal;
                $_prd_name             = "販売管理ソフト「".$_DownloadProductName1." ".$_DownloadProductName2."」";
                break;

            case "spr":
                $_key_shin = $_prd_dev_cd1.''.$_ver_trial_sal;
                $_DownloadProductName1 = "販売王".$_ver_trial_sal;
                $_DownloadProductName2 = "販売・仕入・在庫";
                $_prd_name             = "販売管理ソフト「".$_DownloadProductName1." ".$_DownloadProductName2."」";
                break;

            case "scl":
                $_key_shin = $_prd_dev_cd1.''.$_ver_trial_sal;
                $_DownloadProductName1 = "顧客王".$_ver_trial_sal;
                $_prd_name             = "顧客管理ソフト「".$_DownloadProductName1." ".$_DownloadProductName2."」";
                break;

            case "nbk":
                $_key_shin = $_prd_dev_cd1.''.$_ver_trial_nbk;
                $_DownloadProductName1 = "農業簿記".$_ver_trial_nbk;
                $_prd_name             = "「".$_DownloadProductName1." ".$_DownloadProductName2."」";
                break;

            case "nns":
                $_key_shin = $_prd_dev_cd1.''.$_ver_trial_nns;
                $_DownloadProductName1 = "農業日誌".$_ver_trial_nns;
                $_prd_name             = "「".$_DownloadProductName1." ".$_DownloadProductName2."」";
                break;

            case "gbk":
                $_key_shin = $_prd_dev_cd1.''.$_ver_trial_gbk;
                $_DownloadProductName1 = "漁業簿記".$_ver_trial_gbk;
                $_prd_name             = "「".$_DownloadProductName1." ".$_DownloadProductName2."」";
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
        if ( $_SESSION["AdminTrialLoginAuthority"] == "" && GetCookie("AdminTrialLogin", "Authority") == "" ) {
            header("Location:192.168.3.214:8006/web-db/login.php?err=11");
        }
    }
?>
