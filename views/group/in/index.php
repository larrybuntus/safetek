<?php  
	// include define
	include("../../../layout/defines.php");
	include("../../../controllers/group.class.php");

	// include head
	include("../../../layout/head.php");

	// include group
	if ($_SERVER['QUERY_STRING'] == "members") {
		include("./members.php");
	}elseif ($_SERVER['QUERY_STRING'] == "chat") {
		include("../../../controllers/chat.controller.php");
		include("./chat.php");
	}elseif ($_SERVER['QUERY_STRING'] == "setoff") {
		include("./setoff.php");
	}else{
		include("group.php");
	}

	// include js
	include("../../../layout/js.php");
	
?>