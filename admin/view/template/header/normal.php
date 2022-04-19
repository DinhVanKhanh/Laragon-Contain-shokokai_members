<?php
global $scripts, $linkCss, $title;
require_once __DIR__ . '/../../../libs/webserver_flg.class.php';
require_once __DIR__ . "/../../../config/database.class.php";
require_once __DIR__ . "/../../../libs/redirect.class.php";
require_once __DIR__ . "/../../../language.php";

// die();
use Redirect\Redirect as Redirect;

date_default_timezone_set("Asia/Tokyo");
?>


<head>
	<title><?= $lang['title'] ?></title>
	<meta charset="utf-8">
	<meta name="robots" content="noindex,nofollow">
	<meta name="format-detection" content="telephone=no">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
	<link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/styles_y.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/jquery.timepicker.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/ui.datepicker.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/jquery.classyedit.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
	<!-- ----khanh -->
	<link href="assets/css/_style_content.css" rel="stylesheet" type="text/css" />
	<!-- ----khanh -->


	<!-- modal -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css"> -->
	<!-- modal -->

	<!-- datatable -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<!-- datatable -->

	<?= $linkCss ?>

	<!-- modal -->
	<script src="https://unpkg.com/popper.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
	<!-- modal -->

	<!-- datatable -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
	<!-- datatable -->

	<!-- <script type="text/javascript" src="assets/js/scripts.js"></script> -->
	<?= $scripts ?>
</head>

<body>
	<section id="wrapper">
		<header id="header" class="clear">
			<!-- <hgroup id="head-box" class="clearfix"> -->
			<!-- <h1 id="head-logo"></h1> -->
			<div class="header-top">
				<p class="header1">商工会クラウド職員サイト</p>
				<p class="header2">会員ID管理画面</p>
				<a href="?logout=true">ログアウトする</a>
			</div>
			<!-- </hgroup> -->
			<div style="position:absolute;top:18%;right:2%;">
				<?php
				if (isset($_GET['logout']) && $_GET['logout'] == true) {
					$_SESSION["admin"] = [];
					unset($_SESSION["admin"]);
					new Redirect('login.php');
				}

				// if (!empty($_SESSION['userDM'])) {
				// 	echo '<a href="?logout=true" class="buttonLog">ログアウト</a>';
				// }
				?>
			</div>

		</header>