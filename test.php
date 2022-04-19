<!DOCTYPE html>
<html lang="ja">
<?php 
$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform  = "Unknown OS Platform";

    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

function getBrowser() {

    global $user_agent;

    $browser        = "Unknown Browser";

    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;

    return $browser;
}

// echo "getOS: ".getOS() . "<br>";
// echo "getBrowser: ".getBrowser() . "<br>";
// echo "php_uname:a " . php_uname("a") . "<br>";
// echo "php_uname:s " . php_uname("s") . "<br>";
// echo "php_uname:n " . php_uname("n") . "<br>";
// echo "php_uname:r " . php_uname("r") . "<br>";
// echo "php_uname:v " . php_uname("v") . "<br>";
// echo "php_uname:m " . php_uname("m") . "<br>";
// echo "SERVER['HTTP_USER_AGENT']: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
// echo PHP_OS;


?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Test Partner link to Mag</title>
	<link rel="stylesheet/less" type="text/css" href="css.css" />

</head>

<body>
	<!-- メールマガジンバックナンバー（パートナー向） -->
	<!--    <FORM action="https://info.hp-sorimachi.mym.sorimachi.biz/mag/" id="mag_partner" name="mag_partner" method="POST">-->

	<!-- <FORM action="http://shokokai:8383/callup.php" id="mag_partner" name="mag_partner" method="POST"> -->
	<FORM action="http://192.168.3.214:8012/callup.php" id="mag_partner" name="mag_partner" method="POST">
		<fieldset>
			<legend>商工会クラウド職員サイト : ログイン連携テスト</legend>
			<select id="kikcd" name="kikcd">
				<option value="92000000" selected>92000000</option>
				<option value="92000006">92000006</option>
				<option value=""></option>
			</select>

			<select id="kiknm" name="kiknm">
				<option value="【テスト】連合会" selected>【テスト】連合会</option>
				<option value="【テスト】開発環境検証商工会">【テスト】開発環境検証商工会</option>
                <option value=""></option>

			</select>

			<select id="userid" name="userid">
				<option value="manager" selected>manager</option>
				<option value="ts9924">ts9924</option>
				<option value="user9924">user9924</option>
                <option value=""></option>

			</select>

			<select id="affiliationclss" name="affiliationclss">
				<option value="0" selected>0 : 連合会</option>
				<option value="1">1 : 商工会</option>
				<option value="2">2 : (未使用)</option>
                <option value=""></option>

			</select>
			<!-- <input type="text" id="kikcd" name="kikcd" value="kikcd"/>
                <option value=""></option>
                <input type="text" id="kiknm" name="kiknm" value="kiknm"/>
                <input type="text" id="userid" name="userid" value="userid"/>
                <input type="text" id="affiliationclss" name="affiliationclss" value="0"/> -->



			<button type="submit" id="getData">Send</button><br>
			<span id='message' style="color:blue"></span>
		</fieldset>
	</FORM>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	var a = '<?= @$_POST['kikcd'] ?>';
	var b = '<?= @$_POST['kiknm'] ?>';
	if (a && b) {
		$('form#mag_partner').submit();
	}


	window.onload = function() {
		document.mag_partner.onsubmit = function() {
			let form = document.mag_partner;
			let partern = /^\s*$/;
			// if (partern.test(this.user_id.value)) {
			// 	document.getElementById('message').innerText = 'IDを入力してください。';
			// 	return false;
			// }

			// if (partern.test(this.mag_child.value)) {
			// 	document.getElementById('message').innerText = 'ページを入力してください。';
			// 	return false;
			// }

			// this.mag_user.value = window.btoa(getRandom(10, 20) + this.user_id.value + getRandom(10, 20));
			this.submit();
		};
	}

	function getRandom(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}
</script>