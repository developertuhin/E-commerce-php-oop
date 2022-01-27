<?php 

	class adminBack{

		private $conn;

		 function __construct(){
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "";
			$dbname = "e-commerce";


			$this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

			if (!$this->conn) {
				die("DB connection Failed...!!!");
			}
		}

		 function adminLogin($data){
			$admin_email = $data['admin_email'];
			$admin_password = md5($data['admin_password']);

			$query = "SELECT * FROM adminlogin WHERE admin_email = '$admin_email' AND admin_password = '$admin_password'";

			if(mysqli_query($this->conn,$query)){
				$result = mysqli_query($this->conn,$query);
				$adminInfo = mysqli_fetch_assoc($result);

				if($adminInfo){
					header("Location:dashboard.php");
					session_start();
					$_SESSION['id'] = $adminInfo['id'];
					$_SESSION['admin_email'] = $adminInfo['admin_email'];

				}else{
					$errorMsg = "Username and Password is incorrect/not matching...!";
					return $errorMsg;
				}
			}
		}


		// Admin Logout
		 function adminLogout(){
			unset($_SESSION['id']);
			unset($_SESSION['admin_email']);

			header("location:index.php");

		}

		//---ADD Categroy function
		 function addCategory($data){
			$categroyName = $data['category_name'];
			$categoryDes = $data['category_description'];
			$categoryStatus = $data['category_status'];

			$query = "INSERT INTO category(category_name,category_description,category_status) VALUES ('$categroyName','$categoryDes','$categoryStatus')";

			if(mysqli_query($this->conn,$query)){
				$msg = " Categroy Added Successfully...!";
				return $msg;
			}else{
				$msg = "Categroy Not Addeded...!";
				return $msg;
			}
		}

		//---Manage Category Function----
		 function displayCategory(){
			$query = "SELECT * FROM category";
			if (mysqli_query($this->conn,$query)) {
				$returnCategory = mysqli_query($this->conn,$query);
				return $returnCategory;
			}
		}

		function display_publish_category(){
			$query = "SELECT * FROM category WHERE category_status=1";
			if (mysqli_query($this->conn,$query)) {
				$returnCategory = mysqli_query($this->conn,$query);
				return $returnCategory;
			}
		}


		//--------Publish Category----------
		function publish_category($id){
			$query = "UPDATE category SET category_status=1 WHERE category_id = $id";
			mysqli_query($this->conn,$query);
		}
	//--------Un Publish Category----------
		function unpublish_category($id){
			$query = "UPDATE category SET category_status = 0 WHERE category_id=$id";
			mysqli_query($this->conn,$query);
		}

		//-----DELETE---
		function delete_category($id){
			$query = "DELETE FROM category WHERE category_id=$id";
			if (mysqli_query($this->conn,$query)) {
				$msg = "Category Deleted Successfully.....!!!!";
				return $msg;
			}
		}

		//---Get or Select data from db--Edit/Update---
		function edit_category($id){
			$query = "SELECT * FROM category WHERE category_id=$id";
			if ($get_catData = mysqli_query($this->conn,$query)) {
				$get_catAllData = mysqli_fetch_assoc($get_catData);
				return $get_catAllData;
			}
		}

		//--------Update Category Data---
		function update_category($data){
			$catId = $data['update_category_id'];
			$catName = $data['update_category_name'];
			$catDes = $data['update_category_description'];

			$query = "UPDATE category SET category_name='$catName', category_description='$catDes' WHERE category_id='$catId'";
			if (mysqli_query($this->conn,$query)) {
				$updateMsg = "Category Data Updated Successfully....!!!";
				return $updateMsg;
			}
		}

		//-----Add Product-----
		function addProduct($data){
			$product_name = $data['product-name'];
			$product_price = $data['product-price'];
			$product_description = $data['product-description'];
			$product_category = $data['product-category'];
			$product_status = $data['product-status'];

			//---for upload file/image---
			$product_image_name = $_FILES['files']['name'];
			$product_tmp_name = $_FILES['files']['tmp_name'];

			$product_image_size=$_FILES['files']['size'];
			$product_image_ext =pathinfo($product_image_name,PATHINFO_EXTENSION);

			//-----query and validation --
			if ($product_image_ext == 'jpg' or $product_image_ext == 'jpeg' or $product_image_ext == 'png') {
				
				if ($product_image_size<=2097152) {

					$query = "INSERT INTO product(product_name,product_price,product_description,product_category,product_image,product_status) VALUES('$product_name','$product_price','$product_description','$product_category','$product_image_name','$product_status')";

					if (mysqli_query($this->conn,$query)) {
						move_uploaded_file($product_tmp_name,'upload/'.$product_image_name);
						$msg = "Product uploaded Successfully";
						return $msg;
					}
					
				}else{
					$msg = "Please upload file should be less or equal 2MB....!";
					return $msg;
				}
			}else{
				$msg ="Please upload JPG/PNG/JPEG file.....!";
				return $msg;
			}


		}

		//--------Display Product---
		function displayProduct(){
			$query = "SELECT * FROM product_category_info";
			if ($product = mysqli_query($this->conn,$query)) {
				return $product;
			}
		}
		//-----Delete product function---
		function deleteProduct($id){
			$query="DELETE FROM product WHERE product_id=$id";
			if (mysqli_query($this->conn,$query)) {
				$msg = "Product Deleted Successfully....";
				return $msg;
			}
		}

		//--------Get Edit Product Info---
		function get_edited_productInfo($id){
			$query = "SELECT * FROM  product WHERE product_id='$id'";
			if ($product_data = mysqli_query($this->conn,$query)) {
				$product_info = mysqli_fetch_assoc($product_data);
				return $product_info;
			}
		}

		//----------UPDATE PRODUCTS----
		function update_product($data){
			$product_id = $data['update-product-id'];
			$product_name = $data['update-product-name'];
			$product_price =$data['update-product-price'];
			$product_description =$data['update-product-description'];
			$product_category =$data['update-product-category'];
			$product_status =$data['update-product-status'];

			//---Image --
			$product_image_name = $_FILES['files']['name'];
			$product_image_tmp_name = $_FILES['files']['tmp_name'];

			$query = "UPDATE product SET
			product_name='$product_name',
			 product_price='$product_price',
			  product_description='$product_description',
			   product_category='$product_category',
			    product_image='$product_image_name',
			    product_status='$product_status'
			     WHERE product_id='$product_id'";

			if (mysqli_query($this->conn,$query)) {
				move_uploaded_file($product_image_tmp_name,'upload/'.$product_image_name);
				$msg="Product Update Successfully";
				return $msg;
			}
		}


		//----Display Product by Category in frontend---

		function display_product_by_category($id){
			$query = "SELECT * FROM product_category_info WHERE category_id='$id'";
			if (mysqli_query($this->conn,$query)) {
				$products = mysqli_query($this->conn,$query);
				return $products;
			}
		}

		//------------Display Single Product-------------
		function display_single_product($id){
			$query = "SELECT * FROM product_category_info WHERE product_id = '$id'";

			if ($productsInfo = mysqli_query($this->conn,$query)) {
				return $productsInfo;
			}
			else{
				echo "Data not get from DB";
			}
		}

// --------------------Display Related Products------------------
		function display_related_products($id){
			$query = "SELECT * FROM product_category_info WHERE category_id = $id ORDER BY product_id DESC limit 4";

			if ($productsInfo = mysqli_query($this->conn,$query)) {
				return $productsInfo;
			}
			else{
				echo "Data not get from DB";
			}
		}
		
	}


 ?>