<?php include "../controller/admin.php";
  include "includes/header.php";
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
    <li><a  href="sliderImages.php"><i class="fa fa-image"></i><span class="nav-link"> Slider Image</span></a></li>
    <li><a  href="category.php"><i class="fa fa-tag"></i><span class="nav-link">Category</span> </a></li>
    <li><a href="subCategory.php"><i class="fa fa-list-alt"></i><span class="nav-link">Sub-Category</span></a></li>
    <li ><a href="product.php"><i class="fa fa-shopping-basket"></i><span class="nav-link" >Products</span> </a></li>
  </ul>
</div>
  <div class="col-xl-10 col-lg-10 col-md-10 col-10 content ">
    <div class="container mt-3 p-0">
      <div class="text-center">
        <h3>Admin</h3>
        <br><button type="button" class="btn btn-sm btn-primary" title="Add" data-toggle="modal" data-target="#addAdmin"><i class="fa fa-plus"></i> Add</button>
      </div>
      <br>
      <div class="bg-dark p-1" style="overflow:hidden;"><input style="float: right" type="text" id="search" placeholder="Search"></div>
      <div class="row m-0">
        <table class="table table-hover w-100 text-center" id="table">
          <thead>
            <tr>
              <th scope="col">Sr_no</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if($fetch)
              {
               foreach ($fetch as $row){ ?>
            <tr>
              <td ><?php echo $row['sr_no'];?></td>
              <td style="max-width: 250px;word-break: break-all;"><?php echo $row['name'];?></td>
              <td style="max-width: 250px;word-break: break-all;"><?php echo $row['email']?></td>
              <td>
                <a class="btn btn-sm btn-danger" href="adminListing.php?delete=<?php echo $row['sr_no'];?>" title="Delete"><i class="fa fa-trash"></i> Delete</a>
              </td>
            </tr>
            <?php }
              }
              else{
                  echo "No record found";
              } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
  <div class="modal fade" id="addAdmin" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <form action="adminListing.php" method="POST">
        <div class="modal-body">
        <?php
          if(isset($error))
          {
              ?>
        <tr>
        <td id="error"><?php echo $error; ?></td>
        </tr>
        <?php
          }
          ?>
        <div class="form-group">
        <label> Name </label>
        <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email" required value="<?php if(isset($email)){echo $email;} ?>" <?php if(isset($code) && $code == 2){ echo "autofocus"; }  ?> >
        <small class="error_email" style="color: red;"></small>
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" id="password" class="form-control" required
          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  placeholder="Enter Password"<?php if(isset($code) && $code == 4){ echo "autofocus"; }  ?> >
        </div>
        <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirmpassword" id="cpassword" class="form-control" placeholder="Confirm Password"
          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required <?php if(isset($code) && $code == 4){ echo "autofocus"; }  ?>>
        <?php
          if(isset($error))
          {
              if($password!=$cpassword)
              {
                  $error="Password doesn't match";
              }
              ?>
        <tr>
        <td id="error"><?php echo $error; ?></td>
        </tr>
        <?php
          }
          ?>
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
        </form>
    </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
      $('.edit').on('click',function(){
          $("#editContent").modal({"backdrop": "static"});
          $('#editContent').modal('show');
          $tr= $(this).closest('tr');
          var data =$tr.children("td").map(function(){
              return $(this).text();
          }).get();
          console.log(data);
          $('#sr_no').val(data[0]);
          $('#name').val(data[1]);
          $('#email').val(data[2]);  
          
          $('#password').val(data[3]); 
      });
  });
</script>
<script>
  var password = document.getElementById("password")
  , cpassword = document.getElementById("cpassword");
  
    function validatePassword()
    {
         if(password.value != cpassword.value) 
         {
            cpassword.setCustomValidity("Passwords Don't Match");
        } 
        else
         {
            cpassword.setCustomValidity('');
        }
    }
  
         password.onchange = validatePassword;
         cpassword.onkeyup = validatePassword;
</script>