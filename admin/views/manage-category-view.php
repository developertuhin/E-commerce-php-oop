
<?php 
	
	$obj_adminBack = new adminBack();
	$ctgData = $obj_adminBack->displayCategory();

	if (isset($_GET['status'])) {
		$get_id = $_GET['id'];
		if ($_GET['status']=='publish') {
			$obj_adminBack->publish_category($get_id);
		}
		elseif ($_GET['status']=='unpublish') {
			$obj_adminBack->unpublish_category($get_id);
		}

		//---For DELETE---
		elseif ($_GET['status']=='delete') {

			$msg = $obj_adminBack->delete_category($get_id);
		}
	}
	
 ?>

 

 <style> 
 	th{
 		font-size: 25px;
 		
 	}
 </style>

<h1>Manage Category </h1>
<?php
	if (isset($msg)) {
		echo $msg;
	}
 ?>
<table class="table table-striped">
	<thead>
		<th>Ctg ID</th>
		<th>Category</th>
		<th>Description</th>
		<th>Ctg Status</th>
		<th>Action</th>
	</thead>

	<tbody>
		<?php 

			while ($categoryData= mysqli_fetch_assoc($ctgData)) {
		 ?>
		 <!-- HTML code start here -->
		 <tr>
		 	
			 <td> <?php echo $categoryData['category_id']; ?></td>
			 <td> <?php echo $categoryData['category_name']; ?></td>
			 <td> <?php echo $categoryData['category_description']; ?></td>
			 <td>
			  	<?php 
			  		if ($categoryData['category_status']==0) {
			  			echo "Unpublished";
			  		
			  	?>
			  	<a href="?status=publish&&id=<?php echo $categoryData['category_id']; ?>" class="btn btn-sm btn-success ">Make Published</a>

			  	<?php
			  		}else {
			  			echo "Published";
			  	?>
			  	<a href="?status=unpublish&&id=<?php echo $categoryData['category_id'];?>" class="btn btn-sm btn-danger ">Make Unpublished</a>

			  	<?php 
			  		}
			  	 ?> 
			 </td>
			
			 <td>
			 	<a href="edit-category.php?status=edit&&id=<?php echo $categoryData['category_id'];  ?>" class="btn btn-primary">EDIT</a>
			 	<a href="?status=delete&&id=<?php echo $categoryData['category_id']; ?>" class="btn btn-danger" id="delete">DELETE</a>
			 	
			 	
			 </td>
			 	
			
		 </tr>

		 <?php 
		 	}
		  ?>
	</tbody>
</table>