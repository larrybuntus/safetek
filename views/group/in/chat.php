<?php  
	$class = new Chat;

	$result = $class->index($_SESSION['group_id']);
?>

<div class="group-chats h100">
	<div class="navbar-fixed">
		<nav class="red-btn">
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo center"><i class="material-icons">chat_bubble</i> Chat</a>
		      <ul id="nav-mobile" class="left">
		        <li><a href="#" class="spec-ajax" data-back="true"><i class="material-icons md-36">keyboard_arrow_left</i></a></li>
		      </ul>
		    </div>
	  	</nav>
  	</div>

  	<div class="group-chat" style="padding-top: 20px;">
  		<div class="chat-body">
			<?php include("./message.php"); ?>
		</div>
		<div class="chat-footer white">
			<form id="chatForm" dest="<?php echo __url__.'/actions/chat.action.php'; ?>">
				<div class="row" style="margin: 0px">
					<div class="col s10">
						<div class="input-field">
							<textarea name="message" id="message"></textarea>
							<label for="message">Type message</label>
						</div>
					</div>
					<div class="col s2">
						<div class="input-field">
							<button type="submit" class="btn teal"><i class="material-icons white-text">send</i></button>
						</div>
					</div>
				</div>
			</form>
			<a href="" class="hide message-updater" dest="<?php echo __url__.'/actions/chat.action.php'; ?>"></a>
		</div>
	</div>
</div>
<script src="<?php echo __assets__.'/js/chat.io.js'; ?>"></script>