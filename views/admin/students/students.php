<?php  
	// initialise controller class
	$class = new Students;

	$students = $class->index();
?>
<main class="student-screen">
	<nav class="row">
	  	<div class="nav-wrapper white">
	  		<form>
		        <div class="input-field">
		          	<input id="search" type="search" class="dynamic-search" placeholder="Search Student" data-dest="<?php echo __url__.'/actions/admin/students.actions.php' ?>" data-output=".students" data-query="search" id="search" name="search">
		          	<label class="label-icon" for="search"><i class="material-icons">search</i></label>
		          	<i class="material-icons">close</i>
		        </div>
		    </form>
		</div>
	</nav>

	<div class="row">
		<div class="col s12">
			<div class="students">
			<?php include("./student.php"); ?>
			</divs>
		</div>
	</div>
</main>