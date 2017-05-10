<?php  
	// include defines
	include("../../layout/defines.php");
	// include controller class
	include("../../controllers/admin/logs.controller.php");
	$class = new Logs;


	// get data from form
	// validate email
	if (isset($_POST['login'])) {
		$result = $class->index($_POST['credential'],$_POST['password']);

		// check results for corresponding feedback
		if ($result == "credential") {
			echo "credential does not exist";
		}elseif ($result == "password") {
			echo "Incorrect password";
		}else{
			$_SESSION['admin_id'] = $result['id'];
			$_SESSION['admin_name'] = $result['name'];

			echo '<script>window.location = "'.__url__.'/admin/"</script>';
		}
	}

	// logout
	if (isset($_POST['query']) && $_POST['query'] == "logout") {
		session_destroy();

		echo "<script>window.location = '".__url__."/admin/auth/login'; </script>";
	}


	if (isset($_POST['forgotten'])) {
		$result = $class->forgotten($_POST['email']);

		if ($result !== false) {
			$id 	= 	$result['id'];
			$date 	= 	date("Y-m-d H:i:s");

			// encrypt all data
			// set encyption passphrase
			$passphrase = base64_encode("encryption_passphrase");

			// iv
			$iv = rand(1000000000000000, 9999999999999999);
			$url_iv = base64_encode($iv);

			// encrypt each url data
			$id = openssl_encrypt($id, "AES-256-CTR", $passphrase,0,$iv);
			$date = openssl_encrypt($date, "AES-256-CTR", $passphrase,0,$iv);

			// compose url
			$reset_url = __url__.'/admin/auth/login/?a='.$id.'&b='.$date.'&c='.$url_iv;

			echo $reset_url;

			// reset email
		}

		echo '<p class="center-align flow-text">An email will be sent to you if the email you provided exists!</p>';
	}

	if (isset($_POST['reset'])) {
		if ($_POST['npass'] != $_POST['rpass']) {
			echo '<script>Materialize.toast("Passwords don\'t match","3000")</script>';
			exit();
		}

		$result = $class->reset($_SESSION['reset_id'],$_POST['npass']);

		if ($result === true) {
	?>
		<div class="feedback">
			<div class="success hide">
				<p class="center-align flow-text">Password resetted successfully!</p>
				<p class="center-align"><a href="<?= __url__.'/admin/auth/login' ?>" class="btn blue darken-2 white-text z-depth-5">Return</a></p>
			</div>
			<a href="" class="spec-ajax extend-view" data-extend-view=".success" data-parent=".feedback" data-output=".reset"></a>
		</div>

		<script type="text/javascript">
			$(document).ready(function(){
				$(".extend-view").trigger("click");
			})
		</script>
	<?php 
		}else{
			echo '<script>Materialize.toast("An unexpected error occured!", 5000);</script>';
		}	
	}
?>