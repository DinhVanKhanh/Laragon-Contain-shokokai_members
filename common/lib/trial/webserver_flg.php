<?php
    /////////////////////////////////////////////////////////////////////////////////////////
    // 
    // 【本サーバーおよびテストサーバーの判別をします】
    // WEBSERVER_FLG（0：本サーバー　1：テストサーバー）
    // 
    /////////////////////////////////////////////////////////////////////////////////////////

    // このサーバーはテストサーバーです。
    global $_webserver_flg;
    $_webserver_flg = 1;

    // テストサーバー用の指定
    global $_sorimachi_home, $_sorimachi_web_home;
    global $_sorimachi_web_home_ssl, $_sorimachi_sc_web_home_ssl, $_sorizonet_home, $_sorizonet_sc_home;
    global $_server_uri_img_s3, $_ip_addr_tokyo, $_ip_addr_nagaoka, $_ip_addr_ssc;


    $_sorimachi_home            = "http://www.sorimachi.co.jp/";
    $_sorimachi_web_home        = "http://192.168.3.214:8010";
    $_sorimachi_web_home_ssl    = "http://192.168.3.214:8010";
    $_sorimachi_sc_web_home_ssl = "http://192.168.3.214";
    $_sorizonet_home            = "http://192.168.3.214:8013";
    $_sorizonet_sc_home         = "http://192.168.3.214:8013";
    $_server_uri_img_s3         = "http://dl1.sorimachi.co.jp";
    $_ip_addr_tokyo             = "192.168.8.";
    $_ip_addr_nagaoka           = $_ip_addr_ssc = "";

    // news-s
    global $_data_file_direct;
    $_data_file_direct = "";

    global $_sorimachi_web_direct;
    $_sorimachi_web_direct = "";

    // LOGS
    global $_log_file_direct;
    $_log_file_direct = "";

    // faq-s
    global $_faqs_img;
    $_faqs_img = "/web-img-support/faq-s/prd";
?>