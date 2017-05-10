<?php  
	// start session
	session_start();


	// check if user is logged in or send to welcome screen
	if (!isset($_SESSION['logged'])) {
		header("Location: login/");
	}else{
		header("Location: search/");
	}
	
?>