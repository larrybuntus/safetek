<?php
	session_start();

	// define root directory
	define("__ROOT__", str_replace("layout", "", __dir__), TRUE); 

	// connect to database
	require_once(__ROOT__.'core/functions.php');

	// get metadata from table
	define("__ASSETS__", "http://localhost/new/assets", TRUE);

	// define url
	define("__URL__", "http://localhost/new", TRUE);

	// define logo
	define("__nav__", "Safetek");

	// echo errors in development
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

