<?php

declare(strict_types=1);
$_SERVER['SERVER_ADDR'] = "::1";

use \App\Models\TFP;
use App\Controllers\Auth\LoginController;
use \Core\View;
use \App\Models\User;
use Core\Model;
use \App\Models\Security;

// define("ERR_PTNLOGIN_01_01_01", "ERR_PTNLOGIN_01_01_01");
// define("ERR_PTNLOGIN_01_01_02", "ERR_PTNLOGIN_01_01_02");
// define("ERR_PTNLOGIN_01_01_03", "ERR_PTNLOGIN_01_01_03");
// define("ERR_PTNLOGIN_01_01_11", "ERR_PTNLOGIN_01_01_11");
// define("ERR_PTNLOGIN_01_01_12", "ERR_PTNLOGIN_01_01_12");
// define("ERR_PTNLOGIN_01_01_13", "ERR_PTNLOGIN_01_01_13");
// //STEP2
// define("ERR_PTNLOGIN_02_01_01", "ERR_PTNLOGIN_02_01_01");
// define("ERR_PTNLOGIN_02_01_02", "ERR_PTNLOGIN_02_01_02");
// define("ERR_PTNLOGIN_02_02_01", "ERR_PTNLOGIN_02_02_01");
// define("ERR_PTNLOGIN_02_02_02", "ERR_PTNLOGIN_02_02_02");
// define("ERR_PTNLOGIN_02_02_03", "ERR_PTNLOGIN_02_02_03");
// define("ERR_PTNLOGIN_03_01_01", "ERR_PTNLOGIN_03_01_01");
// define("ERR_PTNLOGIN_03_01_11", "ERR_PTNLOGIN_03_01_11");

// define("ERR_PTNLOGIN_04_01_01", "ERR_PTNLOGIN_04_01_01");
require_once __DIR__ . "/../../../common_files/smtp_mail.php";

class abc extends \PHPUnit\Framework\TestCase
{
	// public function testAdd()
	// {
	// 	// $result = \App\Models\TFP::validate("", "");
	// 	$err = "";
	// 	$ValueUserSub = TFP::getValueUserSub("saag");
	// 	// $result = TFP::proccessCheckNot12("10101010", "1111", "saag", $err);
	// 	// $result = TFP::proccessCheckKy("100000002107", $ValueUserSub["ky_syu_kb"], $err);
	// 	// print_r($ValueUserSub);
	// 	// print_r($result);
	// 	print_r($ValueUserSub);
	// 	$arr = array(
	// 		"value_12" => '201,202',
	// 		"value_not_12" => "201",
	// 		"ky_syu_kb" => "6"
	// 	);
	// 	$this->assertEquals($arr, $ValueUserSub);
	// }

	// public function testLoginTFP()
	// {
	// 	$_POST["typePage"] = "saag";
	// 	$_POST["id"] = "10101010";
	// 	$_POST["pass"] = "11111";
	// 	$template = "index";
	// 	$login = new LoginController("");
	// 	$result = $login->loginAction();

	// 	$err = "";
	// 	print_r($result);
	// 	// $this->assertEquals($arr, $ValueUserSub);
	// }

	public function testABC()
	{
		// $send = send_mail_PHPMailer("nguyentrungquan65@gmail.com", "Subject", "Body", "khanhvandinhkhanh1@gmail.com");
		$send = false;
		$this->assertEquals(false, $send);
		$this->assertEquals(true, $send);
		$this->assertEquals(true, $send);
	}
}
