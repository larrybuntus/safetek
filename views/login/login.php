<div class="container h100">
	
	<div class="valign-center h100">
		<!-- logo -->
		<div class="logo">
			<div class="row">
				<div class="col s6 offset-s3">
					<img src="<?php echo __assets__."/img/site/logo.png"; ?>" alt="" class="responsive-img center-block">
					<h5 class="center-align grey-text">SAFETEK</h5>
				</div>
			</div>
		</div>

		<!-- login form -->
		<form data-dest="<?php echo __url__.'/actions/login.action.php'; ?>" class="login form" data-output=".feedback">
			<div class="input-field">
				<input type="number" class="input" name="reference" placeholder="Reference No." required="true">
			</div>
			<div class="input-field">
				<input type="number" class="input" name="index" placeholder="Index No." required="true">
			</div>
			<div class="input-field">
				<input type="password" class="input" name="password" placeholder="Password" required="true">
			</div>
			<div class="input-field">
				<p class="center-align red-text feedback"></p>
			</div>
			<div class="input-field center">
				<input type="submit" value="LOGIN" class="btn red-btn white-text" style="width: 100%;">
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function(){
		$(".logout").addClass("hide");
	})
</script>