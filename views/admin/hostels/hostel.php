<div class="hostel">

	<?php
		if($hostels !== false) 
		foreach ($hostels as $hostel) { ?>
		<div class="col s12 myparent" style="padding: 0px;">
			<div class="col s8">
			<p class="flow-text truncate">- <a href="#" class="spec-ajax grey-text text-darken-2" data-extend-view=".view" data-output=".modal-content" data-parent=".myparent" data-toggle="modal"><?php echo $hostel['name'] ?></a></p>
			</div>
			<div class="div col s2">
				<p><a href="#!" class="spec-ajax grey-text text-darken-2" data-extend-view=".edit" data-output=".modal-content" data-parent=".myparent" data-toggle="modal"><i class="material-icons">mode_edit</i></a></p>
			</div>
			<div class="div col s2">
				<p><a href="#!" class="spec-ajax grey-text text-darken-2" data-dest="<?php echo __url__.'/actions/admin/hostels.actions.php'; ?>" data-output=".modal-content" data-query="delete" id="<?php echo $hostel['id'] ?>" data-fadeOut=".myparent"><i class="material-icons">delete</i></a></p>
			</div>

			<div class="view hide">
				<div class="row">
					<div class="col s12 m8 offset-m2">
						<div class="card">
							<div class="card-content">
								<p class="flow-text center-align">Hostel Details</p>
								<hr>
								<div class="row">
									<div class="col s3">
										<i class="material-icons grey-text text-darken-2">home</i>
									</div>
									<div class="col s9">
										<p class="flow-text"><?php echo $hostel['name']; ?></p>
									</div>
									<div class="col s12 divider"></div>
								</div>
								<div class="row">
									<div class="col s3">
										<i class="material-icons grey-text text-darken-2">place</i>
									</div>
									<div class="col s9">
										<p class="flow-text"><?php echo $hostel['location']; ?></p>
									</div>
									<div class="col s12 divider"></div>
								</div>
								<div class="row">
									<div class="col s12 center-align">Meetpoints</div>
									<div class="col s12" style="padding: 0px;">
										<?php  
											if($meetpoints !== false)
				    							foreach ($meetpoints as $meetpoint) {
				    								foreach ($hostels_meetpoints as $hostel_meetpoint) {
				    									if ($hostel['id'] == $hostel_meetpoint['hostel_id']) {
				    										if ($meetpoint['id'] == $hostel_meetpoint['meetpoint_id']) {
				    											echo '<p class="flow-text"><i class="material-icons grey-text text-darken-2">pin_drop</i> '.$meetpoint['name'].'</p><div class="divider"></div>';
				    										}
				    									}
				    								}
				    							}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		  	<div class="edit hide">
		  		<div class="row">
		  			<div class="col s12">
		  				<p class="flow-text center-align">Edit Hostel</p>
		  				<form class="form" data-dest="<?php echo __url__.'/actions/admin/hostels.actions.php' ?>" data-output=".modal-content">
		  					<div class="input-field">
		  						<input type="text" name="hostel" required="true" id="hostel" value="<?php echo $hostel['name'] ?>">
		  						<label for="hostel">Hostel Name</label>
		  					</div>
		  					<div class="input-field">
		  						<select name="location" id="locations" class="material">
		  							<option value="<?php echo $hostel['location_id']; ?>">Change Location</option>
		  							<?php  
		    							if($locations !== false)
		    							foreach ($locations as $location) {
		    								echo '<option value="'.$location['id'].'">'.$location['name'].'</option>';
		    							}
		    						?>
		  						</select>
		  						<label for="locations">Change Location</label>
		  					</div>
		  					<div class="input-field">
		  						<select name="meetpoints[]" id="meetpoints" multiple="true" class="material">
		  							<option value="">Change meetpoints</option>
		  							<?php  
		    							if($meetpoints !== false)
		    							foreach ($meetpoints as $meetpoint) {
		    								foreach ($hostels_meetpoints as $hostel_meetpoint) {
		    									if ($hostel['id'] == $hostel_meetpoint['hostel_id']) {
		    										if ($meetpoint['id'] == $hostel_meetpoint['meetpoint_id']) {
		    											continue 2;
		    										}
		    									}
		    								}
		    								echo '<option value="'.$meetpoint['id'].'">'.$meetpoint['name'].'</option>';
		    							}
		    						?>
		  						</select>
		  						<label for="meetpoints">Add Meetpoints <?php echo $hostel['id'] == 2? "adombi":"something" ?></label>
		  					</div>
		  					<div class="input-field center-align">
		  						<input type="hidden" name="id" value="<?php echo $hostel['id']; ?>">
		  						<input type="hidden" name="edit" value="set">
		  						<input type="submit" class="btn blue darken-2 white-text" value="UPDATE">
		  					</div>
		  				</form>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="divider"></div>
		</div>
	<?php } ?>
</div>
<script>
$(document).ready(function(){
	$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );
});
</script>