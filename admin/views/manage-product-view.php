<?php 

	$obj_adminBack = new adminBack();
	$product_info = $obj_adminBack->displayProduct();

	//------DELETE----
	if (isset($_GET['action'])) {
		$get_id = $_GET['id'];
		if (($_GET['action']=='delete')) {
			$get_msg = $obj_adminBack->deleteProduct($get_id);
		}
		
	}
	

 ?>


<h1>Manage Product</h1>
<?php 
	if (isset($get_msg)) {
		echo "<span style='color:red; font-size:40px;'>$get_msg</span>";
	}
 ?>
<table class="table">

	<thead>
		<tr>
			<th>ID</th>
			<th> Name</th>
			<th> Price</th>
			<th> Description</th>
			<th> Category</th>
			<th> Image</th>
			<th> Status</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
			while ($product = mysqli_fetch_assoc($product_info)) {
				
			

		 ?>
		<tr>
			<td><?php echo $product['product_id'] ?> </td>
			<td><?php echo $product['product_name'] ?> </td>
			<td><?php echo $product['product_price'] ?> </td>
			<td><?php echo $product['product_description'] ?> </td>
			<td><?php echo $product['category_name'] ?> </td>
			<td>
				<img style="height:50px;" src="upload/<?php echo $product['product_image'] ?>" alt="">
			</td>
			<td>
				<?php
				 if ($product['product_status']==1){
				 	echo "Published";
				 }else{
				 	echo "Unpublished";
				 }

				 ?>
					
				
				
			</td>
			<td>
				<a href="edit-product.php?action=edit&&id=<?php echo $product['product_id'] ?>"class="btn btn-primary">EDIT</a>
				<a href="?action=delete&&id=<?php echo $product['product_id'] ?>"class="btn btn-danger">DELETE</a>
			</td>
		</tr>

		<?php } ?>
	</tbody>
	
</table>