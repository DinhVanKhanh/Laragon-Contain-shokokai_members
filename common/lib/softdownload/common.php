<?php
// VinhDao パートナー（SAAG/SOSP/SOUP）会員サイト 修正↓
/////////////////////////////////////////////////////////////////////////////////////////
// 
// 【サービスパックにかかわる記述をまとめたファイルです】
//　2008-12-10 新規作成 (KWatanabe)
//　2008-12-25 修正：PDF(マニュアル等)の格納アドレスを追加
//　2009-08-13 修正：11シリーズを追加
//　2010-09-28 修正：12シリーズを追加
//　2011-10-01 修正：13シリーズを追加
//　2012-09-21 修正：14シリーズを追加
//　2013-09-19 修正：15シリーズを追加
//　2016-11-08 修正：18シリーズを追加
//　2016-05-19 修正：19シリーズを追加(暫定)
// 
//　$PRD_Name：製品名
//　$PRD_AbbrCode：iniファイルなどに書かれる製品の判別コード
//　$VERSION_No：製品の正式なバージョン表記
//　SP_No：サービスパックの番号
//　DATASIZE_SP：サービスパックのデータサイズ
//　DATASIZE_MN1：マニュアル１のデータサイズ
//　DATASIZE_MN2：マニュアル２のデータサイズ
// 
//　※将来的にはこのファイルを直せばすべてＯＫ…としたいのですが。
// 
/////////////////////////////////////////////////////////////////////////////////////////

    $PRODUCT_CODE_SP = $SP_DOWNLOAD_Directory = $PRD_Name = $PRD_AbbrCode = "";
    $VERSION_No = $SP_CODE_No = $DATASIZE_SP = $DATASIZE_MN1 = $DATASIZE_MN2 = "";
    $SP_DOWNLOAD_SERVER = $PRG_DOWNLOAD_SERVER = $PRG_DOWNLOAD_SERVER_AWS = "";
    // PHP移行check : Vietnam未使用 (2019/03/07 VinhDao)
    // $AdobeReaderDL_URL = $PDF_FILES_FOLDER = "";

    // 全製品共通指定
    $SP_DOWNLOAD_SERVER = "http://sorimachi-download.s3-ap-northeast-1.amazonaws.com/sp/";
    // PHP移行check : Vietnam未使用 (2019/03/07 VinhDao)
    //SP_DOWNLOAD_SERVER = "http://www.sorimachi.on.arena.ne.jp/sp/"
    // $PRG_DOWNLOAD_SERVER = "http://www.sorimachi.on.arena.ne.jp/program/";
    //SP_DOWNLOAD_SERVER = "http://www.sorimachi.co.jp/softdownload/sp/"
    $PRG_DOWNLOAD_SERVER = "http://www.sorimachi.co.jp/softdownload/program/";
    //$PRG_DOWNLOAD_SERVER_AWS = "http://sorimachi-download.s3-ap-northeast-1.amazonaws.com/prg/";
    $PRG_DOWNLOAD_SERVER_DL1 = "http://dl1.sorimachi.co.jp/prg/";
    //$AdobeReaderDL_URL = "http://www.adobe.co.jp/products/acrobat/readstep2.html";
    //$PDF_FILES_FOLDER = "/usersupport/products_support/softdownload/lib/pdf/";

/////////////////////////////////////////////////////////////////////////////////////////
// 
//【更新情報記述（通常のサービスパック掲載の場合はこちらを修正してください）】
// 
//　各製品ごとの更新時の変動値指定を行ないます。
//　サービスパックの番号、容量、マニュアルの容量(※9srのみ)を記載してください。
//　この値を基にして、下記の場合分けへ進みますので、
//　新製品やVup製品の場合は場合分けも★必ず★追加するようにしてください。
//　また、ニュースリリース自動記述プログラムも変更が必要です。注意してください。
//　/partner/lib/newsrelease.inc
//　/lib/newsrelease/general.inc
// 
//　王9シリーズ以降のバージョンに対応しています。
//　　※オプションソフト（みん確、eTax 等）は除く
// 
/////////////////////////////////////////////////////////////////////////////////////////

//『郵便番号辞書』
    global $accper19_00_SP_CODE_No;
    global $accstd19_00_SP_CODE_No;
    global $accnpo19_00_SP_CODE_No;
    global $acccar19_00_SP_CODE_No;
    global $accmed19_00_SP_CODE_No;
    global $accnet19_00_SP_CODE_No;
    global $psl19_00_SP_CODE_No;
    global $sal19_00_SP_CODE_No;
    global $scl19_00_SP_CODE_No;
    global $accper18_00_SP_CODE_No;
    global $accstd18_00_SP_CODE_No;
    global $accnpo18_00_SP_CODE_No;
    global $acccar18_00_SP_CODE_No;
    global $accmed18_00_SP_CODE_No;
    global $accnet18_00_SP_CODE_No;
    global $psl18_00_SP_CODE_No;
    global $sal18_00_SP_CODE_No;
    global $scl18_00_SP_CODE_No;
    global $accper17_00_SP_CODE_No;
    global $accstd17_00_SP_CODE_No;
    global $accnpo17_00_SP_CODE_No;
    global $acccar17_00_SP_CODE_No;
    global $accmed17_00_SP_CODE_No;
    global $accnet17_00_SP_CODE_No;
    global $psl17_00_SP_CODE_No;
    global $sal17_00_SP_CODE_No;
    global $scl17_00_SP_CODE_No;
    global $accper16_00_SP_CODE_No;
    global $accstd16_00_SP_CODE_No;
    global $accnpo16_00_SP_CODE_No;
    global $acccar16_00_SP_CODE_No;
    global $accmed16_00_SP_CODE_No;
    global $accnet16_00_SP_CODE_No;
    global $psl16_00_SP_CODE_No;
    global $sal16_00_SP_CODE_No;
    global $scl16_00_SP_CODE_No;
    global $accper15_00_SP_CODE_No;
    global $accstd15_00_SP_CODE_No;
    global $accnpo15_00_SP_CODE_No;
    global $acccar15_00_SP_CODE_No;
    global $accmed15_05_SP_CODE_No;
    global $accnet15_00_SP_CODE_No;
    global $psl15_00_SP_CODE_No;
    global $sal15_00_SP_CODE_No;
    global $scl15_00_SP_CODE_No;
    global $postcode_AT_THE_DATE_OF;
    global $accper14_00_SP_CODE_No;
    global $accstd14_00_SP_CODE_No;
    global $accnpo14_00_SP_CODE_No;
    global $acccar14_00_SP_CODE_No;
    global $accnet14_00_SP_CODE_No;
    global $psl14_01_SP_CODE_No;
    global $psl14_00_SP_CODE_No;
    global $sal14_00_SP_CODE_No;
    global $scl14_00_SP_CODE_No;
    global $accper13_00_SP_CODE_No;
    global $accstd13_00_SP_CODE_No;
    global $accnpo13_00_SP_CODE_No;
    global $acccar13_00_SP_CODE_No;
    global $accnet13_00_SP_CODE_No;
    global $psl13_01_SP_CODE_No;
    global $psl13_00_SP_CODE_No;
    global $sal13_00_SP_CODE_No;
    global $scl13_00_SP_CODE_No;
    global $accper12_00_SP_CODE_No;
    global $accstd12_00_SP_CODE_No;
    global $accnpo12_00_SP_CODE_No;
    global $acccar12_00_SP_CODE_No;
    global $accnet12_00_SP_CODE_No;
    global $psl12_02_SP_CODE_No;
    global $psl12_00_SP_CODE_No;
    global $sal12_00_SP_CODE_No;
    global $scl12_00_SP_CODE_No;
    global $accper11_00_SP_CODE_No;
    global $accstd11_00_SP_CODE_No;
    global $accnpo11_00_SP_CODE_No;
    global $accnet11_00_SP_CODE_No;
    global $psl11_02_SP_CODE_No;
    global $psl11_00_SP_CODE_No;
    global $sal11_00_SP_CODE_No;
    global $scl11_00_SP_CODE_No;
    global $accp10_00_SP_CODE_No;
    global $acc10_00_SP_CODE_No;
    global $accn10_00_SP_CODE_No;
    global $accnet10_00_SP_CODE_No;
    global $psl10_01_SP_CODE_No;
    global $psl10_00_SP_CODE_No;
    global $sal10_00_SP_CODE_No;
    global $scl10_00_SP_CODE_No;
    global $accp9_00_SP_CODE_No;
    global $acc9_00_SP_CODE_No;
    global $accn9_00_SP_CODE_No;
    global $apr9_00_SP_CODE_No;
    global $psl9_01_SP_CODE_No;
    global $psl9_00_SP_CODE_No;
    global $sal9_00_SP_CODE_No;
    global $scl9_00_SP_CODE_No;

    //更新(公開)日
    $postcode_LAST_UPDATE = "2018/09/03";

    //YYYY年MM月DD日現在
    $postcode_AT_THE_DATE_OF = "2018/08/31";


    //「みんなの青色申告19（Ver19.00.00）」
    $accper19_00_LAST_UPDATE = "2018/06/19";
    $accper19_00_SP_CODE_No = "9096081";
    $accper19_00_DATASIZE_SP = "14.6MB";

    //「会計王19（Ver19.00.00）」
    $accstd19_00_LAST_UPDATE = "2018/06/19";
    $accstd19_00_SP_CODE_No = "9096081";
    $accstd19_00_DATASIZE_SP = "15.0MB";

    //「会計王19 NPO法人スタイル（Ver19.00.00）」
    $accnpo19_00_LAST_UPDATE = "2018/06/19";
    $accnpo19_00_SP_CODE_No = "9096081";
    $accnpo19_00_DATASIZE_SP = "14.6MB";

    //「会計王19 介護事業所スタイル（Ver19.00.00）」
    $acccar19_00_LAST_UPDATE = "2018/06/19";
    $acccar19_00_SP_CODE_No = "9096081";
    $acccar19_00_DATASIZE_SP = "15.0MB";

    //「会計王19 PRO（Ver19.00.00）」
    $accnet19_00_LAST_UPDATE = "2018/06/19";
    $accnet19_00_SP_CODE_No = "9096081";
    $accnet19_00_DATASIZE_SP = "16.2MB";

    //「MA1（会計王19）（Ver19.00.00）」
    $accmed19_00_LAST_UPDATE = "2018/06/13";
    $accmed19_00_SP_CODE_No = "9086081";
    $accmed19_00_DATASIZE_SP = "16.8MB";

    //「給料王19（Ver19.00.00）」
    $psl19_00_LAST_UPDATE = "2018/05/31";
    $psl19_00_SP_CODE_No = "9065081";
    $psl19_00_DATASIZE_SP = "20.9MB";

    //「販売王19／販売王19 販売・仕入・在庫（Ver19.00.00）」
    $sal19_00_LAST_UPDATE = "2018/06/20";
    $sal19_00_SP_CODE_No = "9036081";
    $sal19_00_DATASIZE_SP = "31.1MB";

    //「顧客王19（Ver19.00.00）」
    $scl19_00_LAST_UPDATE = "2018/06/20";
    $scl19_00_SP_CODE_No = "9036081";
    $scl19_00_DATASIZE_SP = "17.6MB";


    //「みんなの青色申告18（Ver18.00.00）」
    $accper18_00_LAST_UPDATE = "2018/04/25";
    $accper18_00_SP_CODE_No = "8104081";
    $accper18_00_DATASIZE_SP = "13.9MB";

    //「会計王18（Ver18.00.00）」
    $accstd18_00_LAST_UPDATE = "2018/04/25";
    $accstd18_00_SP_CODE_No = "8104081";
    $accstd18_00_DATASIZE_SP = "13.9MB";

    //「会計王18 NPO法人スタイル（Ver18.00.00）」
    $accnpo18_00_LAST_UPDATE = "2018/04/25";
    $accnpo18_00_SP_CODE_No = "8104081";
    $accnpo18_00_DATASIZE_SP = "13.9MB";

    //「会計王18 介護事業所スタイル（Ver18.00.00）」
    $acccar18_00_LAST_UPDATE = "2018/04/25";
    $acccar18_00_SP_CODE_No = "8104081";
    $acccar18_00_DATASIZE_SP = "13.9MB";

    //「会計王18 PRO（Ver18.00.00）」
    $accnet18_00_LAST_UPDATE = "2018/04/25";
    $accnet18_00_SP_CODE_No = "8104081";
    $accnet18_00_DATASIZE_SP = "14.9MB";

    //「MA1（会計王18相当）（Ver18.00.00）」
    $accmed18_00_LAST_UPDATE = "2017/09/15";
    $accmed18_00_SP_CODE_No = "8079071";
    $accmed18_00_DATASIZE_SP = "13.3MB";

    //「給料王18（Ver18.00.00）」
    $psl18_00_LAST_UPDATE = "2017/08/22";
    $psl18_00_SP_CODE_No = "8108071";
    $psl18_00_DATASIZE_SP = "16.3MB";

    //「販売王18／販売王18 販売・仕入・在庫（Ver18.00.00）」
    $sal18_00_LAST_UPDATE = "2018/06/20";
    $sal18_00_SP_CODE_No = "8146081";
    $sal18_00_DATASIZE_SP = "54.7MB";

    //「顧客王18（Ver18.00.00）」
    $scl18_00_LAST_UPDATE = "2018/06/20";
    $scl18_00_SP_CODE_No = "8146081";
    $scl18_00_DATASIZE_SP = "41.4MB";


    //「みんなの青色申告17（Ver17.00.00）」
    $accper17_00_LAST_UPDATE = "2017/06/01";
    $accper17_00_SP_CODE_No = "7106071";
    $accper17_00_DATASIZE_SP = "12.0MB";

    //「会計王17（Ver17.00.00）」
    $accstd17_00_LAST_UPDATE = "2017/06/01";
    $accstd17_00_SP_CODE_No = "7106071";
    $accstd17_00_DATASIZE_SP = "12.0MB";

    //「会計王17 NPO法人スタイル（Ver17.00.00）」
    $accnpo17_00_LAST_UPDATE = "2017/06/01";
    $accnpo17_00_SP_CODE_No = "7106071";
    $accnpo17_00_DATASIZE_SP = "12.0MB";

    //「会計王17 介護事業所スタイル（Ver17.00.00）」
    $acccar17_00_LAST_UPDATE = "2017/06/01";
    $acccar17_00_SP_CODE_No = "7106071";
    $acccar17_00_DATASIZE_SP = "12.0MB";

    //「会計王17 PRO（Ver17.00.00）」
    $accnet17_00_LAST_UPDATE = "2017/06/01";
    $accnet17_00_SP_CODE_No = "7106071";
    $accnet17_00_DATASIZE_SP = "13.1MB";

    //「MA1（会計王17 医業）（Ver17.00.00）」
    $accmed17_00_LAST_UPDATE = "2016/04/18";
    $accmed17_00_SP_CODE_No = "7034061";
    $accmed17_00_DATASIZE_SP = "11.8MB";

    //「給料王17（Ver17.00.00）」
    $psl17_00_LAST_UPDATE = "2017/06/09";
    $psl17_00_SP_CODE_No = "7126071";
    $psl17_00_DATASIZE_SP = "16.5MB";

    //「販売王17／販売王17 販売・仕入・在庫（Ver17.00.00）」
    $sal17_00_LAST_UPDATE = "2017/06/06";
    $sal17_00_SP_CODE_No = "7106071";
    $sal17_00_DATASIZE_SP = "14.1MB";

    //「顧客王17（Ver17.00.00）」
    $scl17_00_LAST_UPDATE = "2017/06/06";
    $scl17_00_SP_CODE_No = "7106071";
    $scl17_00_DATASIZE_SP = "11.3MB";


    //「みんなの青色申告16（Ver16.00.00）」
    $accper16_00_LAST_UPDATE = "2016/12/13";
    $accper16_00_SP_CODE_No = "6142161";
    $accper16_00_DATASIZE_SP = "11.5MB";

    //「会計王16（Ver16.00.00）」
    $accstd16_00_LAST_UPDATE = "2016/12/13";
    $accstd16_00_SP_CODE_No = "6142161";
    $accstd16_00_DATASIZE_SP = "11.5MB";

    //「会計王16 NPO法人スタイル（Ver16.00.00）」
    $accnpo16_00_LAST_UPDATE = "2016/12/13";
    $accnpo16_00_SP_CODE_No = "6142161";
    $accnpo16_00_DATASIZE_SP = "11.5MB";

    //「会計王16 介護事業所スタイル（Ver16.00.00）」
    $acccar16_00_LAST_UPDATE = "2016/12/13";
    $acccar16_00_SP_CODE_No = "6142161";
    $acccar16_00_DATASIZE_SP = "11.6MB";

    //「会計王16 PRO（Ver16.00.00）」
    $accnet16_00_LAST_UPDATE = "2016/12/13";
    $accnet16_00_SP_CODE_No = "6142161";
    $accnet16_00_DATASIZE_SP = "11.7MB";

    //「MA1（会計王16 医業）（Ver16.00.00）」
    $accmed16_00_LAST_UPDATE = "2015/07/17";
    $accmed16_00_SP_CODE_No = "6097051";
    $accmed16_00_DATASIZE_SP = "10.7MB";

    //「給料王16（Ver16.01.00）」
    //「給料王16（Ver16.00.00）」
    $psl16_00_LAST_UPDATE = "2016/12/13";
    $psl16_00_SP_CODE_No = "6162161";
    $psl16_00_DATASIZE_SP = "22.1MB";

    //「販売王16／販売王16 販売・仕入・在庫（Ver16.00.00）」
    $sal16_00_LAST_UPDATE = "2016/12/13";
    $sal16_00_SP_CODE_No = "6142161";
    $sal16_00_DATASIZE_SP = "11.0MB";

    //「顧客王16（Ver16.00.00）」
    $scl16_00_LAST_UPDATE = "2016/12/13";
    $scl16_00_SP_CODE_No = "6142161";
    $scl16_00_DATASIZE_SP = "8.92MB";


    //「みんなの青色申告15 消費税8％対応申告書版（Ver15.01.00）」
    // Ver15.00.00と共用の為、未使用

    //「みんなの青色申告15（Ver15.00.00）」
    $accper15_00_LAST_UPDATE = "2016/12/13";
    $accper15_00_SP_CODE_No = "5292161";
    $accper15_00_DATASIZE_SP = "16.1MB";

    //「会計王15 消費税8％対応申告書版（Ver15.01.00）」
    // Ver15.00.00と共用の為、未使用

    //「会計王15（Ver15.00.00）」
    $accstd15_00_LAST_UPDATE = "2016/12/13";
    $accstd15_00_SP_CODE_No = "5292161";
    $accstd15_00_DATASIZE_SP = "17.6MB";

    //「会計王15 NPO法人スタイル 消費税8％対応申告書版（Ver15.01.00）」
    //Ver15.00.00と共用の為、未使用

    //「会計王15 NPO法人スタイル（Ver15.00.00）」
    $accnpo15_00_LAST_UPDATE = "2016/12/13";
    $accnpo15_00_SP_CODE_No = "5292161";
    $accnpo15_00_DATASIZE_SP = "11.1MB";

    //「会計王15 介護事業所スタイル 消費税8％対応申告書版（Ver15.01.00）」
    //Ver15.00.00と共用の為、未使用に

    //「会計王15 介護事業所スタイル（Ver15.00.00）」
    $acccar15_00_LAST_UPDATE = "2016/12/13";
    $acccar15_00_SP_CODE_No = "5292161";
    $acccar15_00_DATASIZE_SP = "14.8MB";

    //「会計王15 PRO 消費税8％対応申告書版（Ver15.01.00）」
    // Ver15.00.00と共用の為、未使用に

    //「会計王15 PRO（Ver15.00.00）」
    $accnet15_00_LAST_UPDATE = "2016/12/13";
    $accnet15_00_SP_CODE_No = "5292161";
    $accnet15_00_DATASIZE_SP = "18.6MB";

    //「MA1（会計王15 医業）（Ver15.05.00）」
    $accmed15_05_LAST_UPDATE = "2015/07/02";
    $accmed15_05_SP_CODE_No = "5266051";
    $accmed15_05_DATASIZE_SP = "9.67MB";

    //「給料王15（Ver15.00.00）」
    $psl15_00_LAST_UPDATE = "2016/12/13";
    $psl15_00_SP_CODE_No = "5092161";
    $psl15_00_DATASIZE_SP = "9.54MB";

    //「販売王15／販売王15 販売・仕入・在庫（Ver15.00.00）」
    $sal15_00_LAST_UPDATE = "2016/12/13";
    $sal15_00_SP_CODE_No = "5122161";
    $sal15_00_DATASIZE_SP = "4.98MB";

    //「顧客王15（Ver15.00.00）」
    $scl15_00_LAST_UPDATE = "2016/12/13";
    $scl15_00_SP_CODE_No = "5122161";
    $scl15_00_DATASIZE_SP = "1.75MB";


    //「みんなの青色申告14（Ver14.00.00）」
    $accper14_00_LAST_UPDATE = "2016/11/17";
    $accper14_00_SP_CODE_No = "4181161";
    $accper14_00_DATASIZE_SP = "9.09MB";

    //「会計王14（Ver14.00.00）」
    $accstd14_00_LAST_UPDATE = "2016/11/17";
    $accstd14_00_SP_CODE_No = "4181161";
    $accstd14_00_DATASIZE_SP = "9.08MB";

    //「会計王14 NPO法人スタイル（Ver14.00.00）」
    $accnpo14_00_LAST_UPDATE = "2016/11/17";
    $accnpo14_00_SP_CODE_No = "4181161";
    $accnpo14_00_DATASIZE_SP = "8.91MB";

    //「会計王14 介護事業所スタイル（Ver14.00.00）」
    $acccar14_00_LAST_UPDATE = "2016/11/17";
    $acccar14_00_SP_CODE_No = "4181161";
    $acccar14_00_DATASIZE_SP = "8.96MB";

    //「会計王14 PRO（Ver14.00.00）」
    $accnet14_00_LAST_UPDATE = "2013/12/11";
    $accnet14_00_SP_CODE_No = "4152131";
    $accnet14_00_DATASIZE_SP = "7.58MB";

    //「給料王14 平成25年4月レベルアップ版（Ver14.01.00）」
    $psl14_01_LAST_UPDATE = "2013/XX/XX";
    $psl14_01_SP_CODE_No = "9999999";
    $psl14_01_DATASIZE_SP = "X.XXMB";

    //「給料王14（Ver14.00.00）」
    $psl14_00_LAST_UPDATE = "2013/11/07";
    $psl14_00_SP_CODE_No = "4071131";
    $psl14_00_DATASIZE_SP = "7.23MB";

    //「販売王14／販売王14 販売・仕入・在庫（Ver14.00.00）」
    $sal14_00_LAST_UPDATE = "2013/11/26";
    $sal14_00_SP_CODE_No = "4071131";
    $sal14_00_DATASIZE_SP = "2.54MB";

    //「顧客王14（Ver14.00.00）」
    $scl14_00_LAST_UPDATE = "2013/11/26";
    $scl14_00_SP_CODE_No = "4071131";
    $scl14_00_DATASIZE_SP = "1.78MB";


    //「みんなの青色申告13（Ver13.00.00）」
    $accper13_00_LAST_UPDATE = "2013/02/18";
    $accper13_00_SP_CODE_No = "3092031";
    $accper13_00_DATASIZE_SP = "13.3MB";

    //「会計王13（Ver13.00.00）」
    $accstd13_00_LAST_UPDATE = "2013/02/18";
    $accstd13_00_SP_CODE_No = "3092031";
    $accstd13_00_DATASIZE_SP = "13.8MB";

    //「会計王13 NPO法人スタイル（Ver13.00.02）」
    $accnpo13_02_LAST_UPDATE = "2013/02/18";
    $accnpo13_02_SP_CODE_No = "3102031";
    $accnpo13_02_DATASIZE_SP = "11.9MB";

    //「会計王13 NPO法人スタイル（Ver13.00.00）」
    $accnpo13_00_LAST_UPDATE = "2013/02/18";
    $accnpo13_00_SP_CODE_No = "3092031";
    $accnpo13_00_DATASIZE_SP = "10.8MB";

    //「会計王13 介護事業所スタイル（Ver13.00.00）」
    $acccar13_00_LAST_UPDATE = "2013/02/18";
    $acccar13_00_SP_CODE_No = "3092031";
    $acccar13_00_DATASIZE_SP = "13.6MB";

    //「会計王13 PRO（Ver13.00.00）」
    $accnet13_00_LAST_UPDATE = "2013/02/18";
    $accnet13_00_SP_CODE_No = "3092031";
    $accnet13_00_DATASIZE_SP = "14.3MB";

    //「給料王13 平成24年4月レベルアップ版（Ver13.01.00）」
    $psl13_01_LAST_UPDATE = "2012/11/08";
    $psl13_01_SP_CODE_No = "3101121";
    $psl13_01_DATASIZE_SP = "2.74MB";

    //「給料王13（Ver13.00.00）」
    $psl13_00_LAST_UPDATE = "2012/08/01";
    $psl13_00_SP_CODE_No = "3088021";
    $psl13_00_DATASIZE_SP = "5.75MB";

    //「販売王13／販売王13 販売・仕入・在庫（Ver13.00.00）」
    $sal13_00_LAST_UPDATE = "2012/12/05";
    $sal13_00_SP_CODE_No = "3092121";
    $sal13_00_DATASIZE_SP = "7.73MB";

    //「顧客王13（Ver13.00.00）」
    $scl13_00_LAST_UPDATE = "2012/12/05";
    $scl13_00_SP_CODE_No = "3092121";
    $scl13_00_DATASIZE_SP = "3.99MB";


    //「みんなの青色申告12（Ver12.00.00）」
    $accper12_00_LAST_UPDATE = "2012/01/20";
    $accper12_00_SP_CODE_No = "2081021";
    $accper12_00_DATASIZE_SP = "3.69MB";

    //「会計王12（Ver12.00.00）」
    $accstd12_00_LAST_UPDATE = "2012/02/16";
    $accstd12_00_SP_CODE_No = "2092021";
    $accstd12_00_DATASIZE_SP = "4.31MB";

    //「会計王12 NPO法人スタイル（Ver12.00.00）」
    $accnpo12_00_LAST_UPDATE = "2012/02/16";
    $accnpo12_00_SP_CODE_No = "2092021";
    $accnpo12_00_DATASIZE_SP = "4.32MB";

    //「会計王12 介護事業所スタイル（Ver12.00.00）」
    $acccar12_00_LAST_UPDATE = "2012/02/16";
    $acccar12_00_SP_CODE_No = "2092021";
    $acccar12_00_DATASIZE_SP = "4.32MB";

    //「会計王12 PRO（Ver12.00.00）」
    $accnet12_00_LAST_UPDATE = "2012/02/16";
    $accnet12_00_SP_CODE_No = "2092021";
    $accnet12_00_DATASIZE_SP = "4.32MB";

    //「給料王12 平成23年4月レベルアップ版（Ver12.02.00）」
    $psl12_02_LAST_UPDATE = "2012/01/18";
    $psl12_02_SP_CODE_No = "2091021";
    $psl12_02_DATASIZE_SP = "12.7MB";

    //「給料王12（Ver12.00.00）」
    $psl12_00_LAST_UPDATE = "2012/01/18";
    $psl12_00_SP_CODE_No = "2101021";
    $psl12_00_DATASIZE_SP = "2.49MB";

    //「販売王12／販売王12 販売・仕入・在庫（Ver12.00.00）」
    $sal12_00_LAST_UPDATE = "2012/01/17";
    $sal12_00_SP_CODE_No = "2101021";
    $sal12_00_DATASIZE_SP = "3.35MB";

    //「顧客王12（Ver12.00.00）」
    $scl12_00_LAST_UPDATE = "2012/07/26";
    $scl12_00_SP_CODE_No = "2117021";
    $scl12_00_DATASIZE_SP = "1.02MB";


    //「みんなの青色申告2010（Ver11.00.00）」
    $accper11_00_LAST_UPDATE = "2011/04/27";
    $accper11_00_SP_CODE_No = "1163011";
    $accper11_00_DATASIZE_SP = "11.4MB";

    //「会計王11（Ver11.00.00）」
    $accstd11_00_LAST_UPDATE = "2012/02/16";
    $accstd11_00_SP_CODE_No = "1172021";
    $accstd11_00_DATASIZE_SP = "9.68MB";

    //「会計王11 NPO Limited（Ver11.00.00）」
    $accnpo11_00_LAST_UPDATE = "2012/02/16";
    $accnpo11_00_SP_CODE_No = "1172021";
    $accnpo11_00_DATASIZE_SP = "6.42MB";

    //「会計王11 PRO（Ver11.00.00）」
    $accnet11_00_LAST_UPDATE = "2012/02/16";
    $accnet11_00_SP_CODE_No = "1172021";
    $accnet11_00_DATASIZE_SP = "9.72MB";

    //「給料王11 平成22年4月改正労働基準法対応版（Ver11.02.00）」
    $psl11_02_LAST_UPDATE = "2011/01/06";
    $psl11_02_SP_CODE_No = "1121011";
    $psl11_02_DATASIZE_SP = "23.8MB";

    //「給料王11 SaaS Edition（Ver11.01.00）」
    //こちらには記載の必要はありません

    //「給料王11（Ver11.00.00）」
    $psl11_00_LAST_UPDATE = "2011/01/06";
    $psl11_00_SP_CODE_No = "1141011";
    $psl11_00_DATASIZE_SP = "25.0MB";

    //「販売王11／販売王11 販売・仕入・在庫（Ver11.00.00）」
    $sal11_00_LAST_UPDATE = "2011/07/08";
    $sal11_00_SP_CODE_No = "1177011";
    $sal11_00_DATASIZE_SP = "7.50MB";

    //「顧客王11（Ver11.00.00）」
    $scl11_00_LAST_UPDATE = "2012/07/26";
    $scl11_00_SP_CODE_No = "1187021";
    $scl11_00_DATASIZE_SP = "2.21MB";


    //「みんなの青色申告10（Ver10.00.00）」
    $accp10_00_LAST_UPDATE = "2010/04/21";
    $accp10_00_SP_CODE_No = "0084001";
    $accp10_00_DATASIZE_SP = "5.95MB";

    //「会計王10（Ver10.00.00）」
    $acc10_00_LAST_UPDATE = "2010/08/05";
    $acc10_00_SP_CODE_No = "0098001";
    $acc10_00_DATASIZE_SP = "8.53MB";

    //「会計王10 NPO Limited（Ver10.00.00）」
    $accn10_00_LAST_UPDATE = "2010/08/05";
    $accn10_00_SP_CODE_No = "0098001";
    $accn10_00_DATASIZE_SP = "3.66MB";

    //「会計王10 PRO（Ver10.00.00）」
    $accnet10_00_LAST_UPDATE = "2010/12/10";
    $accnet10_00_SP_CODE_No = "0222101";
    $accnet10_00_DATASIZE_SP = "10.3MB";

    //「給料王10 平成21年春版（Ver10.01.00）」
    $psl10_01_LAST_UPDATE = "2009/07/28";
    $psl10_01_SP_CODE_No = "0097090";
    $psl10_01_DATASIZE_SP = "10.1MB";

    //「給料王10（Ver10.00.00）」
    $psl10_00_LAST_UPDATE = "2009/07/28";
    $psl10_00_SP_CODE_No = "0107090";
    $psl10_00_DATASIZE_SP = "16.4MB";

    //「販売王10／販売王10 販売・仕入・在庫（Ver10.00.00）」
    $sal10_00_LAST_UPDATE = "2011/01/24";
    $sal10_00_SP_CODE_No = "0311011";
    $sal10_00_DATASIZE_SP = "9.48MB";

    //「顧客王10（Ver10.00.00）」
    $scl10_00_LAST_UPDATE = "2012/07/26";
    $scl10_00_SP_CODE_No = "0327021";
    $scl10_00_DATASIZE_SP = "3.00MB";


    //「みんなの青色申告9（Ver9.00.00）」
    $accp9_00_LAST_UPDATE = "2010/04/21";
    $accp9_00_SP_CODE_No = "9124001";
    $accp9_00_DATASIZE_SP = "6.48MB";
    $accp9_00_DATASIZE_MN1 = "";            //必要なし（自動取得に変更）
    $accp9_00_DATASIZE_MN2 = "";

    //「会計王9（Ver9.00.00）」
    $acc9_00_LAST_UPDATE = "2010/08/05";
    $acc9_00_SP_CODE_No = "9138001";
    $acc9_00_DATASIZE_SP = "7.96MB";
    $acc9_00_DATASIZE_MN1 = "";             //必要なし（自動取得に変更）
    $acc9_00_DATASIZE_MN2 = "";

    //「会計王9NPO Limited（Ver9.00.00）」
    $accn9_00_LAST_UPDATE = "2010/08/05";
    $accn9_00_SP_CODE_No = "9138001";
    $accn9_00_DATASIZE_SP = "4.67MB";
    $accn9_00_DATASIZE_MN1 = "";            //必要なし（自動取得に変更）
    $accn9_00_DATASIZE_MN2 = "";

    //「会計王9PRO（Ver9.00.00）」
    $apr9_00_LAST_UPDATE = "2010/10/20";
    $apr9_00_SP_CODE_No = "9199001";
    $apr9_00_DATASIZE_SP = "9.57MB";
    $apr9_00_DATASIZE_MN1 = "";             //必要なし（自動取得に変更）
    $apr9_00_DATASIZE_MN2 = "";

    //「給料王9 平成20年春版（Ver9.01.00）」
    $psl9_01_LAST_UPDATE = "2009/05/27";
    $psl9_01_SP_CODE_No = "9165090";
    $psl9_01_DATASIZE_SP = "17.9MB";
    $psl9_01_DATASIZE_MN1 = "";             //必要なし（自動取得に変更）
    $psl9_01_DATASIZE_MN2 = "368KB";

    //「給料王9（Ver9.00.00）」
    $psl9_00_LAST_UPDATE = "2009/05/27";
    $psl9_00_SP_CODE_No = "9175090";
    $psl9_00_DATASIZE_SP = "19.8MB";
    $psl9_00_DATASIZE_MN1 = "";             //必要なし（自動取得に変更）
    $psl9_00_DATASIZE_MN2 = "368KB";

    //「販売王9／販売王9 販売・仕入・在庫（Ver9.00.00）」
    $sal9_00_LAST_UPDATE = "2011/01/24";
    $sal9_00_SP_CODE_No = "9221011";
    $sal9_00_DATASIZE_SP = "6.95MB";
    $sal9_00_DATASIZE_MN1 = "";             //必要なし（自動取得に変更）
    $sal9_00_DATASIZE_MN2 = "";

    //「顧客王9（Ver9.00.00）」
    $scl9_00_LAST_UPDATE = "2012/07/26";
    $scl9_00_SP_CODE_No = "9237021";
    $scl9_00_DATASIZE_SP = "4.35MB";
    $scl9_00_DATASIZE_MN1 = "";             //必要なし（自動取得に変更）
    $scl9_00_DATASIZE_MN2 = "";

    /////////////////////////////////////////////////////////////////////////////////////////
    // 
    //【場合分け】
    //　以下から各製品ごとの場合分けに入ります。
    //　新製品やVup製品の場合は上記情報に加えてこちらも追加するようにしてください。
    //　また、ニュースリリース自動記述プログラムも変更が必要です。注意してください。
    //　/partner/lib/newsrelease.inc	
    //　王9シリーズ以降のバージョンに対応します。
    //　　※但しオプションソフトは除く
    // 
    /////////////////////////////////////////////////////////////////////////////////////////

    switch( $PRODUCT_CODE_SP ) {
        //「みんなの青色申告19（Ver19.00.00）」
        case "accper19_00":
            $PRD_Name              = "みんなの青色申告19";
            $PRD_AbbrCode          = "accper19";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou19/";
            $VERSION_No            = "19_00_00";
            $SP_CODE_No            = $accper19_00_SP_CODE_No;
            $DATASIZE_SP           = $accper19_00_DATASIZE_SP;
            break;

        //「会計王19（Ver19.00.00）」
        case "accstd19_00":
            $PRD_Name              = "会計王19";
            $PRD_AbbrCode          = "accstd19";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou19/";
            $VERSION_No            = "19_00_00";
            $SP_CODE_No            = $accstd19_00_SP_CODE_No;
            $DATASIZE_SP           = $accstd19_00_DATASIZE_SP;
            break;

        //「会計王19 NPO法人スタイル（Ver19.00.00）」
        case "accnpo19_00":
            $PRD_Name              = "会計王19 NPO法人スタイル";
            $PRD_AbbrCode          = "accnpo19";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou19/";
            $VERSION_No            = "19_00_00";
            $SP_CODE_No            = $accnpo19_00_SP_CODE_No;
            $DATASIZE_SP           = $accnpo19_00_DATASIZE_SP;
            break;

        //「会計王19 介護事業所スタイル（Ver19.00.00）」
        case "acccar19_00":
            $PRD_Name              = "会計王19 介護事業所スタイル";
            $PRD_AbbrCode          = "acccar19";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou19/";
            $VERSION_No            = "19_00_00";
            $SP_CODE_No            = $acccar19_00_SP_CODE_No;
            $DATASIZE_SP           = $acccar19_00_DATASIZE_SP;
            break;

        //「会計王19 PRO（Ver19.00.00）」
        case "accnet19_00":
            $PRD_Name              = "会計王19 PRO";
            $PRD_AbbrCode          = "accnet19";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou19/";
            $VERSION_No            = "19_00_00";
            $SP_CODE_No            = $accnet19_00_SP_CODE_No;
            $DATASIZE_SP           = $accnet19_00_DATASIZE_SP;
            break;

        //「MA1(会計19)（Ver19.00.00）」
        case "accmed19_00":
            $PRD_Name              = "会計王19";
            $PRD_AbbrCode          = "accmed19";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou19/";
            $VERSION_No            = "19_00_00";
            $SP_CODE_No            = $accmed19_00_SP_CODE_No;
            $DATASIZE_SP           = $accmed19_00_DATASIZE_SP;
            break;

        //「給料王19（Ver19.00.00）」
        case "psl19_00":
            $PRD_Name              = "給料王19";
            $PRD_AbbrCode          = "psl19";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou19/";
            $VERSION_No            = "19_00_00";
            $SP_CODE_No            = $psl19_00_SP_CODE_No;
            $DATASIZE_SP           = $psl19_00_DATASIZE_SP;
            break;

        //「販売王19／販売王19 販売・仕入・在庫（Ver19.00.00）」
        case "sal19_00":
            $PRD_Name              = "販売王19／販売王19 販売・仕入・在庫";
            $PRD_AbbrCode          = "sal19";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou19/";
            $VERSION_No            = "19_00_00";
            $SP_CODE_No            = $sal19_00_SP_CODE_No;
            $DATASIZE_SP           = $sal19_00_DATASIZE_SP;
            break;

        //「顧客王19（Ver19.00.00）」
        case "scl19_00":
            $PRD_Name              = "顧客王19";
            $PRD_AbbrCode          = "scl19";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou19/";
            $VERSION_No            = "19_00_00";
            $SP_CODE_No            = $scl19_00_SP_CODE_No;
            $DATASIZE_SP           = $scl19_00_DATASIZE_SP;
            break;

        //「みんなの青色申告18（Ver18.00.00）」
        case "accper18_00":
            $PRD_Name              = "みんなの青色申告18";
            $PRD_AbbrCode          = "accper18";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou18/";
            $VERSION_No            = "18_00_00";
            $SP_CODE_No            = $accper18_00_SP_CODE_No;
            $DATASIZE_SP           = $accper18_00_DATASIZE_SP;
            break;

        //「会計王18（Ver18.00.00）」
        case "accstd18_00":
            $PRD_Name              = "会計王18";
            $PRD_AbbrCode          = "accstd18";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou18/";
            $VERSION_No            = "18_00_00";
            $SP_CODE_No            = $accstd18_00_SP_CODE_No;
            $DATASIZE_SP           = $accstd18_00_DATASIZE_SP;
            break;

        //「会計王18 NPO法人スタイル（Ver18.00.00）」
        case "accnpo18_00":
            $PRD_Name              = "会計王18 NPO法人スタイル";
            $PRD_AbbrCode          = "accnpo18";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou18/";
            $VERSION_No            = "18_00_00";
            $SP_CODE_No            = $accnpo18_00_SP_CODE_No;
            $DATASIZE_SP           = $accnpo18_00_DATASIZE_SP;
            break;

        //「会計王18 介護事業所スタイル（Ver18.00.00）」
        case "acccar18_00":
            $PRD_Name              = "会計王18 介護事業所スタイル";
            $PRD_AbbrCode          = "acccar18";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou18/";
            $VERSION_No            = "18_00_00";
            $SP_CODE_No            = $acccar18_00_SP_CODE_No;
            $DATASIZE_SP           = $acccar18_00_DATASIZE_SP;
            break;

        //「会計王18 PRO（Ver18.00.00）」
        case "accnet18_00":
            $PRD_Name              = "会計王18 PRO";
            $PRD_AbbrCode          = "accnet18";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou18/";
            $VERSION_No            = "18_00_00";
            $SP_CODE_No            = $accnet18_00_SP_CODE_No;
            $DATASIZE_SP           = $accnet18_00_DATASIZE_SP;
            break;

        //「MA1(会計18)（Ver18.00.00）」
        case "accmed18_00":
            $PRD_Name              = "会計王18";
            $PRD_AbbrCode          = "accmed18";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou18/";
            $VERSION_No            = "18_00_00";
            $SP_CODE_No            = $accmed18_00_SP_CODE_No;
            $DATASIZE_SP           = $accmed18_00_DATASIZE_SP;
            break;

        //「給料王18（Ver18.00.00）」
        case "psl18_00":
            $PRD_Name              = "給料王18";
            $PRD_AbbrCode          = "psl18";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou18/";
            $VERSION_No            = "18_00_00";
            $SP_CODE_No            = $psl18_00_SP_CODE_No;
            $DATASIZE_SP           = $psl18_00_DATASIZE_SP;
            break;

        //「販売王18／販売王18 販売・仕入・在庫（Ver18.00.00）」
        case "sal18_00":
            $PRD_Name              = "販売王18／販売王18 販売・仕入・在庫";
            $PRD_AbbrCode          = "sal18";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou18/";
            $VERSION_No            = "18_00_00";
            $SP_CODE_No            = $sal18_00_SP_CODE_No;
            $DATASIZE_SP           = $sal18_00_DATASIZE_SP;
            break;

        //「顧客王18（Ver18.00.00）」
        case "scl18_00":
            $PRD_Name              = "顧客王18";
            $PRD_AbbrCode          = "scl18";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou18/";
            $VERSION_No            = "18_00_00";
            $SP_CODE_No            = $scl18_00_SP_CODE_No;
            $DATASIZE_SP           = $scl18_00_DATASIZE_SP;
            break;

        //「みんなの青色申告17（Ver17.00.00）」
        case "accper17_00":
            $PRD_Name              = "みんなの青色申告17";
            $PRD_AbbrCode          = "accper17";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou17/";
            $VERSION_No            = "17_00_00";
            $SP_CODE_No            = $accper17_00_SP_CODE_No;
            $DATASIZE_SP           = $accper17_00_DATASIZE_SP;
            break;

        //「会計王17（Ver17.00.00）」
        case "accstd17_00":
            $PRD_Name              = "会計王17";
            $PRD_AbbrCode          = "accstd17";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou17/";
            $VERSION_No            = "17_00_00";
            $SP_CODE_No            = $accstd17_00_SP_CODE_No;
            $DATASIZE_SP           = $accstd17_00_DATASIZE_SP;
            break;

        //「会計王17 NPO法人スタイル（Ver17.00.00）」
        case "accnpo17_00":
            $PRD_Name              = "会計王17 NPO法人スタイル";
            $PRD_AbbrCode          = "accnpo17";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou17/";
            $VERSION_No            = "17_00_00";
            $SP_CODE_No            = $accnpo17_00_SP_CODE_No;
            $DATASIZE_SP           = $accnpo17_00_DATASIZE_SP;
            break;

        //「会計王17 介護事業所スタイル（Ver17.00.00）」
        case "acccar17_00":
            $PRD_Name              = "会計王17 介護事業所スタイル";
            $PRD_AbbrCode          = "acccar17";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou17/";
            $VERSION_No            = "17_00_00";
            $SP_CODE_No            = $acccar17_00_SP_CODE_No;
            $DATASIZE_SP           = $acccar17_00_DATASIZE_SP;
            break;

        //「会計王17 PRO（Ver17.00.00）」
        case "accnet17_00":
            $PRD_Name              = "会計王17 PRO";
            $PRD_AbbrCode          = "accnet17";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou17/";
            $VERSION_No            = "17_00_00";
            $SP_CODE_No            = $accnet17_00_SP_CODE_No;
            $DATASIZE_SP           = $accnet17_00_DATASIZE_SP;
            break;

        //「MA1(会計17)（Ver17.00.00）」
        case "accmed17_00":
            $PRD_Name              = "会計王17";
            $PRD_AbbrCode          = "accmed17";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou17/";
            $VERSION_No            = "17_00_00";
            $SP_CODE_No            = $accmed17_00_SP_CODE_No;
            $DATASIZE_SP           = $accmed17_00_DATASIZE_SP;
            break;

        //「給料王17（Ver17.00.00）」
        case "psl17_00":
            $PRD_Name              = "給料王17";
            $PRD_AbbrCode          = "psl17";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou17/";
            $VERSION_No            = "17_00_00";
            $SP_CODE_No            = $psl17_00_SP_CODE_No;
            $DATASIZE_SP           = $psl17_00_DATASIZE_SP;
            break;

        //「販売王17／販売王17 販売・仕入・在庫（Ver17.00.00）」
        case "sal17_00":
            $PRD_Name              = "販売王17／販売王17 販売・仕入・在庫";
            $PRD_AbbrCode          = "sal17";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou17/";
            $VERSION_No            = "17_00_00";
            $SP_CODE_No            = $sal17_00_SP_CODE_No;
            $DATASIZE_SP           = $sal17_00_DATASIZE_SP;
            break;

        //「顧客王17（Ver17.00.00）」
        case "scl17_00":
            $PRD_Name              = "顧客王17";
            $PRD_AbbrCode          = "scl17";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou17/";
            $VERSION_No            = "17_00_00";
            $SP_CODE_No            = $scl17_00_SP_CODE_No;
            $DATASIZE_SP           = $scl17_00_DATASIZE_SP;
            break;

        //「みんなの青色申告16（Ver16.00.00）」
        case "accper16_00":
            $PRD_Name              = "みんなの青色申告16";
            $PRD_AbbrCode          = "accper16";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou16/";;
            $VERSION_No            = "16_00_00";;
            $SP_CODE_No            = $accper16_00_SP_CODE_No;;
            $DATASIZE_SP           = $accper16_00_DATASIZE_SP;;
            break;

        //「会計王16（Ver16.00.00）」
        case "accstd16_00":
            $PRD_Name              = "会計王16";
            $PRD_AbbrCode          = "accstd16";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou16/";
            $VERSION_No            = "16_00_00";
            $SP_CODE_No            = $accstd16_00_SP_CODE_No;
            $DATASIZE_SP           = $accstd16_00_DATASIZE_SP;
            break;

        //「会計王16 NPO法人スタイル（Ver16.00.00）」
        case "accnpo16_00":
            $PRD_Name              = "会計王16 NPO法人スタイル";
            $PRD_AbbrCode          = "accnpo16";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou16/";
            $VERSION_No            = "16_00_00";
            $SP_CODE_No            = $accnpo16_00_SP_CODE_No;
            $DATASIZE_SP           = $accnpo16_00_DATASIZE_SP;
            break;

        //「会計王16 介護事業所スタイル（Ver16.00.00）」
        case "acccar16_00":
            $PRD_Name              = "会計王16 介護事業所スタイル";
            $PRD_AbbrCode          = "acccar16";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou16/";
            $VERSION_No            = "16_00_00";
            $SP_CODE_No            = $acccar16_00_SP_CODE_No;
            $DATASIZE_SP           = $acccar16_00_DATASIZE_SP;
            break;

        //「会計王16 PRO（Ver16.00.00）」
        case "accnet16_00":
            $PRD_Name              = "会計王16 PRO";
            $PRD_AbbrCode          = "accnet16";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou16/";
            $VERSION_No            = "16_00_00";
            $SP_CODE_No            = $accnet16_00_SP_CODE_No;
            $DATASIZE_SP           = $accnet16_00_DATASIZE_SP;
            break;

        //「MA1(会計16)（Ver16.00.00）」
        case "accmed16_00":
            $PRD_Name              = "会計王16";
            $PRD_AbbrCode          = "accmed16";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou16/";
            $VERSION_No            = "16_00_00";
            $SP_CODE_No            = $accmed16_00_SP_CODE_No;
            $DATASIZE_SP           = $accmed16_00_DATASIZE_SP;
            break;

        //「給料王16（Ver16.00.00）」
        case "psl16_00":
            $PRD_Name              = "給料王16";
            $PRD_AbbrCode          = "psl16";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou16/";
            $VERSION_No            = "16_00_00";
            $SP_CODE_No            = $psl16_00_SP_CODE_No;
            $DATASIZE_SP           = $psl16_00_DATASIZE_SP;
            break;

        //「販売王16／販売王16 販売・仕入・在庫（Ver16.00.00）」
        case "sal16_00":
            $PRD_Name              = "販売王16／販売王16 販売・仕入・在庫";
            $PRD_AbbrCode          = "sal16";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou16/";
            $VERSION_No            = "16_00_00";
            $SP_CODE_No            = $sal16_00_SP_CODE_No;
            $DATASIZE_SP           = $sal16_00_DATASIZE_SP;
            break;

        //「顧客王16（Ver16.00.00）」
        case "scl16_00":
            $PRD_Name              = "顧客王16";
            $PRD_AbbrCode          = "scl16";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou16/";
            $VERSION_No            = "16_00_00";
            $SP_CODE_No            = $scl16_00_SP_CODE_No;
            $DATASIZE_SP           = $scl16_00_DATASIZE_SP;
            break;

        //「みんなの青色申告15 消費税8％対応申告書版（Ver15.01.00）」
        case "accper15_01":
            $PRD_Name              = "みんなの青色申告15 消費税8％対応申告書版";
            $PRD_AbbrCode          = "accper15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_01_00";
            $SP_CODE_No            = $accper15_01_SP_CODE_No;
            $DATASIZE_SP           = $accper15_01_DATASIZE_SP;
            break;

        //「みんなの青色申告15（Ver15.00.00）」
        case "accper15_00":
            $PRD_Name              = "みんなの青色申告15";
            $PRD_AbbrCode          = "accper15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_00_00";
            $SP_CODE_No            = $accper15_00_SP_CODE_No;
            $DATASIZE_SP           = $accper15_00_DATASIZE_SP;
            break;

        //「会計王15 医業対応版（Ver15.05.00）」
        case "accstd15_05":
            $PRD_Name              = "会計王15 医業対応版";
            $PRD_AbbrCode          = "accstd15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_05_00";
            $SP_CODE_No            = $accstd15_05_SP_CODE_No;
            $DATASIZE_SP           = $accstd15_05_DATASIZE_SP;
            break;

        //「会計王15 消費税8％対応申告書版（Ver15.01.00）」
        case "accstd15_01":
            $PRD_Name              = "会計王15 消費税8％対応申告書版";
            $PRD_AbbrCode          = "accstd15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_01_00";
            $SP_CODE_No            = $accstd15_01_SP_CODE_No;
            $DATASIZE_SP           = $accstd15_01_DATASIZE_SP;
            break;

        //「会計王15（Ver15.00.00）」
        case "accstd15_00":
            $PRD_Name              = "会計王15";
            $PRD_AbbrCode          = "accstd15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_00_00";
            $SP_CODE_No            = $accstd15_00_SP_CODE_No;
            $DATASIZE_SP           = $accstd15_00_DATASIZE_SP;
            break;

        //「会計王15 NPO法人スタイル 消費税8％対応申告書版（Ver15.01.00）」
        case "accnpo15_01":
            $PRD_Name              = "会計王15 NPO法人スタイル 消費税8％対応申告書版";
            $PRD_AbbrCode          = "accnpo15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_01_00";
            $SP_CODE_No            = $accnpo15_01_SP_CODE_No;
            $DATASIZE_SP           = $accnpo15_01_DATASIZE_SP;
            break;

        //「会計王15 NPO法人スタイル（Ver15.00.00）」
        case "accnpo15_00":
            $PRD_Name              = "会計王15 NPO法人スタイル";
            $PRD_AbbrCode          = "accnpo15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_00_00";
            $SP_CODE_No            = $accnpo15_00_SP_CODE_No;
            $DATASIZE_SP           = $accnpo15_00_DATASIZE_SP;
            break;

        //「会計王15 介護事業所スタイル 消費税8％対応申告書版（Ver15.01.00）」
        case "acccar15_01":
            $PRD_Name              = "会計王15 介護事業所スタイル 消費税8％対応申告書版";
            $PRD_AbbrCode          = "acccar15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_01_00";
            $SP_CODE_No            = $acccar15_01_SP_CODE_No;
            $DATASIZE_SP           = $acccar15_01_DATASIZE_SP;
            break;

        //「会計王15 介護事業所スタイル（Ver15.00.00）」
        case "acccar15_00":
            $PRD_Name              = "会計王15 介護事業所スタイル";
            $PRD_AbbrCode          = "acccar15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_00_00";
            $SP_CODE_No            = $acccar15_00_SP_CODE_No;
            $DATASIZE_SP           = $acccar15_00_DATASIZE_SP;
            break;

        //「会計王15 PRO 医業対応版（Ver15.05.00）」
        case "accnet15_05":
            $PRD_Name              = "会計王15 PRO 医業対応版";
            $PRD_AbbrCode          = "accnet15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_05_00";
            $SP_CODE_No            = $accnet15_05_SP_CODE_No;
            $DATASIZE_SP           = $accnet15_05_DATASIZE_SP;
            break;

        //「会計王15 PRO 消費税8％対応申告書版（Ver15.01.00）」
        case "accnet15_01":
            $PRD_Name              = "会計王15 PRO 消費税8％対応申告書版";
            $PRD_AbbrCode          = "accnet15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_01_00";
            $SP_CODE_No            = $accnet15_01_SP_CODE_No;
            $DATASIZE_SP           = $accnet15_01_DATASIZE_SP;
            break;

        //「会計王15 PRO（Ver15.00.00）」
        case "accnet15_00":
            $PRD_Name              = "会計王15 PRO";
            $PRD_AbbrCode          = "accnet15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_00_00";
            $SP_CODE_No            = $accnet15_00_SP_CODE_No;
            $DATASIZE_SP           = $accnet15_00_DATASIZE_SP;
            break;

        //「会計王15 医業対応版新製品（Ver15.05.00）」
        case "accmed15_05":
            $PRD_Name              = "会計王15 医業対応版新製品";
            $PRD_AbbrCode          = "accmed15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_05_00";
            $SP_CODE_No            = $accmed15_05_SP_CODE_No;
            $DATASIZE_SP           = $accmed15_05_DATASIZE_SP;
            break;

        //「給料王15 平成26年4月レベルアップ版（Ver15.01.00）」
        case "psl15_01":
            $PRD_Name              = "給料王15 平成26年4月レベルアップ版";
            $PRD_AbbrCode          = "psl15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_01_00";
            $SP_CODE_No            = $psl5_01_SP_CODE_No;
            $DATASIZE_SP           = $psl15_01_DATASIZE_SP;
            break;

        //「給料王15（Ver15.00.00）」
        case "psl15_00":
            $PRD_Name              = "給料王15";
            $PRD_AbbrCode          = "psl15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_00_00";
            $SP_CODE_No            = $psl15_00_SP_CODE_No;
            $DATASIZE_SP           = $psl15_00_DATASIZE_SP;
            break;

        //「販売王15／販売王15 販売・仕入・在庫（Ver15.00.00）」
        case "sal15_00":
            $PRD_Name              = "販売王15／販売王15 販売・仕入・在庫";
            $PRD_AbbrCode          = "sal15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_00_00";
            $SP_CODE_No            = $sal15_00_SP_CODE_No;
            $DATASIZE_SP           = $sal15_00_DATASIZE_SP;
            break;

        //「顧客王15（Ver15.00.00）」
        case "scl15_00":
            $PRD_Name              = "顧客王15";
            $PRD_AbbrCode          = "scl15";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou15/";
            $VERSION_No            = "15_00_00";
            $SP_CODE_No            = $scl15_00_SP_CODE_No;
            $DATASIZE_SP           = $scl15_00_DATASIZE_SP;
            break;

        //「みんなの青色申告14（Ver14.00.00）」
        case "accper14_00":
            $PRD_Name              = "みんなの青色申告14";
            $PRD_AbbrCode          = "accper14";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou14/";
            $VERSION_No            = "14_00_00";
            $SP_CODE_No            = $accper14_00_SP_CODE_No;
            $DATASIZE_SP           = $accper14_00_DATASIZE_SP;
            break;

        //「会計王14（Ver14.00.00）」
        case "accstd14_00":
            $PRD_Name              = "会計王14";
            $PRD_AbbrCode          = "accstd14";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou14/";
            $VERSION_No            = "14_00_00";
            $SP_CODE_No            = $accstd14_00_SP_CODE_No;
            $DATASIZE_SP           = $accstd14_00_DATASIZE_SP;
            break;

        //「会計王14 NPO法人スタイル（Ver14.00.00）」
        case "accnpo14_00":
            $PRD_Name              = "会計王14 NPO法人スタイル";
            $PRD_AbbrCode          = "accnpo14";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou14/";
            $VERSION_No            = "14_00_00";
            $SP_CODE_No            = $accnpo14_00_SP_CODE_No;
            $DATASIZE_SP           = $accnpo14_00_DATASIZE_SP;
            break;

        //「会計王14 介護事業所スタイル（Ver14.00.00）」
        case "acccar14_00":
            $PRD_Name              = "会計王14 介護事業所スタイル";
            $PRD_AbbrCode          = "acccar14";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou14/";
            $VERSION_No            = "14_00_00";
            $SP_CODE_No            = $acccar14_00_SP_CODE_No;
            $DATASIZE_SP           = $acccar14_00_DATASIZE_SP;
            break;

        //「会計王14 PRO（Ver14.00.00）」
        case "accnet14_00":
            $PRD_Name              = "会計王14 PRO";
            $PRD_AbbrCode          = "accnet14";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou14/";
            $VERSION_No            = "14_00_00";
            $SP_CODE_No            = $accnet14_00_SP_CODE_No;
            $DATASIZE_SP           = $accnet14_00_DATASIZE_SP;
            break;

        //「給料王14 平成25年4月レベルアップ版（Ver14.01.00）」
        case "psl14_01":
            $PRD_Name              = "給料王14 平成24年4月レベルアップ版";
            $PRD_AbbrCode          = "psl14";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou14/";
            $VERSION_No            = "14_01_00";
            $SP_CODE_No            = $psl14_01_SP_CODE_No;
            $DATASIZE_SP           = $psl14_01_DATASIZE_SP;
            break;

        //「給料王14（Ver14.00.00）」
        case "psl14_00":
            $PRD_Name              = "給料王14";
            $PRD_AbbrCode          = "psl14";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou14/";
            $VERSION_No            = "14_00_00";
            $SP_CODE_No            = $psl14_00_SP_CODE_No;
            $DATASIZE_SP           = $psl14_00_DATASIZE_SP;
            break;

        //「販売王14／販売王14 販売・仕入・在庫（Ver14.00.00）」
        case "sal14_00":
            $PRD_Name              = "販売王14／販売王14 販売・仕入・在庫";
            $PRD_AbbrCode          = "sal14";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou14/";
            $VERSION_No            = "14_00_00";
            $SP_CODE_No            = $sal14_00_SP_CODE_No;
            $DATASIZE_SP           = $sal14_00_DATASIZE_SP;
            break;

        //「顧客王14（Ver14.00.00）」
        case "scl14_00":
            $PRD_Name              = "顧客王14";
            $PRD_AbbrCode          = "scl14";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou14/";
            $VERSION_No            = "14_00_00";
            $SP_CODE_No            = $scl14_00_SP_CODE_No;
            $DATASIZE_SP           = $scl14_00_DATASIZE_SP;
            break;

        //「みんなの青色申告13（Ver13.00.00）」
        case "accper13_00":
            $PRD_Name              = "みんなの青色申告13";
            $PRD_AbbrCode          = "accper13";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou13/";
            $VERSION_No            = "13_00_00";
            $SP_CODE_No            = $accper13_00_SP_CODE_No;
            $DATASIZE_SP           = $accper13_00_DATASIZE_SP;
            break;

        //「会計王13（Ver13.00.00）」
        case "accstd13_00":
            $PRD_Name              = "会計王13";
            $PRD_AbbrCode          = "accstd13";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou13/";
            $VERSION_No            = "13_00_00";
            $SP_CODE_No            = $accstd13_00_SP_CODE_No;
            $DATASIZE_SP           = $accstd13_00_DATASIZE_SP;
            break;

        //「会計王13 NPO法人スタイル（Ver13.00.02）」
        case "accnpo13_02":
            $PRD_Name              = "会計王13 NPO法人スタイル";
            $PRD_AbbrCode          = "accnpo13";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou13/";
            $VERSION_No            = "13_00_02";
            $SP_CODE_No            = $accnpo13_02_SP_CODE_No;
            $DATASIZE_SP           = $accnpo13_02_DATASIZE_SP;
            break;

        //「会計王13 NPO法人スタイル（Ver13.00.00）」
        case "accnpo13_00":
            $PRD_Name              = "会計王13 NPO法人スタイル";
            $PRD_AbbrCode          = "accnpo13";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou13/";
            $VERSION_No            = "13_00_00";
            $SP_CODE_No            = $accnpo13_00_SP_CODE_No;
            $DATASIZE_SP           = $accnpo13_00_DATASIZE_SP;
            break;

        //「会計王13 介護事業所スタイル（Ver13.00.00）」
        case "acccar13_00":
            $PRD_Name              = "会計王13 介護事業所スタイル";
            $PRD_AbbrCode          = "acccar13";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou13/";
            $VERSION_No            = "13_00_00";
            $SP_CODE_No            = $acccar13_00_SP_CODE_No;
            $DATASIZE_SP           = $acccar13_00_DATASIZE_SP;
            break;

        //「会計王13 PRO（Ver13.00.00）」
        case "accnet13_00":
            $PRD_Name              = "会計王13 PRO";
            $PRD_AbbrCode          = "accnet13";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou13/";
            $VERSION_No            = "13_00_00";
            $SP_CODE_No            = $accnet13_00_SP_CODE_No;
            $DATASIZE_SP           = $accnet13_00_DATASIZE_SP;
            break;

        //「給料王13 平成24年4月レベルアップ版（Ver13.01.00）」
        case "psl13_01":
            $PRD_Name              = "給料王13 平成24年4月レベルアップ版";
            $PRD_AbbrCode          = "psl13";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou13/";
            $VERSION_No            = "13_01_00";
            $SP_CODE_No            = $psl13_01_SP_CODE_No;
            $DATASIZE_SP           = $psl13_01_DATASIZE_SP;
            break;

        //「給料王13（Ver13.00.00）」
        case "psl13_00":
            $PRD_Name              = "給料王13";
            $PRD_AbbrCode          = "psl13";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou13/";
            $VERSION_No            = "13_00_00";
            $SP_CODE_No            = $psl13_00_SP_CODE_No;
            $DATASIZE_SP           = $psl13_00_DATASIZE_SP;
            break;

        //「販売王13／販売王13 販売・仕入・在庫（Ver13.00.00）」
        case "sal13_00":
            $PRD_Name              = "販売王13／販売王13 販売・仕入・在庫";
            $PRD_AbbrCode          = "sal13";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou13/";
            $VERSION_No            = "13_00_00";
            $SP_CODE_No            = $sal13_00_SP_CODE_No;
            $DATASIZE_SP           = $sal13_00_DATASIZE_SP;
            break;

        //「顧客王13（Ver13.00.00）」
        case "scl13_00":
            $PRD_Name              = "顧客王13";
            $PRD_AbbrCode          = "scl13";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou13/";
            $VERSION_No            = "13_00_00";
            $SP_CODE_No            = $scl13_00_SP_CODE_No;
            $DATASIZE_SP           = $scl13_00_DATASIZE_SP;
            break;

        //「みんなの青色申告12（Ver12.00.00）」
        case "accper12_00":
            $PRD_Name              = "みんなの青色申告12";
            $PRD_AbbrCode          = "accper12";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou12/";
            $VERSION_No            = "12_00_00";
            $SP_CODE_No            = $accper12_00_SP_CODE_No;
            $DATASIZE_SP           = $accper12_00_DATASIZE_SP;
            break;

        //「会計王12（Ver12.00.00）」
        case "accstd12_00":
            $PRD_Name              = "会計王12";
            $PRD_AbbrCode          = "accstd12";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou12/";
            $VERSION_No            = "12_00_00";
            $SP_CODE_No            = $accstd12_00_SP_CODE_No;
            $DATASIZE_SP           = $accstd12_00_DATASIZE_SP;
            break;

        //「会計王12 NPO法人スタイル（Ver12.00.00）」
        case "accnpo12_00":
            $PRD_Name              = "会計王12 NPO法人スタイル";
            $PRD_AbbrCode          = "accnpo12";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou12/";
            $VERSION_No            = "12_00_00";
            $SP_CODE_No            = $accnpo12_00_SP_CODE_No;
            $DATASIZE_SP           = $accnpo12_00_DATASIZE_SP;
            break;

        //「会計王12 介護事業所スタイル（Ver12.00.00）」
        case "acccar12_00":
            $PRD_Name              = "会計王12 介護事業所スタイル";
            $PRD_AbbrCode          = "acccar12";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou12/";
            $VERSION_No            = "12_00_00";
            $SP_CODE_No            = $acccar12_00_SP_CODE_No;
            $DATASIZE_SP           = $acccar12_00_DATASIZE_SP;
            break;

        //「会計王12 PRO（Ver12.00.00）」
        case "accnet12_00":
            $PRD_Name              = "会計王12 PRO";
            $PRD_AbbrCode          = "accnet12";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou12/";
            $VERSION_No            = "12_00_00";
            $SP_CODE_No            = $accnet12_00_SP_CODE_No;
            $DATASIZE_SP           = $accnet12_00_DATASIZE_SP;
            break;

        //「給料王12 平成23年4月レベルアップ版（Ver12.02.00）」
        //※Ver12.01.00 は SaaS Editionのため欠番
        case "psl12_02":
            $PRD_Name              = "給料王12 平成23年4月レベルアップ版";
            $PRD_AbbrCode          = "psl12";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou12/";
            $VERSION_No            = "12_02_00";
            $SP_CODE_No            = $psl12_02_SP_CODE_No;
            $DATASIZE_SP           = $psl12_02_DATASIZE_SP;
            break;

        //「給料王12（Ver12.00.00）」
        case "psl12_00":
            $PRD_Name              = "給料王12";
            $PRD_AbbrCode          = "psl12";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou12/";
            $VERSION_No            = "12_00_00";
            $SP_CODE_No            = $psl12_00_SP_CODE_No;
            $DATASIZE_SP           = $psl12_00_DATASIZE_SP;
            break;

        //「販売王12／販売王12 販売・仕入・在庫（Ver12.00.00）」
        case "sal12_00":
            $PRD_Name              = "販売王12／販売王12 販売・仕入・在庫";
            $PRD_AbbrCode          = "sal12";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou12/";
            $VERSION_No            = "12_00_00";
            $SP_CODE_No            = $sal12_00_SP_CODE_No;
            $DATASIZE_SP           = $sal12_00_DATASIZE_SP;
            break;

        //「顧客王12（Ver12.00.00）」
        case "scl12_00":
            $PRD_Name              = "顧客王12";
            $PRD_AbbrCode          = "scl12";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou12/";
            $VERSION_No            = "12_00_00";
            $SP_CODE_No            = $scl12_00_SP_CODE_No;
            $DATASIZE_SP           = $scl12_00_DATASIZE_SP;
            break;

        //「みんなの青色申告2010（Ver11.00.00）」
        case "accper11_00":
            $PRD_Name              = "みんなの青色申告2010";
            $PRD_AbbrCode          = "accper11";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou11/";
            $VERSION_No            = "11_00_00";
            $SP_CODE_No            = $accper11_00_SP_CODE_No;
            $DATASIZE_SP           = $accper11_00_DATASIZE_SP;
            break;

        //「会計王11（Ver11.00.00）」
        case "accstd11_00":
            $PRD_Name              = "会計王11";
            $PRD_AbbrCode          = "accstd11";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou11/";
            $VERSION_No            = "11_00_00";
            $SP_CODE_No            = $accstd11_00_SP_CODE_No;
            $DATASIZE_SP           = $accstd11_00_DATASIZE_SP;
            break;

        //「会計王11 NPO Limited（Ver11.00.00）」
        case "accnpo11_00":
            $PRD_Name              = "会計王11 NPO Limited";
            $PRD_AbbrCode          = "accnpo11";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou11/";
            $VERSION_No            = "11_00_00";
            $SP_CODE_No            = $accnpo11_00_SP_CODE_No;
            $DATASIZE_SP           = $accnpo11_00_DATASIZE_SP;
            break;

        //「会計王11 PRO（Ver11.00.00）」
        case "accnet11_00":
            $PRD_Name              = "会計王11 PRO";
            $PRD_AbbrCode          = "accnet11";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou11/";
            $VERSION_No            = "11_00_00";
            $SP_CODE_No            = $accnet11_00_SP_CODE_No;
            $DATASIZE_SP           = $accnet11_00_DATASIZE_SP;
            break;

        //「給料王11 平成22年4月改正労働基準法対応版（Ver11.02.00）」
        //※Ver11.01.00 は SaaS Editionのため欠番
        case "psl11_02":
            $PRD_Name              = "給料王11 平成22年4月改正労働基準法対応版";
            $PRD_AbbrCode          = "psl11";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou11/";
            $VERSION_No            = "11_02_00";
            $SP_CODE_No            = $psl11_02_SP_CODE_No;
            $DATASIZE_SP           = $psl11_02_DATASIZE_SP;
            break;

        //「給料王11（Ver11.00.00）」
        case "psl11_00":
            $PRD_Name              = "給料王11";
            $PRD_AbbrCode          = "psl11";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou11/";
            $VERSION_No            = "11_00_00";
            $SP_CODE_No            = $psl11_00_SP_CODE_No;
            $DATASIZE_SP           = $psl11_00_DATASIZE_SP;
            break;

        //「販売王11／販売王11 販売・仕入・在庫（Ver11.00.00）」
        case "sal11_00":
            $PRD_Name              = "販売王11／販売王11 販売・仕入・在庫";
            $PRD_AbbrCode          = "sal11";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou11/";
            $VERSION_No            = "11_00_00";
            $SP_CODE_No            = $sal11_00_SP_CODE_No;
            $DATASIZE_SP           = $sal11_00_DATASIZE_SP;
            break;

        //「顧客王11（Ver11.00.00）」
        case "scl11_00":
            $PRD_Name              = "顧客王11";
            $PRD_AbbrCode          = "scl11";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou11/";
            $VERSION_No            = "11_00_00";
            $SP_CODE_No            = $scl11_00_SP_CODE_No;
            $DATASIZE_SP           = $scl11_00_DATASIZE_SP;
            break;

        //「みんなの青色申告10（Ver10.00.00）」
        case "accp10_00":
            $PRD_Name              = "みんなの青色申告10";
            $PRD_AbbrCode          = "accp10";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou10/";
            $VERSION_No            = "10_00_00";
            $SP_CODE_No            = $accp10_00_SP_CODE_No;
            $DATASIZE_SP           = $accp10_00_DATASIZE_SP;
            break;

        //「会計王10（Ver10.00.00）」
        case "acc10_00":
            $PRD_Name              = "会計王10";
            $PRD_AbbrCode          = "acc10";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou10/";
            $VERSION_No            = "10_00_00";
            $SP_CODE_No            = $acc10_00_SP_CODE_No;
            $DATASIZE_SP           = $acc10_00_DATASIZE_SP;
            break;

        //「会計王10 NPO Limited（Ver10.00.00）」
        case "accn10_00":
            $PRD_Name              = "会計王10 NPO Limited";
            $PRD_AbbrCode          = "accn10";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou10/";
            $VERSION_No            = "10_00_00";
            $SP_CODE_No            = $accn10_00_SP_CODE_No;
            $DATASIZE_SP           = $accn10_00_DATASIZE_SP;
            break;

        //「会計王10 PRO（Ver10.00.00）」
        case "accnet10_00":
            $PRD_Name              = "会計王10 PRO";
            $PRD_AbbrCode          = "accnet10";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou10/";
            $VERSION_No            = "10_00_00";
            $SP_CODE_No            = $accnet10_00_SP_CODE_No;
            $DATASIZE_SP           = $accnet10_00_DATASIZE_SP;
            break;

        //「給料王10 春版（Ver10.01.00）」
        case "psl10_01":
            $PRD_Name              = "給料王10 平成21年レベルアップ版";
            $PRD_AbbrCode          = "psl10";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou10/";
            $VERSION_No            = "10_01_00";
            $SP_CODE_No            = $psl10_01_SP_CODE_No;
            $DATASIZE_SP           = $psl10_01_DATASIZE_SP;
            break;

        //「給料王10（Ver10.00.00）」
        case "psl10_00":
            $PRD_Name              = "給料王10";
            $PRD_AbbrCode          = "psl10";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou10/";
            $VERSION_No            = "10_00_00";
            $SP_CODE_No            = $psl10_00_SP_CODE_No;
            $DATASIZE_SP           = $psl10_00_DATASIZE_SP;
            break;

        //「販売王10／販売王10 販売・仕入・在庫（Ver10.00.00）」
        case "sal10_00":
            $PRD_Name              = "販売王10／販売王10 販売・仕入・在庫";
            $PRD_AbbrCode          = "sal10";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou10/";
            $VERSION_No            = "10_00_00";
            $SP_CODE_No            = $sal10_00_SP_CODE_No;
            $DATASIZE_SP           = $sal10_00_DATASIZE_SP;
            break;

        //「顧客王10（Ver10.00.00）」
        case "scl10_00":
            $PRD_Name              = "顧客王10";
            $PRD_AbbrCode          = "scl10";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou10/";
            $VERSION_No            = "10_00_00";
            $SP_CODE_No            = $scl10_00_SP_CODE_No;
            $DATASIZE_SP           = $scl10_00_DATASIZE_SP;
            break;

        //「みんなの青色申告9（Ver9.00.00）」
        case "accp9_00":
            $PRD_Name              = "みんなの青色申告9";
            $PRD_AbbrCode          = "accp9";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou9/";
            $VERSION_No            = "9_00_00";
            $SP_CODE_No            = $accp9_00_SP_CODE_No;
            $DATASIZE_SP           = $accp9_00_DATASIZE_SP;
            $DATASIZE_MN1          = $accp9_00_DATASIZE_MN1;
            $DATASIZE_MN2          = $accp9_00_DATASIZE_MN2;
            break;

        //「会計王9（Ver9.00.00）」
        case "acc9_00":
            $PRD_Name              = "会計王9";
            $PRD_AbbrCode          = "acc9";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou9/";
            $VERSION_No            = "9_00_00";
            $SP_CODE_No            = $acc9_00_SP_CODE_No;
            $DATASIZE_SP           = $acc9_00_DATASIZE_SP;
            $DATASIZE_MN1          = $acc9_00_DATASIZE_MN1;
            $DATASIZE_MN2          = $acc9_00_DATASIZE_MN2;
            break;

        //「会計王9 NPO Limited（Ver9.00.00）」
        case "accn9_00":
            $PRD_Name              = "会計王9NPO Limited";
            $PRD_AbbrCode          = "accn9";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou9/";
            $VERSION_No            = "9_00_00";
            $SP_CODE_No            = $accn9_00_SP_CODE_No;
            $DATASIZE_SP           = $accn9_00_DATASIZE_SP;
            $DATASIZE_MN1          = $accn9_00_DATASIZE_MN1;
            $DATASIZE_MN2          = $accn9_00_DATASIZE_MN2;
            break;

        //「会計王9 PRO（Ver9.00.00）」
        case "apr9_00":
            $PRD_Name              = "会計王9PRO";
            $PRD_AbbrCode          = "apr9";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou9/";
            $VERSION_No            = "9_00_00";
            $SP_CODE_No            = $apr9_00_SP_CODE_No;
            $DATASIZE_SP           = $apr9_00_DATASIZE_SP;
            $DATASIZE_MN1          = $apr9_00_DATASIZE_MN1;
            $DATASIZE_MN2          = $apr9_00_DATASIZE_MN2;
            break;

        //「給料王9 春版（Ver9.01.00）」
        case "psl9":
            $PRD_Name              = "給料王9 平成20年春版";
            $PRD_AbbrCode          = "psl09";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou9/";
            $VERSION_No            = "9_01_00";
            $SP_CODE_No            = $psl9_01_SP_CODE_No;
            $DATASIZE_SP           = $psl9_01_DATASIZE_SP;
            $DATASIZE_MN1          = $psl9_01_DATASIZE_MN1;
            $DATASIZE_MN2          = $psl9_01_DATASIZE_MN2;
            break;

        //「給料王9（Ver9.00.00）」
        case "psl9_00":
            $PRD_Name              = "給料王9";
            $PRD_AbbrCode          = "psl09";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou9/";
            $VERSION_No            = "9_00_00";
            $SP_CODE_No            = $psl9_00_SP_CODE_No;
            $DATASIZE_SP           = $psl9_00_DATASIZE_SP;
            $DATASIZE_MN1          = $psl9_00_DATASIZE_MN1;
            $DATASIZE_MN2          = $psl9_00_DATASIZE_MN2;
            break;

        //「販売王9／販売王9 販売・仕入・在庫（Ver9.00.00）」
        case "sal9_00":
            $PRD_Name              = "販売王9／販売王9 販売・仕入・在庫";
            $PRD_AbbrCode          = "sal09";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou9/";
            $VERSION_No            = "9_00_00";
            $SP_CODE_No            = $sal9_00_SP_CODE_No;
            $DATASIZE_SP           = $sal9_00_DATASIZE_SP;
            $DATASIZE_MN1          = $sal9_00_DATASIZE_MN1;
            $DATASIZE_MN2          = $sal9_00_DATASIZE_MN2;
            break;

        //「顧客王9（Ver9.00.00）」
        case "scl9_00":
            $PRD_Name              = "顧客王9";
            $PRD_AbbrCode          = "scl09";
            $SP_DOWNLOAD_Directory = $SP_DOWNLOAD_SERVER . "ou9/";
            $VERSION_No            = "9_00_00";
            $SP_CODE_No            = $scl9_00_SP_CODE_No;
            $DATASIZE_SP           = $scl9_00_DATASIZE_SP;
            $DATASIZE_MN1          = $scl9_00_DATASIZE_MN1;
            $DATASIZE_MN2          = $scl9_00_DATASIZE_MN2;
            break;
    }
// VinhDao パートナー（SAAG/SOSP/SOUP）会員サイト 修正↑
?>