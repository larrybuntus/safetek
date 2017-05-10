<?php
$created = 0;
if ($groups !== false)
		$created = count($groups);
?>

<!-- summary -->
	<div class="row group-summary">
		<div class="col s12 center-align">
			<div class="col s6 created">
				<h3><?php echo $created; ?></h3>
				<p class="flow-text">Created</p>
			</div>
			<div class="col s6 active">
				<h3><?php echo $active ?></h3>
				<p class="flow-text">Active</p>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col s12">
			<ul class="collapsible" data-collapsible="expandable">
				<?php  
					if($groups !== false)
						foreach ($groups as $group) { ?>
			    <li>
			      	<div class="collapsible-header waves-effect active"><?php echo $group['name'] ?></div>
			      	<div class="collapsible-body grey darken-2 white-text">
						<p>Created By: Student Name,</p> 
						<p>Date Created: <?php echo date('jS M', strtotime($group['dateCreated'])).' @ '.date('H:i:s', strtotime($group['dateCreated'])) ?></p>
						<p>Meetpoint: <?php echo $group['meetpoint'] ?></p>
						<div class="group-members-container">

						<?php 
						if($students !== false)
						foreach ($students as $student) { 
							if ($student['group_id'] == $group['id']) {
						?>
							<div class="group-member">
								<img src="../assets/img/users/placeholder.jpg" alt="" class="responsive-img circle spec-ajax" data-extend-view=".view-student" data-output=".modal" data-toggle="modal" data-parent=".group-member">
								<small class="truncate center-align"><?php echo $student['name']; ?></small>

								<div class="view-student hide">
									<div class="row">
										<div class="col s12">
											<div class="card">
												<div class="card-image">
													<img src="../assets/img/users/placeholder.jpg" alt="">
												</div>
												<div class="card-content">
													<div class="row">
														<div class="col s3">
															<i class="material-icons grey-text text-darken-2">person</i>
														</div>
														<div class="col s9">
															<p class="flow-text"><?php echo $student['name'] ?></p>
														</div>
													</div>
													<div class="divider row"></div>
													<div class="row">
														<div class="col s3">
															<i class="material-icons grey-text text-darken-2">dialpad</i>
														</div>
														<div class="col s9">
															<p class="flow-text"><a href="tel: <?php echo $student['number'] ?>"><?php echo $student['number'] ?></a></p>
														</div>
													</div>
													<div class="divider row"></div>
													<div class="row">
														<div class="col s3">
															<i class="material-icons grey-text text-darken-2">email</i>
														</div>
														<div class="col s9">
															<p class="flow-text"><a href="mailto: <?php echo $student['email'] ?>"><?php echo $student['email'] ?></a></p>
														</div>
													</div>
													<div class="divider row"></div>
													<div class="row">
														<div class="col s6">
															<p class="flow-text">Ref. No.</p>
														</div>
														<div class="col s6">
															<p class="flow-text"><?php echo $student['reference_number'] ?></p>
														</div>
													</div>
													<div class="divider row"></div>
													<div class="row">
														<div class="col s6">
															<p class="flow-text">Index No.</p>
														</div>
														<div class="col s6">
															<p class="flow-text"><?php echo $student['index_number'] ?></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } } ?>
						</div>
			      	</div>
			    </li>
			    <?php }
			    	else 
			    		"<p class='flow-text center-align'>No Groups</p>";
			    ?>
		  	</ul>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
	    $('.collapsible').collapsible();
	 });
</script>