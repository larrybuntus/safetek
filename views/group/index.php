<?php  
	// include define
	include("../../layout/defines.php");

	// include head
	include("../../layout/head.php");

	// include group
	if (empty($_SERVER['QUERY_STRING'])){
		echo $_SERVER['QUERY_STRING'];
		include("./new.php");
	}else{
		include("./exist.php");
	}

	// include js
	include("../../layout/js.php");
	
?>