<?php  
	// include defines
	include("../../layout/defines.php");
	// include controller class
	include("../../controllers/admin/admins.controller.php");
	// initialise
	$class = new Admins;

	$_SESSION['admin_id'] = 3;

	if (isset($_POST['add'])) {
		if(!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name']))
			$result = $class->add($_POST['name'],$_POST['email'],$_POST['tel'],$_POST['role']);
		else
			$result = $class->add($_POST['name'],$_POST['email'],$_POST['tel'],$_POST['role'],$_FILES['img']);
	
		if ($result === true)
			echo '<p class="flow-text center-align">Admin added successfully</p>';
		else
			echo '<p class="flow-text center-align">An unexpected error occured!</p>';
	}

	if (isset($_POST['update'])) {
		if(!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name']))
			$result = $class->update($_POST['username'],$_POST['name'],$_POST['tel'],$_POST['email'],$_SESSION['admin_role'],$_SESSION['admin_id'],$_POST['password']);
		else
			$result = $class->update($_POST['username'],$_POST['name'],$_POST['tel'],$_POST['email'],$_SESSION['admin_role'],$_SESSION['admin_id'],$_POST['password'],$_FILES['img']);

		if ($result === true)
			echo '<script>Materialize.toast("Updated successfully!", 3000)</script>';
		elseif($result === false)
			echo '<script>Materialize.toast("An unexpected error occured!",3000)</script>';
		elseif ($result === "password")
			echo '<script>Materialize.toast("Incorrect password!",3000)</script>';
	}

	if (isset($_POST['change_pass'])) {
		if ($_POST['npass'] != $_POST['rpass']) {
			echo '<script>Materialize.toast("Passwords don\'t match!",3000)</script>';
			exit();
		}

		$result = $class->password($_POST['cpass'],$_POST['npass'],$_SESSION['admin_id']);

		if ($result === true)
			echo '<p class="flow-text center-align">Password Changed successfully</p>';
		elseif ($result === false)
			echo '<p class="flow-text center-align">An unexpected error occured!</p>';
		elseif ($result == "password")
			echo '<script>Materialize.toast("Incorrect password!",3000)</script>';
	}
?>