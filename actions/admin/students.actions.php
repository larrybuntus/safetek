<?php  
	// include defines
	include("../../layout/defines.php");
	// include controller class
	include("../../controllers/admin/students.controller.php");
	// initiaiise controller class
	$class = new Students;


	// define variables
	$students = null;


	// search for students
	if (isset($_POST['id']) && $_POST['id'] == "search") {
		// if search is empty
		if (empty($_POST['search'])) {
			$students = $class->index();
		}else{
			$students = $class->index($_POST['search']);
		}

		// include display
		include("../../views/admin/students/student.php");
	}
