<div class="ad-meetpoints">
	<?php
		if($meetpoints !== false) 
			foreach ($meetpoints as $meetpoint) { ?>
				<div class="col s12 mymeetpoint" style="padding: 0px;">
					<div class="col s8">
						<p class="flow-text truncate">- <a href="#" class="spec-ajax grey-text text-darken-2" data-extend-view=".view" data-output=".modal-content" data-parent=".mymeetpoint" data-toggle="modal"><?php echo $meetpoint['name'] ?></a></p>
					</div>
					<div class="div col s2">
						<p><a href="#!" class="spec-ajax grey-text text-darken-2" data-extend-view=".edit" data-output=".modal-content" data-parent=".mymeetpoint" data-toggle="modal"><i class="material-icons">mode_edit</i></a></p>
					</div>
					<div class="div col s2">
						<p><a href="#!" class="spec-ajax grey-text text-darken-2" data-dest="<?php echo __url__.'/actions/admin/meetpoints.actions.php'; ?>" data-output=".modal-content" data-query="delete" id="<?php echo $meetpoint['id'] ?>" data-fadeOut=".mymeetpoint"><i class="material-icons">delete</i></a></p>
					</div>

					<div class="view hide">
						<div class="row">
							<div class="col s12 m8 offset-m2">
								<div class="card">
									<div class="card-content">
										<p class="flow-text center-align">Meetpoint Details</p>
										<hr>
										<div class="row">
											<div class="col s3">
												<i class="material-icons grey-text text-darken-2">pin_drop</i>
											</div>
											<div class="col s9">
												<p class="flow-text"><?php echo $meetpoint['name']; ?></p>
											</div>
											<div class="col s12 divider"></div>
										</div>
										<div class="row">
											<div class="col s3">
												<i class="material-icons grey-text text-darken-2">place</i>
											</div>
											<div class="col s9">
												<p class="flow-text"><?php echo $meetpoint['location']; ?></p>
											</div>
											<div class="col s12 divider"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="edit hide">
						<div class="row">
				  			<div class="col s12">
				  				<p class="flow-text center-align">Edit Meetpoint</p>
				  				<form class="form" data-dest="<?php echo __url__.'/actions/admin/meetpoints.actions.php' ?>" data-output=".modal-content">
				  					<div class="input-field">
				  						<input type="text" name="name" required="true" id="name" value="<?php echo $meetpoint['name'] ?>">
				  						<label for="name">Meetpoint Name</label>
				  					</div>
				  					<div class="input-field">
				  						<select name="location" id="locations" class="material">
				  							<option value="<?php echo $meetpoint['location_id']; ?>">Change Location</option>
				  							<?php  
				    							if($locations !== false)
				    							foreach ($locations as $location) {
				    								echo '<option value="'.$location['id'].'">'.$location['name'].'</option>';
				    							}
				    						?>
				  						</select>
				  						<label for="locations">Change Location</label>
				  					</div>
				  					<div class="input-field center-align">
				  						<input type="hidden" name="id" value="<?php echo $meetpoint['id'] ?>">
				  						<input type="hidden" name="edit" value="set">
				  						<input type="submit" class="btn teal" value="EDIT">
				  					</div>
				  				</form>
				  			</div>
				  		</div>
					</div>
				</div>
	<?php } ?>
</div>