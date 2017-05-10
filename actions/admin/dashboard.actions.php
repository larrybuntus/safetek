<?php  
	// include defines
	include("../../layout/defines.php");
	// include controller class
	include("../../controllers/admin/dashboard.controller.php");
	// initialise controller class
	$class = new Dashboard;

	if (isset($_POST['query']) && $_POST['query'] == "date") {
		$date = explode(",", $_POST['value']);
		
		list($alert,$graph) = $class->index($date[0],$date[1]);

		include("../../views/admin/dashboard/content.php");
	}

	if (isset($_POST['query']) && $_POST['query'] == "mute") {
		$value	= explode(",", $_POST['value']);
		$id 	= $value[0];
		$date 	= $value[1];

		$result = $class->mute($id,$date);

		if($result === true)
			echo '<script>Materialize.toast("Alert Muted'.$id.'!",3000)</script>';
		else
			echo '<script>Materialize.toast("Unable to mute'.$id.'!",3000)</script>';
	}
?>