<?php require($_SERVER['DOCUMENT_ROOT']."/eshop/config/connection.php");
include "includes/header.php" ;
session_start();
if(!($_SESSION['email']))
{
  header("location:admin.php");
} ?>
<div class="container-fluid p-0" style="margin-top:55px;">
      <div class="row m-0">
        <div class="col-xl-2 lg-2 md-2 col-sm-auto col-xs-auto sidebar text-center" id="sidebar">
          <button class="navbar-toggler border m-3 openbtn fixed-bottom" type="button" onclick="toggleNav()"><span class="fa fa-bars" style="color: white"></span></button>
          <ul class="mt-3">
              <li class="active"><a  href="dashboard.php"><i class="fa fa-tachometer"></i><span class="nav-link">Dashboard</span></a></li>
              <li><a href="sliderImages.php"><i class="fa fa-image"></i><span class="nav-link"> Slider Image</span></a></li>
              <li><a href="category.php"><i class="fa fa-tag"></i><span class="nav-link">Category</span> </a></li>
              <li><a href="subCategory.php"><i class="fa fa-list-alt"></i><span class="nav-link">Sub-Category</span></a></li>
              <li><a href="product.php"><i class="fa fa-shopping-basket"></i><span class="nav-link" >Products</span> </a></li>  
          </ul>
        </div>
        <div class="col-xl-auto col-lg-auto col-md-auto col-auto content text-center">
          <div class="container mt-3">
            <div class="row justify-content-center">
            	<div class="col-auto mt-3">
            	<a href="category.php" ><div class="card p-2 text-center" style="width: 18rem">
             		<div class="card-body">
                  <?php $fetch=mysqli_query($conn,"SELECT * from category");
                     $row = mysqli_num_rows($fetch);
                  ?>
                		<h5 class="card-title mb-5">Categories: <span style="color:red"><?php echo $row;?></span></h5>
                		<!-- <a href="#" class="card-link p-2 m-2">Read messages</a> -->
              		</div>
            	</div>
            </a>
            	</div>
            	<div class="col-auto mt-3">
	                <a href="subCategory.php" ><div class="card p-2 text-center" style="width:18rem">
		              	<div class="card-body">
                      <?php $fetch=mysqli_query($conn,"SELECT * from sub_category");
                         $row = mysqli_num_rows($fetch);
                      ?>
		                	<h5 class="card-title mb-5">Sub-Categories: <span style="color:red"><?php echo $row;?></span></h5>
		                	<!-- <a href="" class="card-link p-2 m-2">See List</a> -->
		              	</div>
                  </div>
                </a>
	           		</div>
           		</div>
           	</div>
           	<div class="row justify-content-center">
           		<div class="col-auto mt-3">
	                <a href="product.php" ><div class="card p-2 text-center" style="width:18rem">
		              	<div class="card-body">
                      <?php $fetch=mysqli_query($conn,"SELECT * from product_list");
                     $row = mysqli_num_rows($fetch);
                  ?>
		                	<h5 class="card-title mb-5">Products: <span style="color:red"><?php echo $row;?></span></h5>
		                	<!-- <a href="" class="card-link p-2 m-2">See List</a> -->
		              	</div>
	           		</div>
              </a>
           		</div>
           		<div class="col-auto mt-3">
	                <a href="adminListing.php" ><div class="card p-2 text-center" style="width:18rem">
		              	<div class="card-body">
                      <?php $fetch=mysqli_query($conn,"SELECT * from admin");
                     $row = mysqli_num_rows($fetch);
                  ?>
		                	<h5 class="card-title mb-5">Admin: <span style="color:red"><?php echo $row;?></span></h5>
		                	<!-- <a href="" class="card-link p-2 m-2">See List</a> -->
		              	</div>
	           		</div>
              </a>
           		</div>		
        </div>
      </div>
    </div>
</div>
</div>
</body>
</html>   