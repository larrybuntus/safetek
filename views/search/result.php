<?php 
if ($result !== false)
foreach ($result as $row): ?>	
<div class="hostel">
	<h5 class="truncate">
		<a href="<?php echo __url__.'/meetpoints' ?>" class="white-text spec-ajax" data-dest="<?php echo __url__.'/actions/search.action.php' ?>" data-value="<?php echo $row['name']; ?>" data-output=".modal-content" id="<?php echo $row['id']; ?>" data-query="set"><?php echo $row['name']; ?></a>
	</h5>
</div>
<div class="divider"></div>
<?php endforeach ?>
