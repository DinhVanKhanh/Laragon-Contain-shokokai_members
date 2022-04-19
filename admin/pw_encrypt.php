<?php
if (!session_id()) {
	session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/common/security/core/init.php";
if (isset($_POST['encrypt'])) {
	if(empty($_POST['encrypt'])){
		$_SESSION['encryptData'] = '';
		$_SESSION['encrypt'] = '';
	}else{
		$encryptData = EncryptData($_POST['encrypt']);
		$_SESSION['encryptData'] = $encryptData;
		$_SESSION['encrypt'] = $_POST['encrypt'];
	}
}

if (isset($_POST['decrypt'])) {
	$decryptData = DecryptData($_POST['decrypt']);
	$_SESSION['decryptData'] = $decryptData;
	$_SESSION['decrypt'] = $_POST['decrypt'];
}



?>
<style>
	body {
		background-color: #eae9e9;
	}

	.bor {
		border-radius: 5px;
	}

	input.bor {
		width: 40%;
	}

	button.bor {
		background: #79a93b;
		color: white;
		padding: 0px 30px 0px 30px;
	}
</style>

<body>
	<form action="" method="post">
		<p>文字列を入力</p>
		<div>
			<input type="text" name="encrypt" class="bor" id="encrypt" value="<?= @$_SESSION['encrypt'] ?>">
			<button class="bor">変換</button>
		</div>
	</form>
	<h2>Result:</h2>
	<label for="" class="result"><?= @$_SESSION['encryptData'] ?></label>

	<hr>

	<form action="" method="post">
		<p>暗号化された文字列を入力</p>
		<div>
			<input type="text" name="decrypt" class="bor" id="decrypt" value="<?= @$_SESSION['decrypt'] ?>">
			<button class="bor">変換</button>
		</div>
	</form>

	<h2>Result:</h2>
	<label for="" class="result"><?= @$_SESSION['decryptData'] ?></label>
</body>