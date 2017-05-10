<?php  
	include("../../layout/defines.php");
	include("../../controllers/admin/groups.controller.php");
	$class = new Groups;


	if (isset($_POST['query']) && $_POST['query'] == "date") {
		
		$date = explode(",", $_POST['value']);

		list($groups,$students,$active) = $class->index($date[0],$date[1]);

		include("../../views/admin/groups/content.php");

	}
?>