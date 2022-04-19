<?php
    /////////////////////////////////////////////////////////////////////////////////////////
    // 
    //  各製品の最新バージョンを一元管理するファイルです。
    //  2019/10/03  Kentaro.Watanabe wrote
    //
    //  ■対象
    //    [A] 発売製品(新製品)          : NEW
    //    [B] 発送製品(ホワイトパック)  : WHP
    //    [C] 30日無料版/無料体験版     : TRIAL
    //    [D] カタログ・資料請求        : DOC
    //
    //  ◆SMB製品
    //      会計王                    : accstd
    //      会計王PRO                 : accnet
    //      会計王NPO法人スタイル     : accnpo
    //      会計王介護事業所スタイル  : acccar
    //      みんなの青色申告          : accper
    //      ＭＡ１                    : accmed
    //      給料王                    : psl
    //      販売王                    : sal
    //      販売王 販売・仕入・在庫   : spr
    //      顧客王                    : scl
    //
    //  ◆農業製品
    //      農業簿記                  : nbk
    //      農業日誌                  : nns
    //
    /////////////////////////////////////////////////////////////////////////////////////////


    // [A] 発売製品(新製品)
    global $VER_NEW;
    global $VER_NEW_accstd;
    global $VER_NEW_accnet;
    global $VER_NEW_accnpo;
    global $VER_NEW_acccar;
    global $VER_NEW_accper;
    global $VER_NEW_accmed;
    global $VER_NEW_psl;
    global $VER_NEW_sal;
    global $VER_NEW_spr;
    global $VER_NEW_scl;

    global $VER_NEW_nbk;
    global $VER_NEW_nns;
     
//　↓↓　2020/11/18　<YenNhi> <version 21>
    // $VER_NEW = "20";
    // $VER_NEW_accstd = "20";
    // $VER_NEW_accnet = $VER_NEW_accstd;
    // $VER_NEW_accnpo = $VER_NEW_accstd;
    // $VER_NEW_acccar = $VER_NEW_accstd;
    // $VER_NEW_accper = "20";
     $VER_NEW_accmed = "20";
    // $VER_NEW_psl = "20";
    $VER_NEW = "21";
    $VER_NEW_accstd = "21";
    $VER_NEW_accnet = $VER_NEW_accstd;
    $VER_NEW_accnpo = $VER_NEW_accstd;
    $VER_NEW_acccar = $VER_NEW_accstd;
    $VER_NEW_accper = "21";
    $VER_NEW_psl = "21";

    // $VER_NEW_sal = "20";
    // $VER_NEW_spr = $VER_NEW_sal;
    // $VER_NEW_scl = "20";

    // $VER_NEW_nbk = "11";
    // $VER_NEW_nns = "V6プラス";
//　↑　2020/11/18　<YenNhi> <version 21>

    // [B] 発送製品(ホワイトパック)
    global $VER_WHP;
    global $VER_WHP_accstd;
    global $VER_WHP_accnet;
    global $VER_WHP_accnpo;
    global $VER_WHP_acccar;
    global $VER_WHP_accper;
    global $VER_WHP_accmed;
    global $VER_WHP_psl;
    global $VER_WHP_sal;
    global $VER_WHP_spr;
    global $VER_WHP_scl;

    global $VER_WHP_nbk;
    global $VER_WHP_nns;

//　↓　2020/11/18　Kentaro.Watanabre mod
    $VER_WHP        = "21";
    $VER_WHP_accstd = "21";
    $VER_WHP_accnet = $VER_WHP_accstd;
    $VER_WHP_accnpo = $VER_WHP_accstd;
    $VER_WHP_acccar = $VER_WHP_accstd;
    $VER_WHP_accper = "21";
    $VER_WHP_accmed = "21";
    $VER_WHP_psl = "21";
//　↑　2020/11/18　Kentaro.Watanabre mod

//↓↓　<2020/11/23> <YenNhi> <do not realise >
    // $VER_WHP_sal = "20";
    // $VER_WHP_spr = $VER_WHP_sal;
    // $VER_WHP_scl = "20";

    // $VER_WHP_nbk = "11";
    // $VER_WHP_nns = "V6プラス";
//↑↑ <2020/11/23> <YenNhi> <do not realise> 

    // [C] 30日無料版/無料体験版
    // addname は、free_user_bun_s_nm / DownloadProductName2 に登録する値です。
    // size_prg はプログラムファイルのデータサイズ、size_mn1 はマニュアル１のデータサイズです。
    global $VER_TRIAL;
    global $VER_TRIAL_acc;
    global $VER_TRIAL_accstd;
    global $VER_TRIAL_accnet;
    global $VER_TRIAL_accnpo;
    global $VER_TRIAL_acccar;
    global $VER_TRIAL_accper;
    global $VER_TRIAL_accmed;
    global $VER_TRIAL_psl;
    global $VER_TRIAL_sal;
    global $VER_TRIAL_spr;
    global $VER_TRIAL_scl;
    global $VER_TRIAL_nbk;
    global $VER_TRIAL_nns;
    global $VER_TRIAL_min;
    global $VER_TRIAL_newest;
    global $VER_TRIAL_newestmin;

    global $VER_TRIAL_accstd_addname;
    global $VER_TRIAL_accnet_addname;
    global $VER_TRIAL_accnpo_addname;
    global $VER_TRIAL_acccar_addname;
    global $VER_TRIAL_accper_addname;
    global $VER_TRIAL_accmed_addname;
    global $VER_TRIAL_psl_addname;
    global $VER_TRIAL_sal_addname;
    global $VER_TRIAL_spr_addname;
    global $VER_TRIAL_scl_addname;
    global $VER_TRIAL_nbk_addname;
    global $VER_TRIAL_nns_addname;

    global $VER_TRIAL_accstd_size_prg;
    global $VER_TRIAL_accnet_size_prg;
    global $VER_TRIAL_accnpo_size_prg;
    global $VER_TRIAL_acccar_size_prg;
    global $VER_TRIAL_accper_size_prg;
    global $VER_TRIAL_accmed_size_prg;
    global $VER_TRIAL_psl_size_prg;
    global $VER_TRIAL_sal_size_prg;
    global $VER_TRIAL_spr_size_prg;
    global $VER_TRIAL_scl_size_prg;
    global $VER_TRIAL_nbk_size_prg;
    global $VER_TRIAL_nns_size_prg;

    global $VER_TRIAL_accstd_size_mn1;
    global $VER_TRIAL_accnet_size_mn1;
    global $VER_TRIAL_accnpo_size_mn1;
    global $VER_TRIAL_acccar_size_mn1;
    global $VER_TRIAL_accper_size_mn1;
    global $VER_TRIAL_accmed_size_mn1;
    global $VER_TRIAL_psl_size_mn1;
    global $VER_TRIAL_sal_size_mn1;
    global $VER_TRIAL_spr_size_mn1;
    global $VER_TRIAL_scl_size_mn1;
    global $VER_TRIAL_nbk_size_mn1;
    global $VER_TRIAL_nns_size_mn1;

//　↓　2020/11/18　Kentaro.Watanabre mod
    $VER_TRIAL = "21";
    $VER_TRIAL_acc = "21";
    $VER_TRIAL_accstd = "21";
    $VER_TRIAL_accnet = $VER_TRIAL_accstd;
    $VER_TRIAL_accnpo = $VER_TRIAL_accstd;
    $VER_TRIAL_acccar = $VER_TRIAL_accstd;
    $VER_TRIAL_accper = "21";
    $VER_TRIAL_accmed = "21";
    $VER_TRIAL_psl = "21";
//　↑　2020/11/18　Kentaro.Watanabre mod

//↓↓　<2020/11/23> <YenNhi> <do not realise> 
    // $VER_TRIAL_sal = "20";
    // $VER_TRIAL_spr = $VER_TRIAL_sal;
    // $VER_TRIAL_scl = "20";
    // $VER_TRIAL_nbk = "11";
//↑↑ <2020/11/23> <YenNhi> <do not realise> 

//　↓↓　＜2020/10/06＞　＜VinhDao＞　＜追加＞
    $VER_TRIAL_gbk = "20";
//　↑↑　＜2020/10/06＞　＜VinhDao＞　＜追加＞
//↓↓　<2020/11/23> <YenNhi> <do not realise>
    // $VER_TRIAL_nns = "V6プラス";
    $VER_TRIAL_nns_cd = "6p";
    // $VER_TRIAL_min = "20";
    // $VER_TRIAL_newest = "20";
    // $VER_TRIAL_newestmin = "20";
    $VER_TRIAL_min = "21";
    $VER_TRIAL_newest = "21";
    $VER_TRIAL_newestmin = "21";
//↑↑ <2020/11/23> <YenNhi> <do not realise> 


    // ※半角文字は使用できません
    $VER_TRIAL_accstd_addname = "";
    $VER_TRIAL_accnet_addname = "";
    $VER_TRIAL_accnpo_addname = "";
    $VER_TRIAL_acccar_addname = "";
    $VER_TRIAL_accper_addname = "";
    $VER_TRIAL_accmed_addname = "";
    $VER_TRIAL_psl_addname = "";
    $VER_TRIAL_sal_addname = "新元号対応版";
    $VER_TRIAL_spr_addname = "新元号対応版";
    $VER_TRIAL_scl_addname = "新元号対応版";
    $VER_TRIAL_nbk_addname = "";
    $VER_TRIAL_nns_addname = "";
//　↓↓　＜2020/10/06＞　＜VinhDao＞　＜追加＞
    $VER_TRIAL_gbk_addname = "";
//　↑↑　＜2020/10/06＞　＜VinhDao＞　＜追加＞

    $VER_TRIAL_accstd_size_prg = "111MB";
    $VER_TRIAL_accnet_size_prg = "222MB";
    $VER_TRIAL_accnpo_size_prg = "333MB";
    $VER_TRIAL_acccar_size_prg = "444MB";
    $VER_TRIAL_accper_size_prg = "555MB";
    $VER_TRIAL_accmed_size_prg = "xxxMB";
    $VER_TRIAL_psl_size_prg = "666MB";
    $VER_TRIAL_sal_size_prg = "777MB";
    $VER_TRIAL_spr_size_prg = "888MB";
    $VER_TRIAL_scl_size_prg = "999MB";
    $VER_TRIAL_nbk_size_prg = "132MB";
    $VER_TRIAL_nns_size_prg = "18.1MB";

    $VER_TRIAL_accstd_size_mn1 = "111KB";
    $VER_TRIAL_accnet_size_mn1 = "222KB";
    $VER_TRIAL_accnpo_size_mn1 = "333KB";
    $VER_TRIAL_acccar_size_mn1 = "444KB";
    $VER_TRIAL_accper_size_mn1 = "555KB";
    $VER_TRIAL_accmed_size_mn1 = "xxxKB";
    $VER_TRIAL_psl_size_mn1 = "666KB";
    $VER_TRIAL_sal_size_mn1 = "777KB";
    $VER_TRIAL_spr_size_mn1 = "888KB";
    $VER_TRIAL_scl_size_mn1 = "999KB";
    $VER_TRIAL_nbk_size_mn1 = "11KB";
    $VER_TRIAL_nns_size_mn1 = "1.0MB";

    // [D] カタログ・資料請求

    global $VER_DOC_accstd;
    global $VER_DOC_accnet;
    global $VER_DOC_accnpo;
    global $VER_DOC_acccar;
    global $VER_DOC_accper;
    global $VER_DOC_accmed;
    global $VER_DOC_psl;
    global $VER_DOC_sal;
    global $VER_DOC_spr;
    global $VER_DOC_scl;

    global $VER_DOC_nbk;
    global $VER_DOC_nns;
//↓↓　<2020/11/20> <YenNhi> <version 21>
    // $VER_DOC_accstd = "20";
    $VER_DOC_accstd = "21";
    $VER_DOC_accnet = $VER_DOC_accstd;
    $VER_DOC_accnpo = $VER_DOC_accstd;
    $VER_DOC_acccar = $VER_DOC_accstd;
    // $VER_DOC_accper = "20";
    // $VER_DOC_accmed = "20";
    // $VER_DOC_psl = "20";
    $VER_DOC_accper = $VER_DOC_accstd;
    $VER_DOC_accmed = $VER_DOC_accstd;
    $VER_DOC_psl = $VER_DOC_accstd;

    // $VER_DOC_sal = "20";
    // $VER_DOC_spr = $VER_DOC_sal;
    // $VER_DOC_scl = "20";

    // $VER_DOC_nbk = "11";
    // $VER_DOC_nns = "V6プラス";
    //↓↓　<2020/11/20> <YenNhi> <version 21>

    if ( !function_exists('formatSizeUnits') ) {
        function formatSizeUnits($bytes){
            if ($bytes >= 1073741824) {
                $bytes = number_format($bytes / 1073741824, 2) . ' GB';
            }
            elseif ($bytes >= 1048576) {
                $bytes = number_format($bytes / 1048576, 2) . ' MB';
            }
            elseif ($bytes >= 1024) {
                $bytes = number_format($bytes / 1024, 2) . ' KB';
            }
            elseif ($bytes > 1) {
                $bytes = $bytes . ' bytes';
            }
            elseif ($bytes == 1) {
                $bytes = $bytes . ' byte';
            }
            else {
                $bytes = '0 bytes';
            }

            return $bytes;
        }
    }

    if ( !function_exists('getFileSizeFromURL') ) {
        function getFileSizeFromURL(string $url) {
            $header = get_headers($url, 1);
            return formatSizeUnits( $header['Content-Length'] );
        }
    }
