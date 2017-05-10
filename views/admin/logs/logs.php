<?php  
	$hide = null;
?>
<main>
	<div class="row">
		<?php  
	        if ($_GET) {
	          if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c'])) {
	            $hide = "hide";

	            include("./reset.php");
	          }
	        }
	    ?>
		<div class="col s12 parent <?= $hide; ?>">
			<div class="logo">
				<img src="<?= __assets__.'/img/site/logo.png' ?>" class="responsive-img circle admin">
			</div>
			<form class="form" data-dest="<?= __url__.'/actions/admin/logs.actions.php' ?>" data-output=".feedback">
				<div class="input-field">
					<input type="text" id="credential" name="credential" required="true">
					<label for="credential" class="grey-text text-darken-1">Username, Email or Number</label>
				</div>
				<div class="input-field">
					<input type="password" id="password" name="password" required="true">
					<label for="password" class="grey-text text-darken-1">Password</label>
				</div>
				<div class="input-field">
					<p class="red-text center-align feedback"></p>
					<p><a href="" class="grey-text text-darken-2 spec-ajax" data-extend-view=".forgotten" data-parent=".parent" data-output=".modal-content" data-toggle="modal">Forgotten Password?</a></p>
				</div>
				<div class="input-field">
					<input type="hidden" name="login" value="set">
					<input type="submit" class="col s12 btn red-btn z-depth-5 white-text bold" value="LOGIN">
				</div>
			</form>
			<div class="hide forgotten">
				<div class="row">
					<div class="col s12">
						<p class="flow-text center-align">Forgotten Password</p>
						<form class="form" data-dest="<?= __url__.'/actions/admin/logs.actions.php' ?>" data-output=".modal-content">
							<div class="input-field">
								<input type="email" name="email" id="email" required="true" placeholder="Enter your account email">
								<label for="email">Email</label>
							</div>
							<div class="input-field center-align">
								<input type="hidden" name="forgotten" value="set">
								<input type="submit" class="col s12 btn red-btn white-text" value="SUBMIT">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>