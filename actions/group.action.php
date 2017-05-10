<?php  
	// include define
	include("../layout/defines.php");
	include("../controllers/group.class.php");
	$class = new Group;

	if (isset($_POST['create_group'])) {
		list($id,$name) = $class->create($_SESSION['hostel_meetpoint_id'],$_POST['gname'],$_SESSION['student_id']);

		if ($id === false) {
			echo "An error occured";  			
		}else{
			$_SESSION['group_id'] = $id;
			$_SESSION['group_name'] = $name;

			echo '<script>window.location = "'.__url__.'/group/in"</script>';
		}  		
	}

	if (isset($_POST['query']) && $_POST['query'] == "join") {
		$result = $class->join($_SESSION['group_id'], $_SESSION['student_id']);

		if ($result === false)
			echo "<script>Materialize.toast('An unexpected error occured', 3000)</script>";
		else
			echo '<script>window.location = "'.__url__.'/group/in"</script>';
	}

	if (isset($_POST['query']) && $_POST['query'] == "setoff") {
		$result = $class->setoff($_SESSION['group_id']);

		if ($result === true) {
			echo '<script>window.location = "'.__url__.'/group/in/setoff" </script>';
		}else{
			echo "<script>Materialize.toast('An unexpected error occured', 3000)</script>";
		}
	}

	if (isset($_POST['query']) && $_POST['query'] == "exit") {
		$result = $class->exiting($_SESSION['group_id'],$_SESSION['student_id']);

		if ($result === true) {
			echo '<script>window.location = "'.__url__.'/search" </script>';
		}else{
			echo "<script>Materialize.toast('An unexpected error occured', 3000)</script>";
		}
	}

	if (isset($_POST['query']) && $_POST['query'] == "emergency") {
		$result = $class->emergency($_SESSION['group_id'],$_SESSION['student_id'],$_POST['latitude'],$_POST['longitude']);

		if ($result === true) {
			echo "<script>Materialize.toast('Emergency alert sent...', 3000)</script>";
		}else{
			echo "<script>Materialize.toast('An unexpected error occured', 3000)</script>";
		}
	}
?>