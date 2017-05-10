<?php  
	$dbhost = 'localhost';
	$dbuser = '';
	$dbpass = '';
	$dbname = 'safetek';

	$conn = new mysqli ($dbhost, $dbuser, $dbpass, $dbname);

	if($conn->connect_error){
		die("connection failure: something wicked happened");
	}
?>