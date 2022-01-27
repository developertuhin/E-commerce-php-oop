<?php 
	$obj_adminBack = new adminBack();
	$category_info = $obj_adminBack->displayCategory();

	if (isset($_GET['action'])) {
		$get_id = $_GET['id'];

		if ($_GET['action'] =='edit') {
			$product = $obj_adminBack->get_edited_productInfo($get_id);
		}
	}

	//-----Update---
	if (isset($_POST['update-product-button'])) {
		$msg = $obj_adminBack->update_product($_POST);
	}

 ?>

<?php if (isset($msg)) {
	echo "<span style='color:green; font-size:40px;'>$msg</span>";
} ?>
<h2>Edit product</h2>

<form action="" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		
		<input hidden type="text" name="update-product-id" class="form-control"  value="<?php echo $product['product_id']?>">
	</div>

	<div class="form-group">
		<label for="update-product-name"> Product Name</label>
		<input type="text" name="update-product-name" class="form-control" required value="<?php echo $product['product_name']?>">
	</div>

	<div class="form-group">
		<label for="update-product-price"> Product Price</label>
		<input type="number" name="update-product-price" class="form-control" required value="<?php echo $product['product_price']?>">
	</div>

	<div class="form-group">
		<label for="update-product-description"> Product Description</label>
		<input type="text" name="update-product-description" class="form-control" required value="<?php echo $product['product_description']?>">
	</div>

	<div class="form-group">
		<label for="update-product-category">Product Category </label>
		<select name="update-product-category" id="update-product-category" required class="form-control">
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
		<label for="update-product-status"> Product Status</label>
		<select name="update-product-status" id="update-product-status" required class="form-control">
			<option value="1">Published</option>
			<option value="0">Unpublished</option>
		</select>
	</div>

	<input name="update-product-button" type="submit" value="Update Product" class="btn btn-primary btn-block ">
	
</form>
