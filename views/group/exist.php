<div class="exit-group h100">
	<div class="navbar-fixed">
		<nav class="red-btn">
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo center"><i class="material-icons">home</i> <?php echo $_SESSION['hostel_name'] ?></a>
		      <ul id="nav-mobile" class="left">
		        <li><a href="" class="spec-ajax" data-back="true"><i class="material-icons md-36">keyboard_arrow_left</i></a></li>
		      </ul>
		    </div>
	  	</nav>
  	</div>

  	<div class="new-group center-align valign-center h88">
		<h4 class="white-text"><span class="red"><?php echo $_SESSION['group_peeps'] ?> peeps</span> are on their way here ...</h4>

		<div class="create-group">
			<a href="" data-dest="<?php echo __url__.'/actions/group.action.php'; ?>" data-query="join" data-output=".modal-content" class="white-text z-depth-4 red-btn spec-ajax">Join Them</a>
		</div>
	</div>
</div>