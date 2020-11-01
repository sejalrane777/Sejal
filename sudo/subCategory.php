<?php include "../controller/subCategoryController.php";
include "includes/header.php" ?>
<div class="container-fluid p-0" style="margin-top:55px;">
      <div class="row m-0">
        <div class="col-xl-2 lg-2 md-2 col-sm-auto col-xs-auto sidebar text-center" id="sidebar">
          <button class="navbar-toggler border m-3 openbtn fixed-bottom" type="button" onclick="toggleNav()"><span class="fa fa-bars" style="color: white"></span></button>
          <ul class="mt-3">
              <li><a  href="dashboard.php"><i class="fa fa-tachometer"></i><span class="nav-link">Dashboard</span></a></li>
              <li><a  href="sliderImages.php"><i class="fa fa-image"></i><span class="nav-link"> Slider Image</span></a></li>
              <li><a  href="category.php"><i class="fa fa-tag"></i><span class="nav-link">Category</span> </a></li>
              <li class="active"><a href="subCategory.php"><i class="fa fa-list-alt"></i><span class="nav-link">Sub-Category</span></a></li>
              <li><a href="product.php"><i class="fa fa-shopping-basket"></i><span class="nav-link" >Products</span> </a></li>  
          </ul>
        </div>
        <div class="col-xl-10 col-lg-10 col-md-10 col-10 content ">
            <div class="container mt-3 p-0">
                <div class="text-center">
                <h3>Sub-Category</h3>
                <br><a class="btn btn-sm btn-primary" href="" title="Add" data-toggle="modal" data-target="#addSubCategory"><i class="fa fa-plus"></i> Add</a></div>
                 <br><div class="bg-dark p-1" style="overflow:hidden;"><input style="float: right" type="text" id="search" placeholder="Search"></div>
                 <div class="row m-0">
                    <table class="table table-hover w-100" id="table">
                        <thead>
                            <tr>
                                <th scope="col">Sr No.</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub-Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fetch as $row){ ?>
                            <tr>
                                <td><?php echo $row['sr_no'];?></td>
                                <td><?php echo $row['category'];?></td>
                                <td><?php echo $row['subCategory'];?></td>
                                <td>
                                <button type="button" class="btn btn-sm btn-primary edit"><i class="fa fa-pencil"></i> Edit</button>                 
                                <a class="btn btn-sm btn-danger" href="subCategory.php?delete=<?php echo $row['sr_no'];?>" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<!-- Add Sub-Category -->

        <div class="modal fade" id="addSubCategory" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Sub-Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" role="form" method="POST">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="category">Select Category</label>
                                    <select name="category" class="form-control" required>
                                        <option value="">Select</option>
                                        <?php 
                                        foreach ($categories as $row) 
                                        {
                                            ?>
                                        <!-- <option value="<?php echo $row['sr_no'] ;echo (isset($_POST['sr_no']) && $_POST['sr_no'] == $row['sr_no']) ? 'selected="selected  "' : '';?>"><?php echo $row['category'] ?></option> -->
                                        <option value='<?php echo $row['category'] ?>'><?php echo $row['category'] ?></option>;
                                         <?php    
                                        }
                                        ?>                                        
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sub-Category Name</label>
                                        <input type="text" class="form-control" name="subCategory" value="<?= isset($_POST['subCategory']) ? $_POST['subCategory']: ''; ?>" required>
                                        <span class="error"><?php if(isset($subCategory_error)){echo $subCategory_error;}?></span> 
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

<!-- Edit Sub-Category -->

        <div class="modal fade" id="editSubCategory" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Sub-Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" role="form" method="POST">
                            <div class="row">
                                <input type="hidden" name="sr_no" id="sr_no">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" id="category" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sub-Category Name</label>
                                        <input type="text" class="form-control" id="subCategory" name="subCategory" required>
                                        <span class="error"><?php if(isset($subCategory_error)){echo $subCategory_error;}?></span> 
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('.edit').on('click',function(){
                $("#editSubCategory").modal({"backdrop": "static"});
                $('#editSubCategory').modal('show');
                $tr= $(this).closest('tr');
                var data =$tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                console.log(data);
                $('#sr_no').val(data[0]);
                $('#category').val(data[1]);
                $('#subCategory').val(data[2]);
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
            var subCategory = rows[i].cells[1].textContent.toUpperCase();
            if (sr_no.indexOf(filter) > -1 || category.indexOf(filter) > -1 || subCategory.indexOf(filter) > -1 ) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }      
        }
    }
    document.querySelector('#search').addEventListener('keyup', filterTable, false);
    </script>