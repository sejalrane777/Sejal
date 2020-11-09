<?php include "controller/categoryController.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- <script src="js/slick.js"></script> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Fashion-Q</title>
</head>

<body>
    <!-- start of navbar -->
    <div class="container" >
        <nav class="navbar navbar-fixed-top navbar-expand-lg navbar-light  " style="background-color:transparent;padding: 2rem 1rem;">
            <a class="navbar-brand  head-title" href="index.php" style="color:white;">Fashion-Q</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"></div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto  ">
                    <?php foreach ($fetchCategory as $row) { ?>
                        <li class="nav-item dropdown ">
                            <a class="nav-link  font-weight-bold  " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-left:25px;padding-right:25px;"><?= $row['category'] ?></a>
                            <div class="dropdown-menu men-mega-menu" aria-labelledby="navbarDropdown">
                                <div class="row">
                                    <div class="col-md-auto">
                                        <p class="font-weight-bold"><img src="images/wear.png" alt=""> <?= $row['category'] ?> </p>
                                        <ul style="list-style-type:none;">
                                            <?php
                                            $fetchSubCategory = mysqli_query($conn, "SELECT * from sub_category WHERE category='" . $row['category'] . "' ");
                                            foreach ($fetchSubCategory as $sub) { ?>
                                                <li><a class="dropdown-item" href="#"><?= $sub['subCategory'] ?></a></li><br>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- Search form -->
            <!-- <div class="d-flex justify-content-center active-purple-2 mt-2" style="overflow:hidden;"><input type="text"  class="border border-top-0 border-right-0 border-left-0 active-purple-2" id="search" placeholder="Search"><i class="fa fa-search" aria-hidden="true"></i></div> -->
            <!-- <form class="form-inline d-flex justify-content-center md-form  form-sm active-purple-2 mt-2">
                <input class="form-control form-control-sm mr-3 border border-top-0 border-right-0 border-left-0" type="text" placeholder="Search" aria-label="Search"><i class="fa fa-search" aria-hidden="true"></i>
            </form> -->
        </nav>
    </div>
    <!-- end of navbar -->
