<div class="group h100">
	<div class="navbar-fixed">
		<nav class="red-btn">
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo center w70 waves-effect"><i class="material-icons">people</i> <?php echo $_SESSION['group_name'] ?></a>
		    </div>
	  	</nav>
  	</div>

  	<div class="group-in center-align valign-center h88">
		<div class="row">
			<a href="<?php echo __url__.'/group/in/members' ?>" class="btn red-btn link hoverable z-depth-4 waves-effect"><i class="material-icons md-36 left">people</i> <p class="left">View Members</p></a>
		</div>

		<div class="row">
			<a href="<?php echo __url__.'/group/in/chat' ?>" class="btn red-btn link hoverable z-depth-4 waves-effect"><i class="material-icons md-36 left">chat_bubble</i> <p class="left">Chat</p></a>
		</div>

		<div class="row">
			<a href="" class="btn red-btn link hoverable z-depth-4 waves-effect spec-ajax" data-query="exit" data-dest="<?php echo __url__.'/actions/group.action.php' ?>" data-output=".modal-content"><i class="material-icons md-36 left">power_settings_new</i> <p class="left">Exit</p></a>
		</div>

		<div class="row">
			<a href="" class="btn indigo hoverable set-off z-depth-4 waves-effect spec-ajax" data-query="setoff" data-dest="<?php echo __url__.'/actions/group.action.php' ?>" data-output=".modal-content">Set Off</a>
		</div>

	</div>
</div>