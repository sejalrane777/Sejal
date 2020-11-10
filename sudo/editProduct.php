<?php include "includes/header.php";
include "../controller/productController.php";
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
              <li><a  href="dashboard.php"><i class="fa fa-tachometer"></i><span class="nav-link">Dashboard</span></a></li>
              <li><a  href="sliderImages.php"><i class="fa fa-image"></i><span class="nav-link"> Slider Image</span></a></li>
              <li><a  href="category.php"><i class="fa fa-tag"></i><span class="nav-link">Category</span> </a></li>
              <li><a href="subCategory.php"><i class="fa fa-list-alt"></i><span class="nav-link">Sub-Category</span></a></li>
              <li class="active"><a href="product.php"><i class="fa fa-shopping-basket"></i><span class="nav-link" >Products</span> </a></li>  
          </ul>
        </div>

        <div class="col-xl-10 col-lg-10 col-md-10 col-10 content ">
              <form class="border shadow p-3 mb-5 mt-5 bg-white mx-auto rounded" style="max-width: 600px;" method="POST" enctype="multipart/form-data" role="form">
                <div class="row">
                  <div class="form-group col-md-12">
                      <label for="category">Category</label>
                      <input type="text" class="form-control" value="<?php echo $row[1]; ?>" readonly> 
                  </div>
                <div class="form-group col-md-12">
                      <label for="category">Sub-Category</label>
                      <input type="text" class="form-control" value="<?php echo $row[2]; ?>" readonly> 
                  </div>
                      <div class="form-group col-md-12">
                          <label>Product Name</label>
                          <input type="text" class="form-control" name="product" value="<?php echo $row[3]; ?>" required>
                          <span class="error"><?php if(isset($product_error)){echo $product_error;}?></span> 
                      </div>
                      <div class="form-group col-md-12">
                          <label>Price</label>
                          <input type="number" class="form-control" name="price" value="<?php echo $row[4]; ?>" required>
                          <span class="error"><?php if(isset($price_error)){echo $price_error;}?></span> 
                      </div>

                  <div class="col-md-12 form-group">
                  <label>Size</label><br>
                  <div class="form-check form-check-inline ">
  <input class="form-check-input" type="checkbox"  name="size[]" value="XS" <?php if(in_array("XS", $checkbox_array)){ echo "checked=\"checked\""; }?>>
                  <p class="form-check-label" >XS</p>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox"  value="S" name="size[]" <?php if(in_array("S", $checkbox_array)){ echo" checked=\"checked\""; }?>>
                  <p class="form-check-label" >S</p>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox"   name="size[]" value="M" <?php if(in_array('M',$checkbox_array )) { ?> checked <?php } ?>>
                  <p class="form-check-label" >M</p>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox"  value="L" name="size[]" <?php if(in_array("L", $checkbox_array)){ echo" checked=\"checked\""; }?>>
                  <p class="form-check-label" >L</p>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox"  value="XL" name="size[]" <?php if(in_array("XLX", $checkbox_array)){ echo" checked=\"checked\""; }?>>
                  <p class="form-check-label" >XL</p>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox"  value="XXL" name="size[]">
                  <p class="form-check-label" >XXL</p>
                </div>
              </div>
                  <!-- <div class="col-md-12">
                      <div class="form-group">
                          <label>Image</label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image_1" accept=".jpg, .png, .jpeg, .gif ">
                              <label class="custom-file-label" for="image">Choose</label>
                              <div>
                                  <?php if(isset($_POST['f_error'])) { echo $f_error;}?>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Image</label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image_2" accept=".jpg, .png, .jpeg, .gif ">
                              <label class="custom-file-label" for="image">Choose</label>
                              <div>
                                  <?php if(isset($_POST['f_error'])) { echo $f_error;}?>
                              </div>
                              
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Image</label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image_3" accept=".jpg, .png, .jpeg, .gif ">
                              <label class="custom-file-label" for="image">Choose</label>
                              <div>
                                  <?php if(isset($_POST['f_error'])) { echo $f_error;}?>
                              </div>
                              
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Image</label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image_4" accept=".jpg, .png, .jpeg, .gif ">
                              <label class="custom-file-label" for="image">Choose</label>
                              <div>
                                  <?php if(isset($_POST['f_error'])) { echo $f_error;}?>
                              </div>
                              <script type="application/javascript">
                              $('input[type="file"]').change(function(e){
                                  var fileName = e.target.files[0].name;
                                 $(e.target).siblings('.custom-file-label').html(fileName);
                              });
                          </script>
                          </div>
                      </div>
                  </div> -->
                  
                      <div class="form-group col-md-12">
                          <label>Description</label>
                          <pre style="padding: 0px;border: none;"><textarea class="form-control required" id="description" name="description" style="resize: vertical;"><?php echo $row[10]; ?></textarea></pre>
                          <span class="error"><?php if(isset($description_error)){echo $description_error;}?></span> 
                      </div>
                
              </div>
              <button type="submit" name='save' class="btn btn-primary">Save</button>
              <input type="reset" class="btn btn-warning" value="Reset"> 
              <a class="btn  btn-secondary" style="float: right" href="product.php" >Go Back</a>      
              </form>