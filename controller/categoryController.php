<?php 
require($_SERVER['DOCUMENT_ROOT']."/eshop/config/connection.php");
$fetchCategory=mysqli_query($conn,"SELECT * from category ");


// Add Category

if (isset($_POST['save']))
  {
    $category      = $_POST['category'];
    if (empty($category) or !strlen(trim($category)))
      {
        $category_error = 'Field required';
      }
    else
      {
        if ($conn)
          {
            $query  = "INSERT INTO category (category) VALUES('$category') ";
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
    $category      = $_POST['category'];
    if (empty($category) or !strlen(trim($category)))
      {
        $category_error = 'Field required';
      }
    else
      {
        if ($conn)
          {
            $query = "UPDATE category SET category='$category' WHERE sr_no='$sr_no'";
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
	    mysqli_query($conn,"DELETE from category WHERE sr_no='$id' ");
	    header("location:category.php");
	    echo "<script> alert('Record deleted successfully'); </script> ";
    }
?>