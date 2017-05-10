<?php  
	// initialise class
	$class = new Admins;

	// default view
	$admins = $class->index();
?>
<main>
	<!-- hostels -->
	<div class="row">
		<div class="col s12">
			<div class="admins">
			<?php  
				if($admins !== false){
					foreach ($admins as $admin) {
			?>
				<div class="card waves-effect">
					<div class="card-content spec-ajax" style="padding: 8px;" data-extend-view=".details" data-output=".modal-content" data-toggle="modal" data-parent=".card">
						<div class="row" style="margin-bottom: 0px;">
							<div class="col s3">
								<img src="<?= __assets__.'/img/users/'.$admin['img'] ?>" class="responsive-img circle waves-effect">
							</div>
							<div class="col s9">
								<p class="truncate flow-text"><?= $admin['name']; ?></p>
								<p><a href="tel: <?= $admin['number'] ?>" class="grey-text text-darken-1"><?= $admin['number'] ?></a></p>
							</div>
						</div>
					</div>

					<div class="hide details">
						<div class="card" style="margin: -24px;">
							<div class="card-image">
								<img src="<?= __assets__.'/img/users/'.$admin['img'] ?>" alt="">
							</div>
							<div class="card-content">
								<div class="row">
									<div class="col s2"><i class="material-icons grey-text">person</i></div>
									<div class="col s10"><p class="flow-text"><?= $admin['name'] ?></p></div>
								</div>
								<div class="row">
									<div class="col s2"><i class="material-icons grey-text">phone</i></div>
									<div class="col s10"><p class="flow-text"><a href="tel: <?= $admin['number'] ?>" class="blue-text text-darken-2"><?= $admin['number'] ?></a></p></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php 
					}
				} 
			?>
			</div>
		</div>
	</div>

	<?php if (isset($_SESSION['admin_role']) && $_SESSION['admin_role'] == 1): ?>
	<div class="fixed-action-btn parent">
	    <a class="btn-floating btn-large red-btn spec-ajax" data-extend-view=".add-admin" data-toggle="modal" data-output=".modal-content" data-parent=".parent">
	      <i class="large material-icons">add</i>
	    </a>

	    <div class="add-admin hide">
	    	<div class="row">
	    		<div class="col s12">
	    			<p class="flow-text center-align">Add New Admin</p>
	    			<form class="form" data-dest="<?= __url__.'/actions/admin/admins.actions.php' ?>" data-output=".modal-content">
	    				<div class="input-field">
	    					<input type="text" name="name" id="name" required="true">
	    					<label for="name">Name</label>
	    				</div>
	    				<div class="input-field">
	    					<input type="email" name="email" id="email" required="true">
	    					<label for="email">Email</label>
	    				</div>
						<div class="input-field">
	    					<input type="tel" name="tel" id="tel" required="true">
	    					<label for="tel">Telephone</label>
	    				</div>
	    				<div class="input-field">
	    					<select name="role" id="role" required="true" class="material">
	    						<option value="0">Admin</option>
	    						<option value="1">Super User</option>
	    					</select>
	    					<label for="role">Role</label>
	    				</div>
	    				<div class="file-field input-field">
					      	<div class="btn blue darken-3">
					       		<span class="white-text">Image</span>
					        	<input type="file" name="img">
					      	</div>
					      	<div class="file-path-wrapper">
					        	<input class="file-path validate" type="text">
					      	</div>
					    </div>
					    <div class="hidden">
					    	<input type="hidden" name="add" value="set">
					    </div>
						<div class="input-field center-align">
	    					<input type="submit" value="ADD" class="btn blue darken-3 white-text">
	    				</div>

	    			</form>
	    		</div>
	    	</div>
	    </div>
 	</div>
 	<?php endif ?>
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