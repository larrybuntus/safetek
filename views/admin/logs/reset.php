<div class="col s12">
	<div style="padding: 36px 0px">
<?php
	$class = new Logs;

	$id = null;
	$date = null;

	if(mb_strlen(base64_encode($_GET['c']))/2 == 16){
		list($id,$date) = $class->decode($_GET['a'],$_GET['b'],$_GET['c']);
		$_SESSION['reset_id'] = $id;
	}else{
		$id = false;
		$date = false;
	}
?>

<p class="center-align flow-text bold">Reset Password</p>
<?php  
	if ($id === false)
		echo '<p class="flow-text center-align">Unknown user</p>';

	if ($date === false)
		echo '<p class="flow-text center-align">Reset time expired</p>';

	if ($id !== false && $date !== false) {
?>
	<div class="reset">
		<form class="form" data-dest="<?= __url__.'/actions/admin/logs.actions.php' ?>" data-output=".modal-content">
			<div class="input-field">
				<input type="password" name="npass" id="npass" required>
				<label for="npass">New Password</label>
			</div>
			<div class="input-field">
				<input type="password" name="rpass" id="rpass" required>
				<label for="rpass">Retype Password</label>
			</div>
			<div class="input-field center-align">
				<input type="hidden" name="reset" value="set">
				<input type="submit" class="btn red-btn z-depth-5 white-text" value="RESET">
			</div>
		</form>
	</div>
<?php			
	}else{
?>
<p class="center-align"><a href="<?= __url__.'/admin/auth/login' ?>" class="btn red-btn z-depth-5 white-text">Return</a></p>
<?php } ?>
	</div>
</div>    	

