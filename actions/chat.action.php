<?php  
	// include defines
	include("../layout/defines.php");
	include("../controllers/chat.controller.php");
	$class = new Chat;

	if (isset($_POST['message'])) {
		if (empty($_POST['message'])) {
			$result = $class->index($_SESSION['group_id']);
			include("../views/group/in/message.php");
		}else{
			$result = $class->message($_SESSION['group_id'],$_SESSION['student_id'],$_POST['message']);

			if ($result === false)
				echo "<script>Materialize.toast('An unexpected error occured', 3000)</script>";
			else{ ?>
				<div class="row">
					<div class="col s9">
						<div class="chat-wrapper white">
							<small class="red-text text-darken-2 truncate">@<?php echo str_replace(" ", "_", $_SESSION['student_name']); ?></small>
							<div class="message"><?php echo $_POST['message'] ?></div>
							<small class="right grey-text text-darken-2"><?php echo date("H:i"); ?></small>
						</div>
					</div>
					<div class="col s3 relative">
						<img src="<?php echo __assets__.'/img/users/'.$_SESSION['student_img']; ?>" alt="" class="responsive-img circle">
					</div>
				</div>	
			<?php
			}
		}
		exit();
	}

	$result = $class->index($_SESSION['group_id']);
	include("../views/group/in/message.php");
?>