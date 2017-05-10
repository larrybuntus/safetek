<?php  
	// initialise controller class
	$class = new Dashboard;

	$func = new myFunc;

	// get alerts
	list($alerts,$graph) = $class->index(date("Y-m-d"),date("Y-m-d"));
?>
<main>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<!-- date range -->
	<div class="date-range">
		<div class="row">
			<div class="col s4">
				<div class="card red-btn darken-3 z-depth-2 date">
					<p class="flow-text center-align truncate"><a href="" class="white-text spec-ajax click" data-query="date" data-value="<?php echo date("Y-m-d").','.date("Y-m-d"); ?>" data-output=".destination" data-dest="<?php echo __url__.'/actions/admin/dashboard.actions.php' ?>">Today</a></p>
				</div>
			</div>
			<div class="col s4">
					<?php  list($start,$end) = $func->week_range(date("Y-m-d"));?>
				<div class="card blue darken-3 z-depth-2 date">
					<p class="flow-text center-align truncate"><a href="" class="white-text spec-ajax click" data-query="date" data-value="<?php echo $start.','.$end;?>" data-output=".destination" data-dest="<?php echo __url__.'/actions/admin/dashboard.actions.php' ?>">This Week</a></p>
				</div>
			</div>
			<div class="col s4">
				<div class="card blue darken-3 z-depth-2 date">
					<p class="flow-text center-align truncate"><a href="" class="white-text spec-ajax click" data-query="date" data-value="<?php echo date("Y-m-01").','.date("Y-m-t", strtotime(date("Y-m-d")));?>" data-output=".destination" data-dest="<?php echo __url__.'/actions/admin/dashboard.actions.php' ?>">This Month</a></p>
				</div>
			</div>
		</div>
	</div>

	<div class="alerts">
		<div class="row">
			<div class="col s12">
				<div class="card z-depth-2">
					<div class="card-image red-btn" style="padding: 8px !important;">
						<h5 class="white-text center-align" style="margin: 0px;">Alerts</h5>
					</div>
					<div class="card-content" style="max-height: 250px; overflow-y: auto;">
						<?php  
							if($alerts !== false)
								foreach ($alerts as $alert) { ?>
						<div class="row parent">
							<blockquote style="margin-top: 0px; margin-bottom: 8px;">
							<div class="">
								<a href="" class="spec-ajax right" data-dest="<?= __url__.'/actions/admin/dashboard.actions.php' ?>" data-query="mute" data-value="<?= $alert['id'].','.$alert['emergencyDate'] ?>" data-output=".modal-content" data-fadeOut=".parent">
									<i class="material-icons red-text">volume_mute</i></a>
							</div
								<p class="truncate">Student: <?php echo $alert['student']; ?></p>
								<p class="truncate">@ <?php echo date("jS M @ H:s:i", strtotime($alert["dateCreated"])).' GMT'; ?></p>
								<p>In Group: <?php echo $alert['group_name']; ?></p>

								<div>
									<iframe
									  width="100%"
									  frameborder="0" style="border:0"
									  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBMQp77mS6RS7xa86elOkEDHaWu7zvmaME
									    &q=<?php echo $alert['latitude'].','.$alert['longitude']; ?>" allowfullscreen>
									</iframe>
								</div>
							</blockquote>
							<div class="divider"></div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <div class="destination">
    	<?php include("./content.php"); ?>
    </div>

	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on("click", ".click", function(e){
				$(".date").removeClass("blue, red-btn");
				$(".date").addClass("blue");
				$(this).parents(".date").removeClass("blue");
				$(this).parents(".date").addClass("red-btn");
			})
		});
	</script>
</main>