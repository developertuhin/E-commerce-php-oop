
<?php 
	$obj_adminBack = new adminBack();
	$category_info = $obj_adminBack->display_publish_category();

	if (isset($_POST['product-button'])) {
		$msg = $obj_adminBack->addProduct($_POST);
	}
 ?>

<h1>Add Product </h1>
<?php 
	if (isset($msg)) {
		echo "<span style='color:green; font-size:40px;'>$msg</span>";
	}
 ?>
<form action="" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label for="product-name"> Product Name</label>
		<input type="text" name="product-name" class="form-control" required>
	</div>

	<div class="form-group">
		<label for="product-price"> Product Price</label>
		<input type="number" name="product-price" class="form-control" required>
	</div>

	<div class="form-group">
		<label for="product-description"> Product Description</label>
		<textarea class="form-control" rows="3" name="product-description"></textarea>
	</div>

	<div class="form-group">
		<label for="product-category">Product Category </label>
		<select name="product-category" id="product-category" required class="form-control">
			<option>---Select product category---</option>
			<?php 
				while ($category = mysqli_fetch_assoc($category_info)) {
				
			 ?>
			<option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>

			<?php 	
				}
			 ?>
		</select>
	</div>

	<div class="form-group">
		<label for="product-image"> Product Image</label>
		<input type="file" name="files" class="form-control" required>
	</div>

	<div class="form-group">
		<label for="product-status"> Product Status</label>
		<select name="product-status" id="product-status" required class="form-control">
			<option value="1">Published</option>
			<option value="0">Unpublished</option>
		</select>
	</div>

	<input name="product-button" type="submit" value="Add Product" class="btn btn-primary btn-block ">
	
</form>