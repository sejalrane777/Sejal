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
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style type="text/css">
            .error{color: red;}
        </style>
         <script >
            function toggleNav() {
            var element = document.getElementById("sidebar");
            if (element.style.width == "250px") {
                element.style.width = "5rem";
            } else {
                element.style.width = "250px";
            }
            }
        </script>
  </head>
  <body>     
    <div class="container m-0 p-0">
      <nav class="navbar fixed-top navbar-dark" style="background-color: black;">    
          <a class="navbar-brand" href="#"><b><i class="fa fa-shopping-cart"></i> eShopping</b></a>
          <div class="float-right">
            <button class="btn dropdown-toggle btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; ">My Account</button>   
                    <div class="dropdown-menu" style="max-width: 9rem;">
                      <a class="dropdown-item" href="#"><i class="fa fa-user"> Profile</i></a>
                      <a class="dropdown-item" href="#"><i class="fa fa-gear"> Settings</i></a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"><i class="fa fa-sign-out"> Logout</i></a>
                    </div>
          </div>
      </nav>
    </div>
    