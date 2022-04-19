<?php
    /////////////////////////////////////////////////////////////////////////////////////////
    // 
    // 【本サーバーおよびテストサーバーの判別をします】
    // WEBSERVER_FLG（0：本サーバー　1：テストサーバー）
    // 
    /////////////////////////////////////////////////////////////////////////////////////////

    // このサーバーはテストサーバーです。
    global $WEBSERVER_FLG;
    // $WEBSERVER_FLG = ( $_SERVER['SERVER_ADDR'] == '192.168.3.214' ) ? 1 : 0;

    if ($_SERVER['SERVER_ADDR'] == "192.168.3.214" || $_SERVER['SERVER_ADDR'] == "192.168.3.211")
        $WEBSERVER_FLG = 1;
    elseif ($_SERVER['SERVER_ADDR'] == "::1") 
        $WEBSERVER_FLG = 2;
    else {
        $WEBSERVER_FLG = 0;
    }

    // Localhost
    // $WEBSERVER_FLG = 3;

    // テストサーバー用の指定
    global $SORIMACHI_HOME;
    global $SORIMACHI_HOME_SSL;
    global $SORIMACHIWEB_HOME;
    global $SORIMACHIWEB_HOME_SSL;
    global $SORIMACHISCWEB_HOME;
    global $SORIZONET_HOME;
    global $SORIZONETSC_HOME;
    global $SERVER_URI_IMG_S3;
    global $IPAddressTokyo;
    global $IPAddressNagaoka;

    $SORIMACHI_HOME        = "http://www.sorimachi.co.jp/";
    $SORIMACHI_HOME_SSL    = "https://www.sorimachi.co.jp/";
    $SORIMACHISCWEB_HOME   = "http://192.168.3.214";
    $SORIZONET_HOME        = "http://192.168.3.214:8013";
    $SORIZONETSC_HOME      = "http://192.168.3.214:8013";
    $SERVER_URI_IMG_S3     = "http://dl1.sorimachi.co.jp";
    $IPAddressTokyo        = "192.168.8.";
    $IPAddressNagaoka      = $IPAddressSSC = "";

    switch ( $WEBSERVER_FLG ) {
        // AWS
        case 0:
            $SERVER_TRIAL           = "https://member.hp-sorimachi.mym.sorimachi.biz/trial";
            $SERVER_TRIAL_VERSION   = "https://adm-hp-tools.apn.mym.sorimachi.biz/trial_version";
            $SERVER_WEB_DB          = "https://adm-hp-tools.apn.mym.sorimachi.biz/web-db";
            $SERVER_FAQ             = "https://adm-hp-tools.apn.mym.sorimachi.biz/faq";
            $SERVER_NEWSRELEASE     = "https://adm-hp-tools.apn.mym.sorimachi.biz/news";
            $SERVER_USERTOUROKU     = "https://member.hp-sorimachi.mym.sorimachi.biz/reg";
            $SERVER_SORIZO          = "";
            $SERVER_PARTNER         = "https://partner.hp-sorimachi.mym.sorimachi.biz";
            $SERVER_SENSEI          = "";
            $SERVER_DEMO            = "https://info.hp-sorimachi.mym.sorimachi.biz/demo";
            $SERVER_SEMINAR         = "https://info.hp-sorimachi.mym.sorimachi.biz/seminar";
            $SERVER_SUPPORT         = "https://support.hp-sorimachi.mym.sorimachi.biz/";
            $SERVER_HOME            = "https://hp-sorimachi.mym.sorimachi.biz";
            $SERVER_DOWNLOAD_MEMBER = "https://member.hp-sorimachi.mym.sorimachi.biz";
            break;

        // 3.214
        case 1:
            $SERVER_TRIAL           = "http://192.168.3.214:8004/trial";
            $SERVER_TRIAL_VERSION   = "http://192.168.3.214:8006/trial_version";
            $SERVER_WEB_DB          = "http://192.168.3.214:8006/web-db";
            $SERVER_FAQ             = "http://192.168.3.214:8006/faq";
            $SERVER_NEWSRELEASE     = "http://192.168.3.214:8006/news";
            $SERVER_USERTOUROKU     = "http://192.168.3.214:8003/reg";
            $SERVER_SORIZO          = "http://192.168.3.214:8013";
            $SERVER_PARTNER         = "http://192.168.3.214:8001";
            $SERVER_SENSEI          = "http://192.168.3.214:8013/drm";
            $SERVER_DEMO            = "http://192.168.3.214:8011/demo";
            $SERVER_SEMINAR         = "http://192.168.3.214:8011/seminar";
            $SERVER_SUPPORT         = "http://192.168.3.214/";
            $SERVER_HOME            = "http://192.168.3.214:8010";
            $SERVER_DOWNLOAD_MEMBER = "http://192.168.3.214:8003";
            break;

        // Localhost
        default:
            $SERVER_TRIAL           = "http://localhost:8004/trial";
            $SERVER_TRIAL_VERSION   = "http://localhost:8006/trial_version";
            $SERVER_WEB_DB          = "http://localhost:8006/web-db";
            $SERVER_FAQ             = "http://localhost:8006/faq";
            $SERVER_NEWSRELEASE     = "http://localhost:8006/news";
            $SERVER_USERTOUROKU     = "http://localhost:8003/reg";
            $SERVER_SORIZO          = "http://localhost:8013";
            $SERVER_PARTNER         = "http://localhost:8001";
            $SERVER_SENSEI          = "http://localhost:8013/drm";
            $SERVER_DEMO            = "http://localhost:8011/demo";
            $SERVER_SEMINAR         = "http://localhost:8011/seminar";
            $SERVER_SUPPORT         = "http://localhost/";
            $SERVER_HOME            = "http://localhost:8010";
            $SERVER_DOWNLOAD_MEMBER = "http://localhost:8003";
            break;
    }

    // news-s
    global $DATAFILES_DIRECTORY;
    $DATAFILES_DIRECTORY = __DIR__ . '/../../';

    global $SRMWEB_DIRECTORY;
    $SRMWEB_DIRECTORY = "";

    // LOGS
    global $LOGFILES_DIRECTORY;
    $LOGFILES_DIRECTORY = __DIR__ . '/../../data/logs/';

    // faq-s
    global $FAQS_IMG;
    $FAQS_IMG = "/web-img-support/faq-s/prd/";
?>