<?php  
	// include defines
	include("../../layout/defines.php");
	// include controller class
	include("../../controllers/admin/hostels.controller.php");
	// initialise controller class
	$class = new Hostels;

	if (isset($_POST['query']) && $_POST['query'] == "location") {
		list($hostels,$locations,$meetpoints,$hostels_meetpoints) = $class->index($_POST['id']);

		include("../../views/admin/hostels/hostel.php");
	}

	if (isset($_POST['add'])) {
		if (!isset($_POST['meetpoints']))
			$_POST['meetpoints'] = null;

		$result = $class->add($_POST['hostel'],$_POST['location'],$_POST['meetpoints']);

		if ($result === "exist") {
			echo '<p class="flow-text center-align yellow-text">Hostel already exists</p>';
		}elseif ($result === false) {
			echo '<p class="flow-text center-align red-text">An unexpected error occured</p>';
		}elseif ($result === true) {
			echo '<p class="flow-text center-align green-text">Hostel Added Successfully</p>';
		}
	}

	if (isset($_POST['edit'])) {
		if (!isset($_POST['meetpoints']))
			$_POST['meetpoints'] = null;

		$result = $class->edit($_POST['id'],$_POST['hostel'],$_POST['location'],$_POST['meetpoints']);

		if ($result === false)
			echo '<p class="flow-text center-align red-text">An unexpected error occured</p>';
		else
			echo '<p class="flow-text center-align green-text">Hostel Updated Successfully</p>';
	}

	if (isset($_POST['query']) && $_POST['query'] == "delete") {
		$result = $class->delete($_POST['id']);

		if ($result === false) {
			echo "<script>Materialize.toast('An unexpected error occured!', 4000)</script>";
		}else{
			echo "<script>Materialize.toast('Deleted Successfully!', 4000)</script>";
		}
	}

	if (isset($_POST['search'])) {
		if (empty($_POST['search']))
			list($hostels,$locations,$meetpoints,$hostels_meetpoints) = $class->index();
		else
			list($hostels,$locations,$meetpoints,$hostels_meetpoints) = $class->index(null, $_POST['search']);
		include("../../views/admin/hostels/hostel.php");
	}
?>