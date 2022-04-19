<?php
require_once __DIR__ . '/../model/M_shokokai.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/common/security/core/init.php";

$model = new M_content;

//check data from ajax
foreach ($_POST as $key => $value) {
	if ($value == "error") {
		echo json_encode(['errMsg' => 'Error']);
		return;
	}
}

//get param
if(in_array($_POST['action'],['add','edit'])){
	$param = [
		'memberId'         => $_POST['memberId'],
		'memberPw' 		=> $_POST['memberPw'],
		'memberStatus'  	=> $_POST['memberStatus'],
		'memberComment'    => $_POST['memberComment'],
		// 'notifyContent'	 	  => $_POST['notifyContent'],
		// 'alertContent'	 	  => empty($_POST['alertContent']) ? null : $_POST['alertContent'],

	];
}


switch ($_POST['action']) {
	case 'loadById':
		header('Content-Type: application/json');
		// if ( preg_match( '/^(\s|\D)*$/', $_POST['schId'] ) ) {
		// 	echo json_encode( ['errMsg' => 'Error id'] );
		// 	return;
		// }
		$result = $model->getById(intval($_POST["id"]));

		http_response_code(200);
		echo json_encode($result);
		break;

	case 'add':
		header('Content-Type: application/json');

		$result = $model->add($param);

		http_response_code(200);
		echo json_encode($result);
		break;

	case 'edit':
		// header('Content-Type: application/json');
		// if ( preg_match( '/^(\s|\D)*$/', $_POST['flagContent'] )
		// || preg_match( '/^(\s|\D)*$/', $_POST['cateContent'] ) ) {
		// 	echo json_encode( ['errMsg' => 'Error id'] );
		// 	return;
		// }

		$param['id'] = (int)$_POST['id'];
		$result = $model->edit($param);

		http_response_code(200);
		echo json_encode($result);
		break;

	case 'delete':
		http_response_code(200);
		$result = $model->delete((int)$_POST["id"]);
		echo $result;
		break;
		
	case 'uploadData':
		header('Content-Type: application/json');
		if ($_FILES['file']['error'] == 0) {
			$direct = __DIR__ . '/../../../logs/';
			if (file_exists($direct . '/' . $_FILES["file"]["name"])) {
				unlink($direct . '/' . $_FILES["file"]["name"]);
			}
			move_uploaded_file($_FILES["file"]["tmp_name"], $direct . '/' . $_FILES["file"]['name']);

			require_once __DIR__ . '/../../libs/spreadsheet/vendor/autoload.php';
			$result = $model->uploadData($direct . '/' . $_FILES["file"]["name"]);
			http_response_code(200);
		} else {
			$result['errMsg'] = "エラーがある";
			http_response_code(400);
		}
		unlink($direct . '/' . $_FILES["file"]['name']);
		echo json_encode($result);
		break;

}
