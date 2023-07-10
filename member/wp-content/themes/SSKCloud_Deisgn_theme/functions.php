<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/common/functions.php";

if (!is_wplogin() && !is_user_logged_in()) {
	if (checkLogin("member") !== true) {
		writeLogRequest(@$_SESSION["member"]["kikcd"], @$_SESSION["member"]["kiknm"], @$_SESSION["member"]["userid"], @$_SESSION["member"]["affiliationclss"], @$_SESSION["member"]["login"]);
		redirect('/err.php');
	} else
		$_SESSION["member"]["timeout"] = time() + 3600;
}

function is_wplogin()
{
	$ABSPATH_MY = str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, ABSPATH);
	return ((is_admin() || in_array($ABSPATH_MY . 'wp-login.php', get_included_files()) || in_array($ABSPATH_MY . 'wp-register.php', get_included_files())) || (isset($GLOBALS['pagenow']) && $GLOBALS['pagenow'] === 'wp-login.php') || $_SERVER['PHP_SELF'] == '/wp-login.php');
}

if (function_exists('register_sidebar'))
	register_sidebar(array(
		'id' => 'sidebar-1',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget_title">',
		'after_title' => '</h2>',
	));

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types)
{

	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes);

	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

add_theme_support('post-thumbnails');

if (!function_exists('createInit')) {
	function createInit()
	{
		if (session_id() == '') {
			session_cache_limiter('private');
			session_cache_expire(0);
			session_start();
			// session_start();
			// header('Cache-Control: no-cache, no-store, must-revalidate');
			// header('Pragma: no-cache');
			// header('Expires: 0');
		}

		date_default_timezone_set("Asia/Tokyo");
	}
	add_action('init', 'createInit', 1);
}
// ↓↓　<2022/27/04> <KhanhDinh> <update function logout only logout for member(not for admin)>
// function logout()
// {
// 	$_SESSION = [];
// 	session_destroy();
// 	echo "<script>location.href='" . "/" . "'</script>";
// 	exit();
// }

function logout()
{
	$_SESSION['member'] = [];
	unset($_SESSION["member"]);
	wp_redirect("/");
	exit();
}
// ↑↑　<2022/27/04> <KhanhDinh> <update function logout only logout for member(not for admin)>