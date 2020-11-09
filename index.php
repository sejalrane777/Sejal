

<?php include("controller/sliderImageController.php"); ?>
<link rel="stylesheet" href="css/slick-master/slick/slick.css">
<link rel="stylesheet" href="css/slick-master/slick/slick-theme.css">
<style>
    .slick-prev:before,
    .slick-next:before {

        color: #FFD700;
    }
</style>
<!-- star of carousal -->

<div class="first">
<?php include("includes/header.php"); ?>

<br />
<div id="carouselIndicators" class="carousel slide mt-3 " data-ride="carousel" style="padding-top:10px;">
    <ol class="carousel-indicators">
        <?php echo make_slide_indicators($conn); ?>
    </ol>
    <div class="carousel-inner">
        <?php echo make_slides($conn); ?>
    </div>
    <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>
<!-- end of carousal -->

<!-- start of categories -->

<div class="container-flex my-4 mx-5 categories circle-cat">
  <h1 class=" text-font "><strong><center class="hover-border">Categories</center></strong> </h1><br>
    <div class="row ">
        <div class="col-sm-6 col-md-4 col-lg-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/men/5.png" class="figure-img img-fluid  " alt="Men Wear" style="height:250px;">
                    <figcaption class="figure-caption text-centre d-flex justify-content-center font-weight-bold">Men Wear</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/men/1.png" class="figure-img img-fluid  " alt="Men Topwear" style="height:250px;">
                    <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Men Topwear</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/men/2.png" class="figure-img img-fluid  " alt="Men Bottomwear" style="height:250px;">
                    <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Men Bottomwear</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/women/5.png" class="figure-img img-fluid " alt="Women Wear" style="height:250px;">
                    <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Women Wear</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/women/2.png" class="figure-img img-fluid " alt="Women Topwear" style="height:250px;">
                    <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Women Topwear</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/women/3.png" class="figure-img img-fluid " alt="Women Bottomwear" style="height:250px;">
                    <figcaption class="figure-caption d-flex justify-content-center font-weight-bold">Women Bottomwear</figcaption>
                </figure>
            </a>
        </div>
    </div>
</div>
<!-- end of categories -->
<br /><br />


<!-- posters -->
<h1 class=" text-font categories  "><strong><center class="hover-border">Men Fashionista</center></strong> </h1><br>
<a href=""><img src="images/men_banner.jpg" class="img-fluid mx-auto d-block  rounded shadow-lg bg-dark" alt="men banner">
</a><br><br>


<!--end posters -->

<!-- start of slick carousel -->

<div class="container categories">
  <h1 class="text-font "><strong><center class="hover-border">
  Trending</center></strong> </h1><br>
    <div class="row slider">
        <div class=" col-md-2 ">
            <div class="card">
                <img src="images/index_images/mix/casual_men.png" class="card-img-top" alt="Trending">
            </div>
        </div>
        <div class=" col-md-2">
            <div class="card">
                <img src="images/index_images/mix/indian_women.png" class="card-img-top" alt="Trending">

            </div>
        </div>
        <div class=" col-md-2">
            <div class="card">
                <img src="images/index_images/mix/sports.png" class="card-img-top" alt="Trending">

            </div>
        </div>
        <div class=" col-md-2">
            <div class="card">
                <img src="images/index_images/mix/west_women.png" class="card-img-top" alt="Trending">

            </div>
        </div>
        <div class=" col-md-2">
            <div class="card">
                <img src="images/index_images/mix/winter_men.png" class="card-img-top" alt="Trending">

            </div>
        </div>
        <div class=" col-md-2">
            <div class="card">
                <img src="images/index_images/mix/winter_women.png" class="card-img-top" alt="Trending">

            </div>
        </div>
    </div>
</div>
<!-- start of slick carousel -->
<br><br>
<h1 class="text-font categories"><strong><center class="hover-border">Women Fashionista</center></strong> </h1><br>
<a href=""><img src="images/women_banner.jpg" class="img-fluid mx-auto d-block rounded shadow-lg bg-secondary" alt="Women banner">
</a><br /><br />


<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
<script src="js/slick.js"></script>
<?php include("includes/footer.php"); ?>