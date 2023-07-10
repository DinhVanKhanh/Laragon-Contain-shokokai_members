<?php

declare(strict_types=1);
$_SERVER['SERVER_ADDR'] = "::1";

// require_once __DIR__ . "/../vendor/phpunit/phpunit/src/Framework/TestCase.php";

use \App\Models\TFP;
use App\Controllers\Auth\LoginController;
use \Core\View;
use \App\Models\User;
use Core\Model;
use \App\Models\Security;
// use \PHPUnit\Framework\TestCase as TestCase;
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

class CalculatorTest extends \PHPUnit\Framework\TestCase
{
	public function testSendMail2()
	{
		// $send = send_mail_PHPMailer("nguyentrungquan65@gmail.com", "Subject", "Body", "khanhvandinhkhanh1@gmail.com");
		$send = false;
		$a = 1 + 2;
		$b = $a + 100;
		$this->assertEquals($b, 103);
		// $this->assertEquals(true, true);
	}

	// public function testSendMail()
	// {
	// 	// $send = send_mail_PHPMailer("nguyentrungquan65@gmail.com", "Subject", "Body", "khanhvandinhkhanh1@gmail.com");
	// 	$send = false;
	// 	$this->assertEquals(true, true);
	// 	// $this->assertEquals(true, true);
	// }
	
}
