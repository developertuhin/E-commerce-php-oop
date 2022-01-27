
<?php 
    
    include('Class/adminBack.php');
    session_start();
    $adminId = $_SESSION['id'];
    $adminEmail = $_SESSION['admin_email'];
    if( $adminId == NULL){
        header('Location:index.php');
    }

    // Logout
    if(isset($_GET['adminLogout'])){
        $obj_adminBack = new adminBack();
        $obj_adminBack->adminLogout();
    }

 ?>







<?php include("includes/head-css.php") ?>

  <body>
  <body>
	  <div class="fixed-button">
		<a href="https://codedthemes.com/item/gradient-able-admin-template" target="_blank" class="btn btn-md btn-primary">
			<i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
		</a>
	  </div>
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

           <!-- // Top nav include file -->
           <?php include("includes/top-nav.php") ?>



            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
               
                  <?php include_once 'includes/side-nav.php' ?>


                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                    <?php 

                                        if ($views) {
                                            if ($views == "dashboard"){
                                                include("views/dashboard-view.php");
                                            }

                                            // Product start
                                             elseif ($views == "add-product"){
                                                include("views/add-product-view.php");
                                            }

                                              elseif ($views == "manage-product"){
                                                include("views/manage-product-view.php");
                                            }

                                            // Category Start
                                             elseif ($views == "add-category"){
                                                include("views/add-category-view.php");
                                            }
                                              elseif ($views == "manage-category"){
                                                include("views/manage-category-view.php");
                                            }
                                            elseif ($views =="edit-category") {
                                                include ("views/edit-category-view.php");
                                            }

                                            elseif ($views=='edit-product') {
                                                include("views/edit-product-view.php");
                                            }
                                        }

                                     ?> 

                                        
                                    </div>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
<?php include("includes/script.php") ?>

