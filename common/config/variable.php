<?php
    $directory = __DIR__ . '/../';

    // General file
    $common_files = [
        'mail'                 => $directory . 'smtp_mail.php',
        'redirect'             => $directory . 'classes/redirect/redirect.php',
        'IPAdress'             => $directory . 'IPAdress.php',
        'japanese'             => $directory . 'japanese.php',
        'products_version'     => $directory . 'products_version.php',
        'recaptcha_v2_setting' => $directory . 'recaptcha_v2_setting.php',
        'webserver'            => $directory . 'webserver_flg.php',
        'external_websites'    => $directory . 'external_websites.php',
    ];

    $security = [
        'salt'   => $directory . 'salt.txt',
        'manual' => $directory . 'security.php',
        'class'  => $directory . 'security/index.php',
    ];

    // Connect Mysql, TFP
    $connect = [
        'manual' => [
            'mysql' => $directory . 'connect_db.php',
            'TFP'   => $directory . 'STFSApiAccess.php',
        ],
        'class' => [
            'mysql' => $directory . 'database/db_Mysql.php',
            'TFP'   => $directory . 'database/db_API.php',
        ]
    ];

    // Trial | Trial Version | Webdb
    $trial = [
        'core'    => $directory . 'includes/trial/trial_general.inc.php',
        'head'    => $directory . 'includes/trial/header.inc.php',
        'excel'   => $directory . 'includes/trial/proccessExcel.inc.php',
        'address' => $directory . 'includes/trial/addressee.inc.php',
        'date'    => $directory . 'includes/trial/date.inc.php',
    ];
?>