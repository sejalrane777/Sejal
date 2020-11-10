<?php include "../controller/admin.php";
include "includes/header.php";
if(!($Email))
{
  header("location:admin.php");
}
?>
<style type="text/css">
	.invalid input:required:invalid {
  background: #BE4C54;
}

/* Mark valid inputs during .invalid state */
.invalid input:required:valid {
  background: #17D654;
}
</style>
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
        	<form class="border shadow p-5 m-5 text-center" style="max-width: 600px;background-color: white">
        		<i class="fa fa-user" style="font-size: 15rem"></i>
                    <div class="form-group">
                    <!-- <?php $fetch=mysqli_query($conn,"SELECT * from admin WHERE email='$Email' ");
                    $row = mysqli_fetch_array($fetch);
                	?> -->
                    <label><b> Name</b> </label>
                    <input type="text" name="username" class="form-control"  readonly value="<?php echo $profile['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label><b>Email</b></label>
                        <input type="email" name="email" class="form-control" value="<?php echo $profile['email'] ?>" readonly>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                   <br><a class="btn btn-sm btn-info" href="" data-toggle="modal" data-target="#pswd">Change Password</a>
                </form>
        </div>
    </div>
</div>
</div>
        <div class="modal fade" id="pswd" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Reset Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" class="needs-validation" novalidate method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="Password" class="form-control" name="pswd" required minlength="4" pattern="/^.*(?=.{4,})(?=.*[0-9])(?=.*[a-zA-Z]).*$/"> 
                                        <div class="invalid-feedback">
							              Please enter correct password
							        	</div>
                                        <span class="error"><?php if(isset($pswd_error)){echo $pswd_error;}?></span>
                                    </div>
                                    
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="Password" class="form-control " name="npswd" required minlength="4" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"> 
                                        <span class="error"><?php if(isset($npswd_error)){echo $npswd_error;}?></span>
                                        <div class="invalid-feedback">
							              Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters
							        	</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="Password" class="form-control " name="cpswd" required minlength="4" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">  
                                        <span class="error"><?php if(isset($cpswd_error)){echo $cpswd_error;}?></span>
                                    </div>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name='save' class="btn btn-primary">Save</button>
                                <button type="reset"  class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script type="text/javascript">
    	(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

    </script> -->
</body>
</html>