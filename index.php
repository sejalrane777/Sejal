<?php include("includes/header.php"); ?>
<?php include("controller/sliderImageController.php"); ?>
<link rel="stylesheet" href="css/slick-master/slick/slick.css">
<link rel="stylesheet" href="css/slick-master/slick/slick-theme.css">

<!-- star of carousal -->
<div id="carouselIndicators" class="carousel slide mt-3" data-ride="carousel">
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
<!-- end of carousal -->

<!-- start of categories -->

<div class="container-flex my-4 mx-5">
    <h1 class="mb-4 text-monospace "><strong> Categories</strong></h1>
    <div class="row ">
        <div class="col-sm-6 col-md-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/men/5.png" class="figure-img img-fluid  " alt="Men Wear" style="height:250px;">
                    <figcaption class="figure-caption text-centre d-flex justify-content-center font-weight-bold">Men Wear</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 col-md-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/men/1.png" class="figure-img img-fluid  " alt="Men Topwear" style="height:250px;">
                    <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Men Topwear</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 col-md-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/men/2.png" class="figure-img img-fluid  " alt="Men Bottomwear" style="height:250px;">
                    <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Men Bottomwear</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 col-md-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/women/5.png" class="figure-img img-fluid " alt="Women Wear" style="height:250px;">
                    <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Women Wear</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 col-md-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/women/2.png" class="figure-img img-fluid " alt="Women Topwear" style="height:250px;">
                    <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Women Topwear</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 col-md-2">
            <a href="">
                <figure class="figure">
                    <img src="images/index_images/women/3.png" class="figure-img img-fluid " alt="Women Bottomwear" style="height:250px;">
                    <figcaption class="figure-caption d-flex justify-content-center font-weight-bold">Women Bottomwear</figcaption>
                </figure>
            </a>
        </div>
    </div>
</div>
<br><br><br>
<!-- end of categories -->



<!-- posters -->
<h1 class="ml-4 text-monospace "><strong>Men Collection</strong> </h1><br>
<a href=""><img src="images/men poster.jpg" class="img-fluid mx-auto d-block  rounded shadow-lg bg-dark" alt="men banner">
</a><br><br>
<h1 class="ml-4 text-monospace"><strong>Women Collection</strong> </h1><br>
<a href=""><img src="images/women poster.jpg" class="img-fluid mx-auto d-block rounded shadow-lg bg-secondary" alt="Women banner">
</a><br><br>

<!--end posters -->

<!-- start of slick carousel -->
<h1 class="ml-4 text-monospace "><strong>Trending</strong> </h1><br>
<div class="container">
    <div class="row slider">
        <div class=" col-md-2 ">
            <div class="card">
                <img src="images/slick men1.jpg" class="card-img-top" alt="Trending">
            </div>
        </div>
        <div class=" col-md-2">
            <div class="card">
                <img src="images/slick men2.jpg" class="card-img-top" alt="Trending">

            </div>
        </div>
        <div class=" col-md-2">
            <div class="card">
                <img src="images/slick men3.jpg" class="card-img-top" alt="Trending">

            </div>
        </div>
        <div class=" col-md-2">
            <div class="card">
                <img src="images/slick women1.jpg" class="card-img-top" alt="Trending">

            </div>
        </div>
        <div class=" col-md-2">
            <div class="card">
                <img src="images/slick women2.jpg" class="card-img-top" alt="Trending">

            </div>
        </div>
        <div class=" col-md-2">
            <div class="card">
                <img src="images/slick women3.jpg" class="card-img-top" alt="Trending">

            </div>
        </div>
    </div>
</div>
<!-- start of slick carousel -->



<?php include("includes/footer.php"); ?>
