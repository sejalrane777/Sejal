<?php require "../controller/loginController.php" ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Kite+One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
            .error{color: red;}
        </style>
</head>
<body style="background-color:#f5f5f5 ">
    <div class="container-fluid mt-5" style="max-width: 500px;">
            <h1 class="text-center">Login</h1>
            <br>
            <form class="border shadow p-3 mb-5 bg-white rounded" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="form-label-group">
                    <label for="email"><b>Email</b></label>
                    <input type="email" name="email" class="form-control" placeholder="Email address"  autofocus="" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                    <span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
                </div>
                <div class="form-label-group">
                    <br><label for="pswd"><b>Password</b></label>
                    <input type="password" name="pswd" class="form-control" placeholder="Password" autocomplete="off">  
                    <span class="error" ><?php if(isset($pswd_error)){echo $pswd_error;}?></span> 
                </div>
                <br><button class="btn btn-lg btn-primary btn-block" id="submit" name=submit type="submit">Sign in</button> 
                <br><p style="text-align: center;"><a href="#" style="color: black">Forgot Password</a></p>      
            </form>
        </div>
</body>
</html>

