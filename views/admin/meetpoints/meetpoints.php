<?php  
	$class = new Meetpoints;

	list($meetpoints, $locations) = $class->index();
?>
<main>
	<nav>
	  	<div class="nav-wrapper white">
	  		<form>
		        <div class="input-field">
		          	<input id="search" type="search" required placeholder="Search meetpoints" class="dynamic-search" data-output=".ad-meetpoints" data-dest="<?php echo __url__.'/actions/admin/meetpoints.actions.php' ?>" data-query="search" name="search">
		          	<label class="label-icon" for="search"><i class="material-icons">search</i></label>
		          	<i class="material-icons">close</i>
		        </div>
		    </form>
		</div>
	</nav>
	<div class="row" style="margin-bottom: 0px;">
	    <div class="col s12" style="padding: 16px;">
			<a href="#" class="dropdown-right grey-text text-darken-2 flow-text" data-activates="allLocations"><i class="material-icons">place</i> Locations</a>
			<ul id='allLocations' class='dropdown-content'>
			<?php foreach($locations as $location){ ?>
			    <li><a href="#" class="spec-ajax" id="<?php echo $location['id'] ?>" data-query="location" data-output=".meetpoints" data-dest="<?php echo __url__.'/actions/admin/meetpoints.actions.php' ?>"><?php echo $location['name'] ?></a></li>
		  	<?php } ?>
		  	</ul>
		</div>
	</div>


	<div class="row">
		<?php include("./meetpoint.php"); ?>
	</div>


	<div class="fixed-action-btn parent">
	    <a class="btn-floating btn-large red-btn spec-ajax" data-extend-view=".add-hostel" data-toggle="modal" data-output=".modal-content" data-parent=".parent">
	      <i class="large material-icons">add</i>
	    </a>

	    <div class="add-hostel hide">
	    	<div class="row">
	    		<div class="col s12">
	    			<p class="flow-text center-align">Add New Meetpoint</p>
	    			<form class="form" data-dest="<?php echo __url__.'/actions/admin/meetpoints.actions.php' ?>" data-output=".modal-content">
	    				<div class="input-field">
	    					<input type="text" class="validate" name="name" id="name">
	    					<label for="name">Meetpoint Name</label>
	    				</div>
	    				<div class="input-field">
	    					<select name="location" id="location" class="material">
	    						<?php  
	    							if($locations !== false)
	    							foreach ($locations as $location) {
	    								echo '<option value="'.$location['id'].'">'.$location['name'].'</option>';
	    							}
	    						?>
	    					</select>
	    					<label for="location">Location</label>
	    				</div>
	    				<div class="input-field center-align">
	    					<input type="hidden" name="add" value="set">
	    					<input type="submit" class="btn blue darken-2 white-text" value="ADD">
	    				</div>
	    			</form>
	    		</div>
	    	</div>
	    </div>
 	</div>
 	<script>
		// initialized select only when needed
	    	$(document).ready(function(e){
	    		// initialized material select
				$(document).on("click", "[data-toggle='modal']", function(e){$('select.material').material_select();});
	    		// destroy instance of select
	    		$("#modal").modal({ complete: function(){ $('select.material').material_select('destroy');}});
			});
	</script>
</main>