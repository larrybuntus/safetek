<?php
// check if logged in
if (!isset($_SESSION['admin_id'])) {
	// get path of url
	// base path for linux
	$basepath = str_replace("/var/www/html", "", __ROOT__);
	// base path for windows
	// $basepath = str_replace('C:\xampp\htdocs\new/admin\\', "/new/admin/", __ROOT__);
	
	$authpath = str_replace($basepath, "",  $_SERVER['REQUEST_URI']);

	if(substr($authpath, 0,10) != 'auth/login'){
		if(substr($authpath, 0,30) != 'actions/admin/logs.actions.php'){
			$basepath = false;
		}else{
			$basepath = true;
		}
	}else{
		$basepath = true;
	}

	if ($basepath === false)
		echo "<script>window.location = '".__url__."/admin/auth/login'; </script>";
}
?>