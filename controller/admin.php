<?php
require($_SERVER['DOCUMENT_ROOT']."/eshop/config/connection.php");
session_start();
$Email=$_SESSION['email'];
$fetch=mysqli_query($conn,"SELECT * from admin");
$row = mysqli_fetch_array($fetch);
$fetchProfile=mysqli_query($conn,"SELECT * from admin WHERE email='$Email' ");
$profile = mysqli_fetch_array($fetchProfile);
if (isset($_POST['registerbtn']))
      {
          $name =$_POST['username'];
          $email =$_POST['email'];
          $password =$_POST['password'];
          $cpassword =$_POST['confirmpassword'];
          if(empty($name))
          {
             $error = "enter your name !";
             $code = 1;
           }     
          else if(empty($email))
          {
            $error = "enter your email !";
            $code = 2;
          }
          else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email))
          {
              $error = "not valid email !";
              $code = 2;
          }       
          else
          {
             ?>
                <script>
                alert('success');
                document.location.href='adminListing.php';
               </script>
            <?php
          }
        if($password==$cpassword)
        {
          $cpassword = filter_var($cpassword, FILTER_SANITIZE_EMAIL);
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $qurey ="INSERT INTO admin(name,email,password) VALUES('$name','$email','$hash')";
          $qurey_run= mysqli_query($conn,$qurey);

          if($qurey_run)
          {
               
                $_SESSION['success']="Admin profile added";
                header('Location:adminListing.php');
                echo "<script> alert('Admin profile added'); </script> ";
          }
          else
          {
            $_SESSION['status']="Admin profile Not added";
            header('Location:adminListing.php');
          }
        } 
        else
        {
          $error = "not valid password !";
          $_SESSION['status']="Admin profile Not added";
          header('Location:adminListing.php');
        } 
      }      
  
if (isset($_GET['delete']))
{
  if(mysqli_num_rows($fetch)>1)
  {
    $id=$_GET['delete'];
    mysqli_query($conn,"DELETE from admin WHERE sr_no='$id' ");
    if($profile['Sr_no']==$id)
    {
     header("location:admin.php"); 
    }
    else
    {
      header("location:adminListing.php");
      echo "<script> alert('Record deleted successfully'); </script> ";
    }
  } 
  else{
    // header("location:http://localhost/SampleModule/sudo/adminListing.php");
    echo "<script> alert('You cannot delete this record');</script> ";
  } 
}

    
if (isset($_POST['save']))
{
    // $email =$_POST['email'];
    $password =$_POST['pswd'];
    $npassword = $_POST['npswd'];
    $cpassword =$_POST['cpswd'];
        if (empty($password))
        {echo "<script type='text/javascript'>
                   $(document).ready(function(){
                   $('#pswd').modal('show');
                   });
                   </script>";
            $pswd_error='Enter Current Password';
            
        }
        elseif(password_verify($password,$row['password'])==0)
        {
            $pswd_error="You entered a wrong Password";
        }
        elseif (empty($npassword)) 
        {
            $npswd_error='Field required';
        }
        elseif (strlen($npassword)<4) 
            {
                $npswd_error="Password must contain minimum 4 characters";
            }
        elseif (!preg_match("/^.*(?=.{4,})(?=.*[0-9])(?=.*[a-zA-Z]).*$/", $npassword))
            {
                $npswd_error="Password must contain Alphabets and Digits with minimum length of 4.";
            }       
        elseif (empty($cpassword)) 
        {
            $cpswd_error='Field required';
        }
        elseif(strcmp($npassword,$cpassword))
        {
            $cpswd_error="Password do not match";
        }
        else
        {
           if($conn)
           {    
                $Pass = password_hash($cpassword, PASSWORD_DEFAULT);
                $sql = "UPDATE admin SET password='$Pass' WHERE email='$Email'";
                if (mysqli_query($conn, $sql))
                {   
                    echo "<script> alert('Update successfully'); </script> ";
                    echo "<meta http-equiv='refresh' content='3'>";
                }
                else
                {
                    echo "<script> alert('Something went wrong try again later'); </script> ";
                    echo "<meta http-equiv='refresh' content='0'>";                    
                }
           }
        }
}
   
?>