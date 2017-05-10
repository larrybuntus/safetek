<?php  
	// include defines
	include("../layout/defines.php");
	// include db
	include("../controllers/search.class.php");
	$class = new Search;

	// define variable
	$result = null;
	$search = null;

	// get post
	if (isset($_POST['set']))
		$search = $_POST['search'];

	// if chosen hostel
	if (isset($_POST['query'])) {
		$_SESSION['hostel_name'] = $_POST['value'];
		$_SESSION['hostel_id'] = $_POST['id'];

		echo "<script>window.location = '".__url__."/meetpoints'</script>";
	}

	if (empty($search)) {
		$result = $class->index();
	}else{
		$result = $class->search($search);
	}

	include("../views/search/result.php");
	
?>