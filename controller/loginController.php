<?php    
require($_SERVER['DOCUMENT_ROOT']."/eshop/config/connection.php");
    if(isset($_POST['submit']))
    	{
            if ($conn)
            {
        		$EMAIL=$_POST['email'];
                $EMAIL = filter_var($EMAIL, FILTER_SANITIZE_EMAIL);
                $EMAIL  = mysqli_real_escape_string($conn,$EMAIL);
        		$PSWD=$_POST['pswd'];
        		$Email="select * from admin where email='$EMAIL'";
        		$Query=mysqli_query($conn,$Email);
        		 if(empty($EMAIL)) 
        			{
        				$email_error='Enter Email';
        			}
        		elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$_POST["email"]))
    				{
    				$email_error="Invalid Email Address";
    				}
                elseif(empty($PSWD))
                    {
                        $pswd_error="Enter password";
                    }		
        		elseif(mysqli_num_rows($Query)>0)
                    {
                        $Fetch=mysqli_fetch_array($Query);
                        $password=$Fetch['password'];
                        if(password_verify($PSWD, $password))
                        {  
                            session_start();
                            $_SESSION["email"]=$EMAIL;
                            $sessionid=session_id();
                            $ip=$_SERVER['REMOTE_ADDR'];
                            $browser = $_SERVER['HTTP_USER_AGENT'];
                            $sql="INSERT INTO last_login (email,sessionid,ip,browser,date,time) VALUES('$EMAIL','$sessionid','$ip','$browser',CURDATE(),CURTIME())";
                            mysqli_query($conn, $sql); 
                            header("location:dashboard.php");
                        } 
                        else
                        {
                           $pswd_error="Incorrect Password";
                        }
                    }   
                else
                    {   
                        $email_error="Wrong Email Address";
                    }    
            }  
    else
    {
        echo "<script type='text/javascript'>
                   $(document).ready(function(){
                   $('#Modal1').modal('show');
                   });
                   setTimeout(function() 
                   {
                  $('#Modal1').modal('hide');
                  window.location.replace('http://localhost/eshop/index.php')
                  }, 6000);
                   </script>";
    }
}
    mysqli_close($conn)  
?>