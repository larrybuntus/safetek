<?php  
	$class = new Admins;

	// define session for test
	$_SESSION['admin_id'] = 3;
	$_SESSION['admin_role'] = 0;

	$admin = $class->account($_SESSION['admin_id']);
?>
<main>
	<div class="row">
		<div class="col s12 m4 offset-m4 parent">
			<p class="center-align flow-text bold">Update User Info</p>
			<form class="form" data-dest="<?= __url__.'/actions/admin/admins.actions.php' ?>" data-output=".modal-content">
				<div class="input-field">
					<img src="<?= __assets__.'/img/users/'.$admin['img'] ?>" class="responsive-img spec-ajax" style="height: 150px; width: 150px; margin: 0px auto; display: block; border: solid 1px #fff;" data-trigger=".image">
					<input type="file" class="image hide" name="img">
				</div>
				<div class="input-field">
					<input type="text" name="name" id="name" required="true" value="<?= $admin['name'] ?>">
					<label for="name" class="blue-text text-darken-2">Name</label>
				</div>
				<div class="input-field">
					<input type="text" name="username" id="username" required="true" value="<?= $admin['username'] ?>">
					<label for="username" class="blue-text text-darken-2">Username</label>
				</div>
				<div class="input-field">
					<input type="email" name="email" id="email" required="true" value="<?= $admin['email'] ?>">
					<label for="email" class="blue-text text-darken-2">Email</label>
				</div>
				<div class="input-field">
					<input type="tel" name="tel" id="tel" required="true" value="<?= $admin['number'] ?>">
					<label for="tel" class="blue-text text-darken-2">Telephone</label>
				</div>
				<div class="input-field">
					<input type="password" name="password" id="password" required="true">
					<label for="password" class="blue-text text-darken-2">Password</label>
				</div>
				<div class="input-field">
					<p><a href="" class="spec-ajax blue-text text-darken-2" data-extend-view=".change" data-output=".modal-content" data-toggle="modal" data-parent=".parent">Change Password?</a></p>
				</div>
				<div class="input-field center-align">
					<input type="hidden" name="update" value="set">
					<input type="submit" class="btn blue darken-2 white-text waves-effect" value="UPDATE">
				</div>
			</form>

			<div class="hide change">
				<div class="row">
					<div class="col s12">
						<p class="flow-text center-align">Update Change</p>
						<form class="form" data-dest="<?= __url__.'/actions/admin/admins.actions.php' ?>" data-output=".modal-content">
							<div class="input-field">
								<input type="password" name="cpass" id="cpass" required="true">
								<label for="cpass" class="blue-text text-darken-2">Current Password</label>
							</div>
							<div class="input-field">
								<input type="password" name="npass" id="npass" required="true">
								<label for="npass" class="blue-text text-darken-2">New Password</label>
							</div>
							<div class="input-field">
								<input type="password" name="rpass" id="rpass" required="true">
								<label for="rpass" class="blue-text text-darken-2">Retype Password</label>
							</div>
							<div class="input-field center-align">
								<input type="hidden" name="change_pass" value="set">
								<input type="submit" class="btn blue darken-2 white-text waves-effect" value="UPDATE">
							</div>
						</form>
					</div>
				</div>
			</div>
			<hr>
		</div>
	</div>
</main>