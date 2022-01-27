<?php 
	
	$obj_adminBack = new adminBack();
	if(isset($_POST['category-button'])){
		$msg = $obj_adminBack->addCategory($_POST);
	}

 ?>

<h2>Add Category</h2><br><br>
<form action="" method="POST">
	<div class="form-group">
		<label for="category-name"> Category Name</label>
		<input type="text" name="category_name" class="form-control" required>
	</div>

	<div class="form-group">
		<label for="category-description"> Category Description</label>
		<input type="text" name="category_description" class="form-control" required>
	</div>

	<div class="form-group">
		<label for="category_status"> Category Status</label>
		<select name="category_status" id="category_status" required class="form-control">
			<option value="1">Published</option>
			<option value="0">Unpublished</option>
		</select>
	</div>

	<input name="category-button" type="submit" value="Add Category" class="btn btn-primary ">

	<?php if(isset($msg)){
		echo $msg;
	} ?>
</form>