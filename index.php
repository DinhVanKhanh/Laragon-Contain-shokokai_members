<?php
if (session_id() == '')
	session_start();

date_default_timezone_set("Asia/Tokyo");

// @session_cache_limiter('private, must-revalidate'); //private_no_expire

// require_once $_SERVER['DOCUMENT_ROOT'] . "/common/database/db_Mysql.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/common/security/core/init.php";
// excute functions
require_once $_SERVER['DOCUMENT_ROOT'] . "/common/functions.php";

if (checkLogin("member") === true)
	redirect('/member/');
// ↓↓　<2022/19/04> <KhanhDinh> <comment code>
// if(isset($_POST['next'])){
// 	login("member");
// }
// ↑↑　<2022/19/04> <KhanhDinh> <comment code>
?>

<!DOCTYPE html>
<html dir="ltr" lang="ja">

<head>
	<title>商工会クラウド職員サイト</title>
	<meta charset="utf-8">
	<meta name="robots" content="noindex">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="email=no,telephone=no,address=no">
	<!-- [CSS] -->
	<link rel="stylesheet" href="common/css/import.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
	<!-- [JavaScript] -->
	<script src="common/js/common.js"></script>
</head>

<body>
	<div id="Wrapper">
		<div id="contents_first_pj" class="clearfix">
			<div class="inner">

				<h1>商工会クラウド職員サイト</h1>

				<div class="login">
					<p class="login_p">IDとパスワードを入力してください</p>
					<div style="text-align: center;">
						<span style="color:red;"><?= @$_SESSION['member']['classError']['text'] ?></span>
					</div>

					<form method="POST" action="./callup.php">
						<dl>
							<dt><label for="id_email"><label for="id_email">ログインID</label></label></dt>
							<dd><input type="text" name="email" autofocus maxlength="64" required id="id_email" class="use_icon" value="LoginID01"></dd>
							<dt><label for="id_password"><label for="id_password">パスワード</label></label></dt>
							<dd><input type="password" name="password" required id="id_password" class="use_icon" placeholder="&#xf13e;" value="LoginPW01" /></dd>
							<dt><button type="submit" class="login_button">ログイン</button><input type="hidden" name="next" value="next" /></dt>
							<dd></dd>
						</dl>
					</form>

				</div>

				<!-- /.inner -->
			</div>
			<!-- /#contents -->
		</div>

		<footer>
			<div class="inner">
				<a href="https://www.sorimachi.co.jp/" target="_blank"><img src="common/img/f_logo.svg" alt="ソリマチ株式会社" width="180px" /></a>
				<small>Copyright &copy; 2020-<script language=JavaScript type=text/javascript>
						year();
					</script> Sorimachi Co.,Ltd. All Rights Reserved.</small>
			</div>
			<!-- /.inner -->
		</footer>
		<!-- /footer -->
	</div>
</body>

</html>