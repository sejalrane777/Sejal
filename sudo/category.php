<?php include "../controller/categoryController.php";
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
              <li><a  href="dashboard.php"><i class="fa fa-tachometer"></i><span class="nav-link">Dashboard</span></a></li>
              <li><a  href="sliderImages.php"><i class="fa fa-image"></i><span class="nav-link"> Slider Image</span></a></li>
              <li class="active"><a  href="category.php"><i class="fa fa-tag"></i><span class="nav-link">Category</span> </a></li>
              <li><a href="subCategory.php"><i class="fa fa-list-alt"></i><span class="nav-link">Sub-Category</span></a></li>
              <li><a href="product.php"><i class="fa fa-shopping-basket"></i><span class="nav-link" >Products</span> </a></li>
          </ul>
        </div>
        <div class="col-xl-10 col-lg-10 col-md-10 col-10 content ">
            <div class="container mt-3 p-0">
                <div class="text-center">
                <h3>Category</h3>
                
                <br><button type="button" class="btn btn-sm btn-primary" title="Add" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus"></i> Add</button></div>
                <br><div class="bg-dark p-1" style="overflow:hidden;"><input  style="float: right" type="text" id="search" placeholder="Search"></div>
                 <div class="row m-0">
                    <table class="table table-hover w-100 text-center" id="table">
                        <thead>
                            <tr>
                                <th scope="col">Sr No.</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fetchCategory as $row){ ?>
                            <tr>
                                <td><?php echo $row['sr_no'];?></td>
                                <td><?php echo $row['category'];?></td>
                                <td>
                                <button type="button" class="btn btn-sm btn-primary edit"><i class="fa fa-pencil"></i> Edit</button>                 
                                <a class="btn btn-sm btn-danger" href="category.php?delete=<?php echo $row['sr_no'];?>" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<!-- Add Category -->

        <div class="modal fade" id="addCategory" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" role="form" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" name="category" value="<?= isset($_POST['category']) ? $_POST['category']: ''; ?>" required>
                                        <span class="error"><?php if(isset($category_error)){echo $category_error;}?></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name='save' class="btn btn-primary">Save</button>
                                <input type="reset" class="btn btn-warning" value="Reset">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- Edit Category -->

        <div class="modal fade" id="editCategory" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" role="form" method="POST">
                            <div class="row">
                                <input type="hidden" name="sr_no" id="sr_no">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" id="category" name="category" value="<?= isset($_POST['category']) ? $_POST['category']: ''; ?>" required>
                                        <span class="error"><?php if(isset($category_error)){echo $category_error;}?></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name='update' class="btn btn-primary">Save</button>
                                <input type="reset" class="btn btn-warning" value="Reset">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.edit').on('click',function(){
                $("#editCategory").modal({"backdrop": "static"});
                $('#editCategory').modal('show');
                $tr= $(this).closest('tr');
                var data =$tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                console.log(data);
                $('#sr_no').val(data[0]);
                $('#category').val(data[1]);
            });
        });
    </script>
    <script>
    function filterTable(event) {
        var filter = event.target.value.toUpperCase();
        var rows = document.querySelector("#table tbody").rows;
        
        for (var i = 0; i < rows.length; i++) {
            var sr_no = rows[i].cells[0].textContent.toUpperCase();
            var category = rows[i].cells[1].textContent.toUpperCase();
            if (sr_no.indexOf(filter) > -1 || category.indexOf(filter) > -1 ) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }      
        }
    }
    document.querySelector('#search').addEventListener('keyup', filterTable, false);
    </script>
</body>
</html>