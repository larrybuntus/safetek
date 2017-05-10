<?php  
	// include defines
	include("../../layout/defines.php");
	// incldue controller class
	include("../../controllers/admin/meetpoints.controller.php");
	// initialise controller class
	$class = new Meetpoints;

	if (isset($_POST['query']) && $_POST['query'] == "location") {
		list($meetpoints, $locations) = $class->index($_POST['id']);

		include("../../views/admin/meetpoints/meetpoint.php");
	}

	if (isset($_POST['search'])) {
		if(empty($_POST['search']))
			list($meetpoints, $locations) = $class->index();
		else
			list($meetpoints, $locations) = $class->index(null,$_POST['search']);
		
		include("../../views/admin/meetpoints/meetpoint.php");
	}

	if (isset($_POST['edit'])) {
		$result = $class->edit($_POST['id'],$_POST['name'],$_POST['location']);

		if ($result === false) {
			echo '<p class="text-center flow-text">An unexpected error occured. Please try again</p>';
		}else{
			echo '<p class="text-center flow-text">Meetpoint updated successfully!</p>';
		}
	}

	if (isset($_POST['query']) && $_POST['query'] == "delete") {
		$result = $class->delete($_POST['id']);

		if ($result === false) {
			echo '<script>Materialize.toast("An unexpected error occured", 4000);</script>';
		}else{
			echo '<script>Materialize.toast("Meetpoint trashed", 4000);</script>';
		}
	}

	if (isset($_POST['add'])) {
		$result = $class->add($_POST['name'],$_POST['location']);

		if ($result === false) {
			echo '<p class="text-center flow-text">An unexpected error occured. Please try again</p>';
		}else{
			echo '<p class="text-center flow-text">Meetpoint added successfully!</p>';
		}
	}
?>