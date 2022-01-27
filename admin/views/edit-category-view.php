<?php 
	$obj_adminBack = new adminBack();

	if (isset($_GET['status'])) {
		$get_id = $_GET['id'];

		if ($_GET['status'] == 'edit') {
			$catAllData = $obj_adminBack->edit_category($get_id);
		}
	}

	if (isset($_POST['update_category-button'])) {
		$updateMsg = $obj_adminBack->update_category($_POST);
	}

 ?>

<?php 
	if (isset($updateMsg)) {
		echo $updateMsg;
	}
 ?>

<h2>Edit Category</h2>

<form action="" method="POST">
	<div class="form-group">
		
		<input hidden  type="text" name="update_category_id" class="form-control" required value="<?php echo $catAllData['category_id'] ?>">
	</div>

	<div class="form-group">
		<label for="category-name"> Category Name</label>
		<input type="text" name="update_category_name" class="form-control" required value="<?php echo $catAllData['category_name'] ?>">
	</div>

	<div class="form-group">
		<label for="category-description"> Category Description</label>
		<input type="text" name="update_category_description" class="form-control" required value="<?php echo $catAllData['category_description'] ?>">
	</div>
	<input name="update_category-button" type="submit" value="Update Category" class="btn btn-primary ">
</form>