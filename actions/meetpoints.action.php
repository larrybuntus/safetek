<?php  
	// include defines
	include("../layout/defines.php");
	// include db
	include("../controllers/meetpoints.class.php");
	$class = new Meetpoints;

	// declare variable
	$id = $_POST['id'];

	// get group id
	$_SESSION['hostel_meetpoint_id'] = $id;

	$result = $class->group($_SESSION['hostel_meetpoint_id']);

	if ($result === false) {
		echo "<script>window.location = '".__url__."/group/create'</script>";
	}else{
		list($id,$name,$peeps) = $result;
		$_SESSION['group_id'] = $id;
		$_SESSION['group_name'] = $name;
		$_SESSION['group_peeps'] = $peeps;
		echo "<script>window.location = '".__url__."/group/join'</script>";
	}
?>