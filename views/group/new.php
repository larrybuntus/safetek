<div class="new-group h100">
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
		<h4 class="white-text"><span class="red">Nobody</span> is on their way here yet ...</h4>

		<div class="create-group">
			<a href="" class="white-text spec-ajax red-btn z-depth-4" data-extend-view=".new-group-form" data-output=".modal-content" data-toggle="modal" data-parent=".create-group">CREATE GROUP</a>

			<div class="new-group-form hide">
				<div class="container valign-center h100">
					<form class="form" data-dest="<?php echo __url__.'/actions/group.action.php'; ?>" data-output=".modal-content">
						<div class="input-field">
							<input type="text" id="gname" name="gname" class="validate center-align" maxlength="7">
							<label for="gname">Group Name</label>
						</div>
						<div class="hide">
							<input type="hidden" name="create_group">
						</div>
						<div class="input-field">
							<input type="submit" class="btn red-btn white-text create-btn" value="CREATE">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>