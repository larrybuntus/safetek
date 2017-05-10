<?php  
	// initialize controller class
	$class = new Groups;
	$func = new myFunc;

	$date = date("Y-m-d");

	// call index function
	list($groups,$students,$active) = $class->index($date,$date);


?>
<main>
	<!-- date range -->
	<div class="date-range">
		<div class="row">
			<div class="col s4">
				<div class="card red-btn darken-3 z-depth-2 date">
					<p class="flow-text center-align truncate"><a href="" class="white-text spec-ajax click" data-query="date" data-value="<?php echo date("Y-m-d").','.date("Y-m-d"); ?>" data-output=".destination" data-dest="<?php echo __url__.'/actions/admin/groups.actions.php' ?>">Today</a></p>
				</div>
			</div>
			<div class="col s4">
					<?php  list($start,$end) = $func->week_range(date("Y-m-d"));?>
				<div class="card blue darken-3 z-depth-2 date">
					<p class="flow-text center-align truncate"><a href="" class="white-text spec-ajax click" data-query="date" data-value="<?php echo $start.','.$end;?>" data-output=".destination" data-dest="<?php echo __url__.'/actions/admin/groups.actions.php' ?>">This Week</a></p>
				</div>
			</div>
			<div class="col s4">
				<div class="card blue darken-3 z-depth-2 date">
					<p class="flow-text center-align truncate"><a href="" class="white-text spec-ajax click" data-query="date" data-value="<?php echo date("Y-m-01").','.date("Y-m-t", strtotime(date("Y-m-d")));?>" data-output=".destination" data-dest="<?php echo __url__.'/actions/admin/groups.actions.php' ?>">This Month</a></p>
				</div>
			</div>
		</div>
	</div>

	<div class="destination">
	<?php  include("./content.php"); ?>
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