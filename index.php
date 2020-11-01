<?php include("includes/header.php"); ?>
<?php include("controller/sliderImageController.php");?>

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
                      <img src="images/men wear.jpg" class="figure-img img-fluid  rounded-circle" alt="Men Wear">
                      <figcaption class="figure-caption text-centre d-flex justify-content-center font-weight-bold">Men Wear</figcaption>
                  </figure>
              </a>
          </div>
          <div class="col-sm-6 col-md-2">
              <a href="">
                  <figure class="figure">
                      <img src="images/men topwear.jpg" class="figure-img img-fluid  rounded-circle " alt="Men Topwear">
                      <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Men Topwear</figcaption>
                  </figure>
              </a>
          </div>
          <div class="col-sm-6 col-md-2">
              <a href="">
                  <figure class="figure">
                      <img src="images/men bottomwear.jpg" class="figure-img img-fluid  rounded-circle" alt="Men Bottomwear">
                      <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Men Bottomwear</figcaption>
                  </figure>
              </a>
          </div>
          <div class="col-sm-6 col-md-2">
              <a href="">
                  <figure class="figure">
                      <img src="images/women wear.jpg" class="figure-img img-fluid  rounded-circle" alt="Women Wear">
                      <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Women Wear</figcaption>
                  </figure>
              </a>
          </div>
          <div class="col-sm-6 col-md-2">
              <a href="">
                  <figure class="figure">
                      <img src="images/women topwear.jpg" class="figure-img img-fluid rounded-circle" alt="Women Topwear">
                      <figcaption class="figure-caption  d-flex justify-content-center font-weight-bold">Women Topwear</figcaption>
                  </figure>
              </a>
          </div>
          <div class="col-sm-6 col-md-2">
              <a href="">
                  <figure class="figure">
                      <img src="images/women bottomwear.jpg" class="figure-img img-fluid rounded-circle" alt="Women Bottomwear">
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















  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
  <!-- slick js cnd -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
  <script src="js/slick.js"></script> -->



  </body>

  </html>