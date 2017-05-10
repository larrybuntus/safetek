<?php  
	$class = new Meetpoints;
	$result = null;

	if (!isset($_SESSION['hostel_id'])) {
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}else{
		$result = $class->index($_SESSION['hostel_id']);
	}
?>
<div class="meetpoints">
	<div class="navbar-fixed">
		<nav class="red-btn">
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo center"><i class="material-icons">pin_drop</i> Meetpoints</a>
		      <ul id="nav-mobile" class="left">
		        <li><a href="#" class="spec-ajax" data-back="true"><i class="material-icons md-36">keyboard_arrow_left</i></a></li>
		      </ul> 
		    </div>
	  	</nav>
  	</div>

  	<div class="meetpoints-list">
		<?php if($result !== false) 
			foreach ($result as $row) { ?>
		<div class="meetpoint">
			<h5 class="truncate white-text">
				<a href="" data-query="set" id="<?php echo $row['hostel_meetpoint']; ?>" class="white-text spec-ajax" data-output=".modal-content" data-dest="<?php echo __url__.'/actions/meetpoints.action.php' ?>">
					<i class="material-icons">pin_drop</i> <?php echo $row['name']; ?>
				</a>
			</h5>
		</div>
		<div class="divider"></div>
		<?php } else{ ?>
		<div class="meetpoint">
			<h5 class="white-text">No Meetpoints for selected location</h5>
		</div>
		<?php } ?>
	</div>
</div>