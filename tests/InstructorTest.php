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
// require_once __DIR__ . "/../../../common_files/smtp_mail.php";

class InstructorTest extends \PHPUnit\Framework\TestCase
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

	// public function testSendMail()
	// {
	// 	// $send = send_mail_PHPMailer("nguyentrungquan65@gmail.com", "Subject", "Body", "khanhvandinhkhanh1@gmail.com");
	// 	$send = true;
	// 	$this->assertEquals(false, $send);
	// }

	// public function testSendMail1()
	// {
	// 	// $send = send_mail_PHPMailer("nguyentrungquan65@gmail.com", "Subject", "Body", "khanhvandinhkhanh1@gmail.com");
	// 	$send = true;
	// 	$this->assertEquals(false, $send);
	// }

	public function testInstructor()
	{
		$user_cd = "100000002107";
		$res = array(
			"status" => 0,
			"message" => '',
			"instructor" => array(
				"0" => array(
					"inst_no" => 'SOI99996',
					"inst_syu_kb" => '1',
					"inst_syu_nm" => 'ＳＯＩ会計',
					"tori_kb" => '0',
					"del_fg" => '0',
				),

				"1" => array(
					"inst_no" => 'SOI99999',
					"inst_syu_kb" => '1',
					"inst_syu_nm" => 'ＳＯＩ会計',
					"tori_kb" => '0',
					"del_fg" => '0',
				),

				"2" => array(
					"inst_no" => 'SOI99998',
					"inst_syu_kb" => '2',
					"inst_syu_nm" => 'ＳＯＩ給料',
					"tori_kb" => '0',
					"del_fg" => '0',
				)
			),

			"total_count" => 4,
			"count" => 4
		);
		// $send = send_mail_PHPMailer("nguyentrungquan65@gmail.com", "Subject", "Body", "khanhvandinhkhanh1@gmail.com");
		// $list_instructor = TFP::getInstructor($user_cd);
		// $this->assertEquals([], $list_instructor);

		$json_instructor = TFP::jsonInstructor($user_cd);
		// $res = TFP::GetAPIData("instructor", $json_instructor, "GET");
		$count = (int)TFP::GetFirstByField($res, "count");
		// echo $count;
		if($count == 0){
			return [];
		}
		TFP::GetListByField($res,$list_instructor,"inst_syu_kb");
		$list_instructor = array_values(array_unique($list_instructor));
		echo '<pre>';
		print_r($list_instructor);
		echo '<pre>';
		$this->assertEquals(['1','2'], $list_instructor);
		

	}
}
