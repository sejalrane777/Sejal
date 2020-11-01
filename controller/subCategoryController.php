<?php 
require($_SERVER['DOCUMENT_ROOT']."/eshop/config/connection.php");
$fetch=mysqli_query($conn,"SELECT * from sub_category ");

$categories=mysqli_query($conn,"SELECT * from category");
 
// Add Category

if (isset($_POST['save']))
  {
    $subCategory      = $_POST['subCategory'];
    $category      = $_POST['category'];
    if (empty($subCategory) or !strlen(trim($subCategory)))
      {
        $subCategory_error = 'Field required';
      }
    else
      {
        if ($conn)
          {
            $query  = "INSERT INTO sub_category (category,subCategory) VALUES('$category','$subCategory') ";
            if (mysqli_query($conn, $query))
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
  }

// Edit Category

if (isset($_POST['update'])) 
  {
    $sr_no=   $_POST['sr_no'];
    $subCategory   = $_POST['subCategory'];
    if (empty($subCategory) or !strlen(trim($subCategory)))
      {
        $subCategory = 'Field required';
      }
    else
      {
        if ($conn)
          {
            $query = "UPDATE sub_category SET subCategory = '$subCategory' WHERE sr_no='$sr_no'";
            if (mysqli_query($conn, $query))
              {
                echo "<script> alert('Record edited successfully'); </script> ";
                echo "<meta http-equiv='refresh' content='0'>";
              }
            else
              {
				        echo "<script> alert('Something went wrong try again later'); </script> ";
              }
          }
      }
  }

// Delete Category
  if (isset($_GET['delete']))
    {
	    $id=$_GET['delete'];
	    mysqli_query($conn,"DELETE from sub_category WHERE sr_no='$id' ");
	    header("location:subCategory.php");
	    echo "<script> alert('Record deleted successfully'); </script> ";
    }






?>