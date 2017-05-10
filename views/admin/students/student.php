<?php  
	if($students !== false)
		foreach($students as $student){
?>
	<div class="student row">
		<div class="col s12 npad waves-effect spec-ajax" data-extend-view=".view-student" data-output=".modal" data-toggle="modal" data-parent=".student">
			<div class="col s3">
				<img src="<?php echo __ASSETS__.'/img/users/placeholder.jpg' ?>" alt="" class="responsive-img circle">
			</div>
			<div class="col s9">
				<p class="flow-text truncate grey-text"><?php echo $student['name'] ?></p>
			</div>
		</div>
		<div class="view-student hide">
			<div class="row">
				<div class="col s12 m8 offset-m2">
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
									<p class="flow-text"><?php echo $student['reference_number']; ?></p>
								</div>
							</div>
							<div class="divider row"></div>
							<div class="row">
								<div class="col s6">
									<p class="flow-text">Index No.</p>
								</div>
								<div class="col s6">
									<p class="flow-text"><?php echo $student['index_number']; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="divider col s12"></div>
	</div>
<?php } ?>
