<div class="first">
  <?php include("includes/header.php"); ?>
 
  <title>Product detail</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/smoothproducts.css" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <div class="product-detail">
    <div class="container">
      <div class="row">
        <div class=" col-lg-6 col-md-6 col-sm-12">
          <div class="product-detail-left ">
            <div class="sp-wrap">             
              <a  href="images/women-top-2.jpg "><img  src="images/women-top-2.jpg" class="img-fluid"></a>
              <a href="images/women-top-3.jpg"><img src="images/women-top-3.jpg" class="img-fluid" ></a>
              <a href="images/test-image-girl.jpg"><img src="images/test-image-girl.jpg" class="img-fluid"></a>
              <a href="images/women-top-4.jpg"><img src="images/women-top-4.jpg" class="img-fluid" ></a>
            </div>
          </div>
        </div>
        <div class=" col-lg-6 col-md-6 col-sm-12">
          <div class="product-detail-right">
          <b>  <h1>Women Red Topwear</h1></b>
          <p>
          Women single piece red dress</p>
            <h5><b>Price: </b>Rs. 599</h5>
            <div class="tax">
             Inclusive of all taxes
            </div>
            <h3>Product-Detail</h3>
            <small>
              Maroon solid woven A-line dress, has a V-neck, long sleeves, button closure,
              straight hem
              Regular Fit
              The model (height 5'8") is wearing a size S
              98% Polyester and 2% Spandex
              Machine-wash
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/smoothproducts.js"></script>
  <script src="js/smoothproducts.min.js"></script>
  <script>
    $(function() {
      $(".sp-wrap").smoothproducts();
    });
  </script>

  </div>
<?php include("includes/footer.php"); ?>