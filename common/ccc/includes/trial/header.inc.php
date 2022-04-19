<?php
    // Test Debug
    require_once __DIR__ . "/../debug/config.inc.php";

    require_once __DIR__ . "/trial_general.inc.php";
    global $SERVER_TRIAL;

    require_once __DIR__ . "/../../external_websites.php";
    date_default_timezone_set('Asia/Tokyo');
    define( "__HOST__", $SERVER_TRIAL );
?>
