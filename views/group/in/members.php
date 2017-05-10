<?php  
	$class = new Group;

	$result = $class->members($_SESSION['group_id']);
?>
<div class="group-members h100">
	<div class="navbar-fixed">
		<nav class="red-btn">
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo center"><i class="material-icons">people</i> Members</a>
		      <ul id="nav-mobile" class="left">
		        <li><a href="" class="spec-ajax" data-back="true"><i class="material-icons md-36">keyboard_arrow_left</i></a></li>
		      </ul>
		    </div>
	  	</nav>
  	</div>

  	<div class="group-member">
  		<?php
  			if ($result !== false) 
  				foreach ($result as $row) { ?>
		<div class="row">
			<div class="col s3"><img src="<?php echo __assets__.'/img/users/'.$row['img']; ?>" alt="" class="circle responsive-img"></div>
			<div class="col s9">
				<p class="flow-text truncate member white-text"><?php echo $row['name'] ?></p>
			</div>
			<div class="col s12"><div class="divider"></div></div>
		</div>
			<?php } ?>
	</div>
</div>