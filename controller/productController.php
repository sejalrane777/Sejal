<?php 
require($_SERVER['DOCUMENT_ROOT']."/eshop/config/connection.php");
$fetchProducts=mysqli_query($conn,"SELECT * from product_list");
$limit=isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$fetch=mysqli_query($conn,"SELECT * from product_list LIMIT $start, $limit ");
$categories=mysqli_query($conn,"SELECT * from category");
$count=mysqli_query($conn,"SELECT * from product_list");
$total= mysqli_num_rows($count);
$pages=ceil($total/$limit) ;
$previous = $page - 1;
$next = $page + 1;


if (isset($_POST['category'])) 
{
	$category=$_POST['category'];
	$query=mysqli_query($conn,"SELECT * from sub_category where category='$category' ");
	foreach ($query as $row) {
		echo"<option value=".$row['subCategory'].">".$row['subCategory']."</option>";
	}
}

// Add Product
if(isset($_POST['save']))
{
	$category=$_POST['category'];
	$subCategory=$_POST['subCategory'];
	$product=$_POST['Product'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	$size=implode(',', $_POST['size']);


	$image_1       = $_FILES['image_1']['name'];
  $image_tmp_1  = $_FILES['image_1']['tmp_name'];
  $image_2       = $_FILES['image_2']['name'];
  $image_tmp_2  = $_FILES['image_2']['tmp_name'];
  $image_3       = $_FILES['image_3']['name'];
  $image_tmp_3  = $_FILES['image_3']['tmp_name'];
  $image_4       = $_FILES['image_4']['name'];
  $image_tmp_4  = $_FILES['image_4']['tmp_name'];
  
	if ($conn)
    {
      $location      = '../sudo/uploads/products/';
			move_uploaded_file($image_tmp_1,$location.$image_1);
			move_uploaded_file($image_tmp_2,$location.$image_2);
			move_uploaded_file($image_tmp_3,$location.$image_3);
			move_uploaded_file($image_tmp_4,$location.$image_4);
      $sql  = "INSERT INTO product_list(category,subCategory,product,price,size,image_1,image_2,image_3,image_4,description,created_on,updated_on) VALUES('$category','$subCategory','$product','$price','$size','$image_1','$image_2','$image_3','$image_4','$description',CURDATE(),CURDATE()) ";
      if (mysqli_query($conn, $sql))
        { 
          echo "<script> alert('Record added successfully'); </script> ";
          echo "<meta http-equiv='refresh' content='0'>";
        }
      else
        {
          echo "<script> alert('Something went wrong try again later'); </script> ";
        }
    }
}

// Delete Product
if (isset($_GET['delete']))
    {
	    $id=$_GET['delete'];
	    mysqli_query($conn,"DELETE from product_list WHERE sr_no='$id' ");
	    header("location:product.php");
	    echo "<script> alert('Record deleted successfully'); </script> ";
    }


//Edit Product
if(isset($_GET['edit']))
{
  $id=$_GET['edit'];
  $query=mysqli_query($conn,"SELECT * from product_list WHERE sr_no='$id'");
  $row = mysqli_fetch_array($query);
  $checkbox_array = explode(" ", $row [5]);
  // echo $checkbox_array;
}
?>
