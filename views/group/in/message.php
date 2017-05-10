<?php  
	if ($result !== false){
		foreach ($result as $row) { 
			$message = $row['message'];
			$img = $row['img'];
			$name = $row['name'];
			$student_id = $row['student_id'];
			$time = date("H:i", strtotime($row['dateCreated']));

			if ($student_id != $_SESSION['student_id']) {
	?>
<div class="row">
	<div class="col s3 relative">
		<img src="<?php echo __assets__.'/img/users/'.$img; ?>" alt="" class="responsive-img circle">
	</div>
	<div class="col s9">
		<div class="chat-wrapper white">
			<small class="red-text text-darken-2 truncate">@<?php echo str_replace(" ", "_", $name); ?></small>
			<div class="message"><?php echo $message ?></div>
			<small class="right grey-text text-darken-2"><?php echo $time; ?></small>
		</div>
	</div>
</div>
<?php }else{ ?>
<div class="row">
	<div class="col s9">
		<div class="chat-wrapper white">
			<small class="red-text text-darken-2 truncate">@<?php echo str_replace(" ", "_", $name); ?></small>
			<div class="message"><?php echo $message ?></div>
			<small class="right grey-text text-darken-2"><?php echo $time; ?></small>
		</div>
	</div>
	<div class="col s3 relative">
		<img src="<?php echo __assets__.'/img/users/'.$img; ?>" alt="" class="responsive-img circle">
	</div>
</div>
<?php 
		}
	} 
}
?>