<?php
    /////////////////////////////////////////////////////////////////////////////////////////
    // 
    // フォームなどからメールを送信する際に使用する設定情報
    // 2019/02/14
    // 
    /////////////////////////////////////////////////////////////////////////////////////////

    /////////////////////////////////////////////////////////////////////////////////////////
    // SMTPサーバーの設定です。
    /////////////////////////////////////////////////////////////////////////////////////////

    // ソリマチのメールサーバー
    global $SMTP_SERVER_SORIMACHI_NAME;
    $SMTP_SERVER_SORIMACHI_NAME = "mail.sorimachi.co.jp";

    // Gmail
    global $SMTP_SERVER_GMAIL1_NAME;
    $SMTP_SERVER_GMAIL1_NAME = "";

    // SMTPサーバーの認証情報です。
    // 2019/02/15現在、申請済

    global $USER_SMTP_SERVER_SORIMACHI;
    global $PASS_SMTP_SERVER_SORIMACHI;

    // PASSWORDは暗号化が必要か、要検討
    $USER_SMTP_SERVER_SORIMACHI = "postmaster";
    $PASS_SMTP_SERVER_SORIMACHI = "sgvPM2030";

    global $USER_SMTP_SERVER_GMAIL1;
    global $PASS_SMTP_SERVER_GMAIL1;

    $USER_SMTP_SERVER_GMAIL1 = "xxx@gmail.com";
    $PASS_SMTP_SERVER_GMAIL1 = "xxxxxxx";

    /////////////////////////////////////////////////////////////////////////////////////////
    // 各サービスの送信元(from)と送信先(to)、BCC送信先の設定です。
    // サービスごとに設定を追加してください。
    /////////////////////////////////////////////////////////////////////////////////////////

    // SAAG資料請求フォーム
    // https://partner.sorimachi.co.jp/saag/request_saag.html
    // http://192.168.8.214:8001/saag/request_saag.html

    global $MAILFROM_SAAG_REQUEST_FORM;
    global $MAILTO_SAAG_REQUEST_FORM;
    global $MAILBCC_SAAG_REQUEST_FORM;

    $MAILFROM_SAAG_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp";
    // $MAILFROM_SAAG_REQUEST_FORM = "partner@mail.sorimachi.co.jp";
    // $MAILTO_SAAG_REQUEST_FORM = (form_value);
    // $MAILTO_SAAG_REQUEST_FORM = "SAAG資料請求フォーム・テスト<k_watanabe@mail.sorimachi.co.jp>";
    // $MAILBCC_SAAG_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp,postmaster@mail.sorimachi.co.jp,y-sueyoshi@mail.sorimachi.co.jp";
    $MAILBCC_SAAG_REQUEST_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    // $MAILTO_SAAG_REQUEST_FORM = "xuanchhoa@mail.sorimachi.co.jp";
    // $MAILTO_SAAG_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp,doralice010@gmail.com";
    $MAILTO_SAAG_REQUEST_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    // $MAILBCC_SAAG_REQUEST_FORM = "";

    // SOSP資料請求フォーム
    // https://partner.sorimachi.co.jp/sosp/request_sosp.html
    // http://192.168.8.214:8001/sosp/request_sosp.html

    global $MAILFROM_SOSP_REQUEST_FORM;
    global $MAILTO_SOSP_REQUEST_FORM;
    global $MAILBCC_SOSP_REQUEST_FORM;

    $MAILFROM_SOSP_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp";
    // $MAILFROM_SOSP_REQUEST_FORM = "partner@mail.sorimachi.co.jp";
    // $MAILTO_SOSP_REQUEST_FORM = (form_value);
    // $MAILTO_SOSP_REQUEST_FORM = "SOSP資料請求フォーム・テスト<k_watanabe@mail.sorimachi.co.jp>";
    // $MAILBCC_SOSP_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp,postmaster@mail.sorimachi.co.jp,y-sueyoshi@mail.sorimachi.co.jp";
    $MAILBCC_SOSP_REQUEST_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    // $MAILTO_SOSP_REQUEST_FORM = "xuanchhoa@mail.sorimachi.co.jp";
    // $MAILTO_SOSP_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp,doralice010@gmail.com";
    $MAILTO_SOSP_REQUEST_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    // $MAILBCC_SOSP_REQUEST_FORM = "";

    // SOUP資料請求フォーム
    // https://partner.sorimachi.co.jp/soup/request_soup.html
    // http://192.168.8.214:8001/soup/request_soup.html

    global $MAILFROM_SOUP_REQUEST_FORM;
    global $MAILTO_SOUP_REQUEST_FORM;
    global $MAILBCC_SOUP_REQUEST_FORM;

    $MAILFROM_SOUP_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp";
    // $MAILFROM_SOUP_REQUEST_FORM = "partner@mail.sorimachi.co.jp";
    // $MAILTO_SOUP_REQUEST_FORM = (form_value);
    // $MAILTO_SOUP_REQUEST_FORM = "SOUP資料請求フォーム・テスト<k_watanabe@mail.sorimachi.co.jp>";
    // $MAILBCC_SOUP_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp,postmaster@mail.sorimachi.co.jp,y-sueyoshi@mail.sorimachi.co.jp";
    $MAILBCC_SOUP_REQUEST_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    // $MAILTO_SOUP_REQUEST_FORM = "xuanchhoa@mail.sorimachi.co.jp";
    // $MAILTO_SOUP_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp,doralice010@gmail.com";
    $MAILTO_SOUP_REQUEST_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    // $MAILBCC_SOUP_REQUEST_FORM = "";

    // SOI資料請求フォーム
    // https://partner.sorimachi.co.jp/soi/request_soi.html
    // http://192.168.8.214:8001/soi/request_soi.html

    global $MAILFROM_SOI_REQUEST_FORM;
    global $MAILTO_SOI_REQUEST_FORM;
    global $MAILBCC_SOI_REQUEST_FORM;

    $MAILFROM_SOI_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp";
    // $MAILFROM_SOI_REQUEST_FORM = "partner@mail.sorimachi.co.jp";
    // $MAILTO_SOI_REQUEST_FORM = (form_value);
    // $MAILTO_SOI_REQUEST_FORM = "SOI資料請求フォーム・テスト<k_watanabe@mail.sorimachi.co.jp>";
    // $MAILBCC_SOI_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp,postmaster@mail.sorimachi.co.jp,y-sueyoshi@mail.sorimachi.co.jp";
    $MAILBCC_SOI_REQUEST_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    // $MAILTO_SOI_REQUEST_FORM = "xuanchhoa@mail.sorimachi.co.jp";
    // $MAILTO_SOI_REQUEST_FORM = "k_watanabe@mail.sorimachi.co.jp,doralice010@gmail.com";
    $MAILTO_SOI_REQUEST_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    // $MAILBCC_SOI_REQUEST_FORM = "";

    // SAAG会員サイト お問合せフォーム(SAAG-member-contact)
    // https://partner.sorimachi.co.jp/saag/member/contact
    // http://192.168.8.214:8001/saag/member/contact

    global $MAILFROM_SAAG_MCONTACT_FORM;
    global $MAILTO_SAAG_MCONTACT_FORM;
    global $MAILBCC_SAAG_MCONTACT_FORM;

    $MAILFROM_SAAG_MCONTACT_FORM = "k_watanabe@mail.sorimachi.co.jp";
    // $MAILTO_SAAG_MCONTACT_FORM = (form_value);
    // $MAILTO_SAAG_MCONTACT_FORM = "SAAGお問合せフォーム・テスト<k_watanabe@mail.sorimachi.co.jp>";
    // $MAILBCC_SAAG_MCONTACT_FORM = "k_watanabe@mail.sorimachi.co.jp,postmaster@mail.sorimachi.co.jp,y-sueyoshi@mail.sorimachi.co.jp";
    $MAILBCC_SAAG_MCONTACT_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    // $MAILTO_SAAG_REQUEST_FORM = "doralice010@gmail.com,k_watanabe@mail.sorimachi.co.jp";
    $MAILTO_SAAG_REQUEST_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    $MAILTO_SAAG_MCONTACT_FORM = "vinh-dao@mail.sorimachi.co.jp";
    // $MAILBCC_SAAG_MCONTACT_FORM = "";

    // SOSP会員サイト お問合せフォーム(SOSP-member-contact)
    // https://partner.sorimachi.co.jp/sosp/member/contact
    // http://192.168.8.214:8001/sosp/member/contact

    global $MAILFROM_SOSP_MCONTACT_FORM;
    global $MAILTO_SOSP_MCONTACT_FORM;
    global $MAILBCC_SOSP_MCONTACT_FORM;

    $MAILFROM_SOSP_MCONTACT_FORM = "k_watanabe@mail.sorimachi.co.jp";
    // $MAILTO_SOSP_MCONTACT_FORM = (form_value);
    // $MAILTO_SOSP_MCONTACT_FORM = "SOSPお問合せフォーム・テスト<k_watanabe@mail.sorimachi.co.jp>";
    // $MAILBCC_SOSP_MCONTACT_FORM = "k_watanabe@mail.sorimachi.co.jp,postmaster@mail.sorimachi.co.jp,y-sueyoshi@mail.sorimachi.co.jp";
    $MAILBCC_SOSP_MCONTACT_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    $MAILTO_SOSP_MCONTACT_FORM = "xuanchhoa@mail.sorimachi.co.jp";
    // $MAILBCC_SOSP_MCONTACT_FORM = "";

    // SOSP会員サイト 販促物請求フォーム(SOSP-member-ordersp)
    // https://partner.sorimachi.co.jp/sosp/member/ordersp
    // http://192.168.8.214:8001/sosp/member/ordersp

    global $MAILFROM_SOSP_MORDERSP_FORM;
    global $MAILTO_SOSP_MORDERSP_FORM;
    global $MAILBCC_SOSP_MORDERSP_FORM;

    $MAILFROM_SOSP_MORDERSP_FORM = "k_watanabe@mail.sorimachi.co.jp";
    // $MAILTO_SOSP_MORDERSP_FORM = (form_value);
    // $MAILTO_SOSP_MORDERSP_FORM = "SOSP販促物請求フォーム・テスト<k_watanabe@mail.sorimachi.co.jp>";
    // $MAILBCC_SOSP_MORDERSP_FORM = "k_watanabe@mail.sorimachi.co.jp,postmaster@mail.sorimachi.co.jp,y-sueyoshi@mail.sorimachi.co.jp";
    $MAILBCC_SOSP_MORDERSP_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    $MAILTO_SOSP_MORDERSP_FORM = "xuanchhoa@mail.sorimachi.co.jp";
    // $MAILBCC_SOSP_MORDERSP_FORM = "";

    // SOUP会員サイト お問合せフォーム(SOUP-member-contact)
    // https://partner.sorimachi.co.jp/soup/member/contact
    // http://192.168.8.214:8001/soup/member/contact

    global $MAILFROM_SOUP_MCONTACT_FORM;
    global $MAILTO_SOUP_MCONTACT_FORM;
    global $MAILBCC_SOUP_MCONTACT_FORM;

    $MAILFROM_SOUP_MCONTACT_FORM = "k_watanabe@mail.sorimachi.co.jp";
    // $MAILTO_SOUP_MCONTACT_FORM = (form_value);
    // $MAILTO_SOUP_MCONTACT_FORM = "SOUPお問合せフォーム・テスト<k_watanabe@mail.sorimachi.co.jp>";
    // $MAILBCC_SOUP_MCONTACT_FORM = "k_watanabe@mail.sorimachi.co.jp,postmaster@mail.sorimachi.co.jp,y-sueyoshi@mail.sorimachi.co.jp";
    $MAILBCC_SOUP_MCONTACT_FORM = "vinh-dao@mail.sorimachi.co.jp,xuanchhoa@mail.sorimachi.co.jp";
    $MAILTO_SOUP_MCONTACT_FORM = "xuanchhoa@mail.sorimachi.co.jp";
    // $MAILBCC_SOUP_MCONTACT_FORM = "";

    // オンラインユーザー登録「シリアルNo登録範囲外エラー」メール
    global $MAILTO_USERREG_NOUGYO;
    global $MAILTO_USERREG_SMB;
    global $MAILTO_USERREG_ADDONE_SMB;
    global $MAILFROM_USERREG;
    global $MAILBCC_USERREG;
    global $MAILCC_USERREG;

    // 2020/10/07 日本側でテスト用に変更しました
    // $MAILBCC_USERREG_NOUGYO = "onaka@mail.sorimachi.co.jp,sakaya@mail.sorimachi.co.jp,m-satou@mail.sorimachi.co.jp,hosoi@mail.sorimachi.co.jp,takezawa@mail.sorimachi.co.jp,sibano@mail.sorimachi.co.jp,haruka-suganuma@mail.sorimachi.co.jp";
    $MAILBCC_USERREG_NOUGYO = "k_watanabe@mail.sorimachi.co.jp,haruka-suganuma@mail.sorimachi.co.jp";
    $MAILTO_USERREG_NOUGYO = "postmaster@mail.sorimachi.co.jp";
    // $MAILBCC_USERREG_NOUGYO = 'vinh-dao@mail.sorimachi.co.jp';
    // $MAILTO_USERREG_NOUGYO = 'khanhdinh@mail.sorimachi.co.jp';
    // $MAILTO_USERREG_NOUGYO = "xuanchhoa@mail.sorimachi.co.jp";
    // $MAILTO_USERREG_NOUGYO = "haruka-suganuma@mail.sorimachi.co.jp";
    // $MAILBCC_USERREG_SMB = "y-nagao@mail.sorimachi.co.jp,r-utsumi@mail.sorimachi.co.jp,hosoi@mail.sorimachi.co.jp,takezawa@mail.sorimachi.co.jp,sibano@mail.sorimachi.co.jp,haruka-suganuma@mail.sorimachi.co.jp";
    // $MAILTO_USERREG_SMB = "postmaster@mail.sorimachi.co.jp";
    // $MAILTO_USERREG_SMB = "vinh-dao@mail.sorimachi.co.jp";
    $MAILTO_USERREG_SMB = "haruka-suganuma@mail.sorimachi.co.jp";
    $MAILTO_USERREG_SMB = "k_watanabe@mail.sorimachi.co.jp";
    // $MAILBCC_USERREG_SMB = "k_watanabe@mail.sorimachi.co.jp,haruka-suganuma@mail.sorimachi.co.jp";
    // $MAILBCC_USERREG_SMB = "vinh-dao@mail.sorimachi.co.jp";
    // $MAILTO_USERREG_SMB = "khanhdinh@mail.sorimachi.co.jp";
    // 2020/10/12 追加 Kentaro.Watanabe
    $MAILTO_USERREG_ADDONE_SMB = "postmaster@mail.sorimachi.co.jp";
    $MAILFROM_USERREG = "ソリマチ株式会社 <regist@mail.sorimachi.co.jp>";
    $MAILBCC_USERREG = "sori_information@mail.sorimachi.co.jp,k_watanabe@mail.sorimachi.co.jp,haruka-suganuma@mail.sorimachi.co.jp";
    // $MAILBCC_USERREG = "k_watanabe@mail.sorimachi.co.jp,doralice010@gmail.com";
    $MAILCC_USERREG = "";
    
    // Seminar
    global $MAILFROM_INFO_SEMINAR_A;
    global $MAILTO_INFO_SEMINAR_A;
    global $MAILBCC_INFO_SEMINAR_A;

    $MAILFROM_INFO_SEMINAR_A = "ソリマチセミナーA<seminar@mail.sorimachi.co.jp>";
    $MAILTO_INFO_SEMINAR_A = "vinh-dao@mail.sorimachi.co.jp";
    $MAILBCC_INFO_SEMINAR_A = "";

    global $MAILFROM_INFO_SEMINAR_C;
    global $MAILTO_INFO_SEMINAR_C;
    global $MAILBCC_INFO_SEMINAR_C;

    $MAILFROM_INFO_SEMINAR_C = "ソリマチセミナーC<seminar@mail.sorimachi.co.jp>";
    $MAILTO_INFO_SEMINAR_C = "vinh-dao@mail.sorimachi.co.jp";
    $MAILBCC_INFO_SEMINAR_C = "";
    
    global $MAILFROM_INFO_SEMINAR_D;
    global $MAILTO_INFO_SEMINAR_D;
    global $MAILBCC_INFO_SEMINAR_D;

    $MAILFROM_INFO_SEMINAR_D = "ソリマチセミナーD<seminar@mail.sorimachi.co.jp>";
    $MAILTO_INFO_SEMINAR_D = "vinh-dao@mail.sorimachi.co.jp";
    $MAILBCC_INFO_SEMINAR_D = "";

// Bellsoft Maruyama add 2020/02/10 from
    /////////////////////////////////////////////////////////////////////////////////////////
    // PHP標準のmail関数、mb_send_mail関数のかわりに使用する関数です（AWS環境ではPHP標準のmail関数が使用できないため）
    /////////////////////////////////////////////////////////////////////////////////////////
    require_once dirname(__FILE__).'/phpmailer/PHPMailer.php';
    require_once dirname(__FILE__).'/phpmailer/SMTP.php';
    require_once dirname(__FILE__).'/phpmailer/POP3.php';
    require_once dirname(__FILE__).'/phpmailer/Exception.php';
    require_once dirname(__FILE__).'/phpmailer/OAuth.php';
    require_once dirname(__FILE__).'/phpmailer/phpmailer.lang-ja.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // function send_mail_PHPMailer($to, $subject, $message, $from = null, $additional_parameter = null) {
    //     // TODO 複数の宛先には対応していません。($to をカンマ区切りにしたり、配列にしてもだめです)
    //     // TODO $additional_parameter は無視します（SPF対応(-f)のためだけに使っているようなので。setFromメソッド が自動的にSPF対応してくれます）

    //     date_default_timezone_set('Asia/Tokyo');
    //     mb_language("ja");

    //     $mail = new PHPMailer(true);

    //     global $SMTP_SERVER_SORIMACHI_NAME;
    //     global $USER_SMTP_SERVER_SORIMACHI;
    //     global $PASS_SMTP_SERVER_SORIMACHI;

    //     //Server settings
    //     //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
    //     $mail->isSMTP();                                            // Send using SMTP
    //     $mail->Host       = $SMTP_SERVER_SORIMACHI_NAME;            // Set the SMTP server to send through
    //     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    //     $mail->Username   = $USER_SMTP_SERVER_SORIMACHI;            // SMTP username
    //     $mail->Password   = $PASS_SMTP_SERVER_SORIMACHI;            // SMTP password

    //     //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    //     $mail->Port       = 587;                                    // TCP port to connect to

    //     $mail->CharSet = 'UTF-8';

    //     //Recipients
    //     $mail->AddAddress($to);

    //     if (!is_null($from)) {
    //         // そり蔵の既存のソースが、From: xxxxx\r\n で渡してくるので対応する。
    //         // From: xxxxx\r\n の形式を分割する。 \sではなく[\p{C}\p{Z}]なのは、改行文字を取り除くため。
    //         $val = preg_split('/:[\p{C}\p{Z}]?/', $from);
    //         $fromVal = null;
    //         if (count($val) == 1) {
    //             // From: xxxxx\r\n の形式ではなかった場合
    //             $fromVal = $val[0];
    //         }
    //         else if (count($val) == 2 && mb_strtolower($val[0]) == "from") {
    //             // From: xxxxx\r\n の形式の場合
    //             $fromVal = $val[1];
    //         }

    //         if (!is_null($fromVal)) {
    //             // setFromメソッドは、自動でSPF対応（envelope sender を設定）してくれる。
    //             // 参考
    //             // https://phpmailer.github.io/PHPMailer/classes/PHPMailer.PHPMailer.PHPMailer.html#method_setFrom
    //             // https://phpmailer.github.io/PHPMailer/classes/PHPMailer.PHPMailer.PHPMailer.html#property_Sender
    //             $mail->setFrom($fromVal);
    //         }
    //     }

    //     // Content
    //     $mail->isHTML(false);
    //     $mail->Subject = $subject;
    //     $mail->Body    = $message;

    //     $mail->send();
    // }
// Bellsoft Maruyama add 2020/02/10 end
 
// ↓↓　<2020/06/29> <VinhDao> <From値の名前をチェックする。>
    function send_mail_PHPMailer($to, $subject, $message, $from = null, $additional_parameter = null) {
        // TODO 複数の宛先には対応していません。($to をカンマ区切りにしたり、配列にしてもだめです)
        // TODO $additional_parameter は無視します（SPF対応(-f)のためだけに使っているようなので。setFromメソッド が自動的にSPF対応してくれます）

        date_default_timezone_set('Asia/Tokyo');
        mb_language("ja");

        $mail = new PHPMailer(true);

        global $SMTP_SERVER_SORIMACHI_NAME;
        global $USER_SMTP_SERVER_SORIMACHI;
        global $PASS_SMTP_SERVER_SORIMACHI;
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = $SMTP_SERVER_SORIMACHI_NAME;            // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $USER_SMTP_SERVER_SORIMACHI;            // SMTP username
            $mail->Password   = $PASS_SMTP_SERVER_SORIMACHI;            // SMTP password

            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            $mail->CharSet = 'UTF-8';

            //Recipients
            if ( stripos( $to, "," ) !== false ) {
                $toVal = explode( ",", $to );
                foreach ( $toVal as $key => $value ) {
                    // xnamex<xxx@xxx>の形式の場合
                    if ( preg_match( "/(.+?)\<(.+?)\>/", $value, $to ) ) {
                        $mail->AddAddress( $to[2], $to[1] );    
                    }
                    else {
                        $mail->AddAddress($value);
                    }
                }
            }
            else {
                $mail->AddAddress($to);
            }

            if (!is_null($from)) {
                // そり蔵の既存のソースが、From: xxxxx\r\n で渡してくるので対応する。
                // From: xxxxx\r\n の形式を分割する。 \sではなく[\p{C}\p{Z}]なのは、改行文字を取り除くため。
                $val = preg_split('/:[\p{C}\p{Z}]?/', $from);
                $fromVal = null;
                if (count($val) == 1) {
                    // From: xxxxx\r\n の形式ではなかった場合
                    $fromVal = $val[0];
                }
                else if (count($val) == 2 && mb_strtolower($val[0]) == "from") {
                    // From: xxxxx\r\n の形式の場合
                    $fromVal = $val[1];
                }

                if (!is_null($fromVal)) {
                    // setFromメソッドは、自動でSPF対応（envelope sender を設定）してくれる。
                    // 参考
                    // https://phpmailer.github.io/PHPMailer/classes/PHPMailer.PHPMailer.PHPMailer.html#method_setFrom
                    // https://phpmailer.github.io/PHPMailer/classes/PHPMailer.PHPMailer.PHPMailer.html#property_Sender

                    // xnamex<xxx@xxx>の形式の場合
                    if ( preg_match( "/(.+?)\<(.+?)\>/", $fromVal, $from ) ) {
                        $mail->setFrom( $from[2], $from[1] );    
                    }
                    else {
                        $mail->setFrom($fromVal);
                    }
                }
            }

            // Content
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            return true;
        }
        catch ( Exception $e ) {
            return false;
        }
    }
// ↑↑　<2020/06/29> <VinhDao> <From値の名前をチェックする。>
?>
