<?php  
	// include defines
	include("../layout/defines.php");
	// include db
	include("../controllers/login.class.php");
	$class = new Login;

	// declare variable
	$id = null;
	$name = null;
	$img = null;

	$reference = $_POST['reference'];
	$index = $_POST['index'];
	$password = $_POST['password'];

	if (empty($reference) || empty($index) || empty($password)) {
		echo "No field should be empty";
		return false;
	}

	// if none is empty
	list($id,$name,$img) = $class->login($reference,$index,$password);

	if ($id == "invalid") {
		echo "Invalid Credentials";
	}elseif ($id == "incorrect") {
		echo "Password is incorrect";
	}else{
		$_SESSION['student_id'] = $id;
		$_SESSION['student_img'] = $img;
		$_SESSION['student_name'] = $name;
		$_SESSION['logged'] = "logged";

		echo "<script>window.location = '".__url__."/search'</script>";
	}
?>