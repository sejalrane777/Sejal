<?php include "../controller/sliderImageController.php";
include "includes/header.php" ;?>
<div class="container-fluid p-0" style="margin-top:55px;">
  <div class="row m-0">
    <div class="col-xl-2 lg-2 md-2 col-sm-auto col-xs-auto sidebar text-center" id="sidebar">
      <button class="navbar-toggler border m-3 openbtn fixed-bottom" type="button" onclick="toggleNav()"><span class="fa fa-bars" style="color: white"></span></button>
      <ul class="mt-3">
         <li><a  href="dashboard.php"><i class="fa fa-tachometer"></i><span class="nav-link">Dashboard</span></a></li>
              <li class="active"><a  href="sliderImages.php"><i class="fa fa-image"></i><span class="nav-link"> Slider Image</span></a></li>
              <li ><a  href="category.php"><i class="fa fa-tag"></i><span class="nav-link">Category</span> </a></li>
              <li><a href="subCategory.php"><i class="fa fa-list-alt"></i><span class="nav-link">Sub-Category</span></a></li>
              <li><a href="product.php"><i class="fa fa-shopping-basket"></i><span class="nav-link" >Products</span> </a></li>
      </ul>
    </div>
    <div class="col-xl-10 col-lg-10 col-md-10 col-10 content ">
      <div class="container mt-3 p-0">
        <div class="text-center">
          <h3>Slider Images</h3>
            <br><button type="button" class="btn btn-sm btn-primary" title="Add" data-toggle="modal" data-target="#addSliderImage"><i class="fa fa-plus"></i> Add</button>
        </div>
         <br><div class="bg-dark p-1" style="overflow:hidden;"><input style="float: right" type="text" id="search" placeholder="Search"></div>
        <div class="row m-0">
          <table class="table table-hover w-100 text-center" id="table">
            <thead>
                            <tr>
                                <th scope="col">Sr No.</th>
                                <th scope="col">Image  Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created On</th>
                                <th scope="col">Updated On</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fetch as $row){ ?>
                            <tr>
                                <td><?php echo $row['sr_no'];?></td>
                                <td><?php echo $row['image'];?></td>
                                <td><img src="uploads/sliderImages/<?php echo $row['image']?>" height="200" width="200"></td>
                                
                                <td><?php echo $row['created_date'];?></td>
                                <td><?php echo $row['updated_date'];?></td>
                                <td>
                                <button type="button" class="btn btn-sm btn-primary edit"><i class="fa fa-pencil"></i> Edit</button>                 
                                <a class="btn btn-sm btn-danger" href="sliderImages.php?delete=<?php echo $row['sr_no'];?>" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
              </div>
          </div>
        </div>
<!-- Add Slider Image -->
        <div class="modal fade" id="addSliderImage" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Slider Image</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" role="form" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" accept=".jpg, .png, .jpeg, .gif ">
                                            <label class="custom-file-label" for="image">Choose</label>
                                            <div>
                                                <?php if(isset($_POST['f_error'])) { echo $f_error;}?>
                                            </div>
                                            <script type="application/javascript">
                                                $('input[type="file"]').change(function(e) {
                                                  var fileName = e.target.files[0].name;
                                                  $('.custom-file-label').html(fileName);
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name='save' class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- Edit Slider Image -->
        <div class="modal fade" id="editSliderImage" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Timeline</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" role="form" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <input type="hidden" name="sr_no" id="sr_no">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Old Image</label> 
                                        <input type="text" id="image" class="form-control" readonly> 
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>New Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="newimage"  accept=".jpg, .png, .jpeg, .gif ">
                                            <label class="custom-file-label" for="image">Choose</label>
                                            <div>
                                                <?php if(isset($_POST['f_error'])) { echo $f_error;}?>
                                            </div>
                                            <script type="application/javascript">
                                                $('input[type="file"]').change(function(e) {
                                                  var fileName = e.target.files[0].name;
                                                  $('.custom-file-label').html(fileName);
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name='update' class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
          </div>
    </div>
  </div>
</div>
<!-- Popup Edit modal with values -->
  <script type="text/javascript">
        $(document).ready(function(){
            $('.edit').on('click',function(){
                $("#editSliderImage").modal({"backdrop": "static"});
                $('#editSliderImage').modal('show');
                $tr= $(this).closest('tr');
                var data =$tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                console.log(data);
                $('#sr_no').val(data[0]);
                $('#image').val(data[1]);
            });
        });
    </script>
<!-- Search -->
    <script>
      function filterTable(event) {
          var filter = event.target.value.toUpperCase();
          var rows = document.querySelector("#table tbody").rows;
          
          for (var i = 0; i < rows.length; i++) {
              var sr_no = rows[i].cells[0].textContent.toUpperCase();
              var image = rows[i].cells[1].textContent.toUpperCase();
              if (sr_no.indexOf(filter) > -1 || image.indexOf(filter) > -1 ) {
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