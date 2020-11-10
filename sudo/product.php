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
            <div class="container mt-3 p-0">
                <div class="text-center">
                <h3>Products</h3>
                <br><a class="btn btn-sm btn-primary" href="addProduct.php" title="Add" ><i class="fa fa-plus"></i> Add</a></div>
                 <br>
              <div class="bg-dark p-1 " style="overflow:hidden;">
                <form method="post">

            <select name="limit-records" id="limit-records">
              <option  selected="selected">5</option>
              <?php foreach([10,25,50,100] as $limit): ?>
                <option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
              <?php endforeach; ?>
            </select>
            <div style="float: right"><input type="text" id="search" placeholder="Search"></div>
          </form>
                
                <!-- <div class="col-md-2"> -->
          
        </div>
      <!-- </div> -->
                 <div class="row m-0">
                    <table class="table table-hover w-100" id="table">
                        <thead>
                            <tr>
                                <th scope="col">Sr No.</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub-Category</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Created On</th>
                                <th scope="col">Updated On</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($fetch)
                            {
                            foreach ($fetch as $row){ ?>
                            <tr>
                                <td><?php echo $row['sr_no'];?></td>
                                <td><?php echo $row['category'];?></td>
                                <td><?php echo $row['subCategory'];?></td>
                                <td><?php echo $row['product'];?></td>
                                <td><?php echo $row['created_on'];?></td>
                                <td><?php echo $row['updated_on'];?></td>
                                <td>
                                <a class="btn btn-sm btn-primary" href="editProduct.php?edit=<?php echo $row['sr_no'];?>" title="edit" ><i class="fa fa-pencil"></i> Edit</a>
                                <!-- <button type="button" class="btn btn-sm btn-primary edit"><i class="fa fa-pencil"></i> Edit</button>                  -->
                                <a class="btn btn-sm btn-danger" href="product.php?delete=<?php echo $row['sr_no'];?>" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <?php } 
                          }
                          // else
                          //   {echo"no record found";}
                              ?>
                        </tbody>
                    </table>
                    <nav class="mx-auto" aria-label="page navigation ">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="product.php?page=<?= $previous; ?>">Previous</a></li>
                      <?php for($i = 1; $i<= $pages; $i++) : ?>
                      <li class="page-item"><a class="page-link" href="product.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php endfor; ?>
                      <li class="page-item"><a class="page-link" href="product.php?page=<?= $next; ?>">Next</a></li>
                    </ul>
                  </nav>
                </div>
            </div>
        </div>
        
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#limit-records").change(function(){
      $('form').submit();
    })
  })
</script>
</body>
</html>
