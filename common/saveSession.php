<?php 
	if(!session_id())
		session_start();
    $pData = GetDataPack(LOGIN_PACK); // get array session
    $serial_no = $pData["serial_no"]; // get serial from session
    $_SESSION["SERIAL"] = $serial_no;
 ?>