<?php
if(!empty($_GET['logout']) && @$_GET['logout'] == "true"){
	// $_SESSION["member"] = [];
	// unset($_SESSION["member"]);
	echo "<script>location.href='" . "/" . "'</script>";
	exit();
}
