<?php 
require($_SERVER['DOCUMENT_ROOT']."/eshop/config/connection.php");
$fetch=mysqli_query($conn,"SELECT * from slider_images ");
if(mysqli_num_rows($fetch)>0){
  $row = mysqli_fetch_array($fetch);
$Image=$row[1];
}

// Add Image
  if (isset($_POST['save']))
      {
        $name       = $_FILES['image']['name'];
        $temp_name  = $_FILES['image']['tmp_name'];
        if ($conn)
          {
            $location      = '../sudo/uploads/sliderImages/';
            $target_file   = $location . basename($name);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            (move_uploaded_file($temp_name, $location . $name));
            $sql  = "INSERT INTO slider_images(image,created_date,updated_date) VALUES('$name',CURDATE(),CURDATE()) ";
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

// Edit Image
 if (isset($_POST['update'])) 
    {
    	$sr_no=   $_POST['sr_no'];
        $name       = $_FILES['newimage']['name'];
        $temp_name  = $_FILES['newimage']['tmp_name'];
        if ($conn)
            {
                if ($name != "") 
                    {
                      $location      = '../sudo/uploads/sliderImages/';
                      $target_file   = $location . basename($name);
                      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                      (move_uploaded_file($temp_name, $location . $name));
                      $query = "UPDATE slider_images SET image='$name' , updated_date = CURDATE() WHERE sr_no='$sr_no'";
                      if (mysqli_query($conn, $query))
                      { 
                        echo "<script> alert('Image updated successfully'); </script> ";
                        echo "<meta http-equiv='refresh' content='0'>";
                      }
                    }
                    // else
                    // {
                    //   $query = "UPDATE slider_images SET updated_date = CURDATE()  WHERE sr_no='$sr_no'";
                    //   if (mysqli_query($conn, $query))
                    //   { 
                    //     echo "<script> alert('Image updated successfully'); </script> ";
                    //     echo "<meta http-equiv='refresh' content='0'>";
                    //   }
                    // } 
            }
    }

// Delete Image
 if (isset($_GET['delete']))
  {
    $id=$_GET['delete'];
    unlink($Image);
    mysqli_query($conn,"DELETE from slider_images WHERE sr_no='$id' "); 
    header("location:sliderImages.php");
    echo "<script> alert('Image deleted successfully'); </script> ";
  }


function make_slide_indicators($conn)
{
 $output = ''; 
 $count = 0;
 // $result = make_query($conn);
 $fetch=mysqli_query($conn,"SELECT * from slider_images ");
 while($row = mysqli_fetch_array($fetch))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#carouselIndicators" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#carouselIndicators" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($conn)
{ 
 $output = '';
 $count = 0;
 $fetch=mysqli_query($conn,"SELECT * from slider_images ");
 // $result = make_query($conn);
 while($row = mysqli_fetch_array($fetch))
 {
  if($count == 0)
  {
   $output .= '<div class="carousel-item active">';
  }
  else
  {
   $output .= '<div class="carousel-item">';
  }
  $output .= '<img src="sudo/uploads/sliderImages/'.$row["image"].'" class="d-block w-100" /></div>';
  $count = $count + 1;
 }
 return $output;
}
?>