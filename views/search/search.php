<?php  
	$class = new Search;
	$result = $class->index();
?>
<div class="h100">
	<!-- logo -->
	<div class="logo search red-btn">
		<div class="row" style="margin-bottom: 0px;">
			<div class="col s6 offset-s3">
				<img src="<?php echo __assets__."/img/users/".$_SESSION['student_img']; ?>" alt="" class="responsive-img center-block circle">
			</div>
		</div>
		<div class="row" style="margin-bottom: 0px;">
			<div class="col s10 offset-s1">
				<h5 class="center-align white-text truncate">Hi, <?php echo $_SESSION['student_name']; ?></h5>
			</div>
		</div>
	</div>

	<!-- login form -->
	<form action="" class="search-form">
		<i class="material-icons prefix red-text">search</i>
		<input type="search" class="input white center-block dynamic-search" data-output=".hostel-list" data-dest="<?php echo __url__.'/actions/search.action.php' ?>" placeholder="Reference No." required="true">
	</form>

	<!-- list of hostels -->
	<div class="hostel-list">
		<?php include("./result.php"); ?>
	</div>
</div>