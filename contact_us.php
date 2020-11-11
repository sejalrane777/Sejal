

<?php
// http://tutorialzine.com/2014/12/quick-tip-easy-form-validation-with-html5/
// http://getbootstrap.com/css/#forms
// http://www.w3schools.com/php/php_form_validation.asp
// https://www.shutterstock.com/search/similar/75225007
// http://jsfiddle.net/jx6e857y/

$gacode = "UA-XXXXX-X";

$messagetext = $name  = $email = $subject = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if($_POST["email"] == "name@example.com") {
    $mailto = "website@example.com";
    $mailsubject = 'new submission from example.com';

    $errors = array();

    $name = test_input($_POST["name"]);
    $email = test_input($_POST["first_email"]);
    $subject = test_input($_POST["subject"]);
    $message = test_input($_POST["message"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Please correct your email address"; 
    }

    is_required('name');
    is_required('email');
    is_required('subject');
    is_required('message');

    if (count($errors) > 0) {
      $messagetext = '<div class="alert alert-danger">'.join($errors,"<br>").'</div>';  
    } else {
      // send email
      $mailheaders = 'From: '.$mailto . "\r\n" .
      'Reply-To: ' . $mailto . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
      $mailmessage =  'From: '.$email.'\n'.
                  'Email: '.$email.'\n'.
                  'Subject: '.$subject.'\n'.
                  'Message: '.$message.'\n';
      mail($mailto, $mailsubject, $mailmessage, $mailheaders);
      // TODO: add logging
      $messagetext = '<div class="alert alert-success">Thank you for your message, we will get in touch shortly.</div>';  
      $name  = $email = $subject = $message = "";
    }
  } else {
    $messagetext = '<div class="alert alert-danger">It appears you are sending automated mail, please contact us otherwise</div>';  
  }
}

function is_required($fieldname) {
  global $errors;
  global $$fieldname;
  $field = $$fieldname;
  if (isset($field) && $field == "") {
    $errors[$fieldname] = "Please enter a value for field \"$fieldname\"";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function has_error($fieldname) {
  global $errors;
  if(isset($errors[$fieldname])) return " has-error"; 
  return "";
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<div class="first">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    body {
     
      padding-bottom: 20px;
    }
    .confirm {
      display: none;
    }

    :root{
  /*===== Colores =====*/
  --first-color: #1A73E8;
  --input-color: #80868B;
  --border-color: #DADCE0;

  /*===== Fuente y tipografia =====*/
  --body-font: 'Roboto', sans-serif;
  --normal-font-size: 1rem;
  --small-font-size: .75rem;
}
  
/*===== BASE =====*/
*,::before,::after{
  box-sizing: border-box;
}
body{
  margin: 0;
  padding: 0;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
}
h1{
  margin: 0;
}

/*===== FORM =====*/
.l-form{
  display: flex;
  justify-content: center;
  align-items: center;
  /* height: 100vh; */
}
.form{
  width: 600px;
  padding: 4rem ;
  border-radius: 1rem;
  box-shadow: 0 10px 25px rgba(92,99,105,.2);
}
.form__title{
  font-weight: 400;
  margin-bottom: 3rem;
}
.form__div{
  position: relative;
  height: 48px;
  margin-bottom: 1.5rem;
}
.form__input{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  font-size: var(--normal-font-size);
  border: 1px solid var(--border-color);
  border-radius: .5rem;
  outline: none;
  padding: 1rem;
  background: none;
  z-index: 1;
}
.form__label{
  position: absolute;
  left: 1rem;
  top: 1rem;
  padding: 0 .25rem;
  background-color: #fff;
  color: var(--input-color);
  font-size: var(--normal-font-size);
  transition: .3s;
}

.form__button{
  display: block;
  margin-left: auto;
  padding: .75rem 2rem;
  outline: none;
  border: none;
  background-color: var(--first-color);
  color: #fff;
  font-size: var(--normal-font-size);
  border-radius: .5rem;
  cursor: pointer;
  transition: .3s;
}
.form__button:hover{
  box-shadow: 0 10px 36px rgba(0,0,0,.15);
}

/*Input focus move up label*/
.form__input:focus + .form__label{
  top: -.5rem;
  left: .8rem;
  color: var(--first-color);
  font-size: var(--small-font-size);
  font-weight: 500;
  z-index: 10;
}

/*Input focus sticky top label*/
.form__input:not(:placeholder-shown).form__input:not(:focus)+ .form__label{
  top: -.5rem;
  left: .8rem;
  font-size: var(--small-font-size);
  font-weight: 500;
  z-index: 10;
}

/*Input focus*/
.form__input:focus{
  border: 1.5px solid var(--first-color);
}

.details{
  
    padding-right: 30px !important;
    padding-left: 30px !important;

}

    </style>
    <!-- <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script> -->
    </head>
    
    <?php include("includes/header.php"); ?> 
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
   
    <!-- Main jumbotron for a primary marketing message or call to action -->

    <div class="jumbotron maps">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3781.405381639322!2d73.75120701489391!3d18.600827687362308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b97c678b8961%3A0x23b56ae9b4e91fab!2sECSTATIC%20SOFTWARE%20TECHNOLOGIES%20PVT%20LTD!5e0!3m2!1sen!2sin!4v1605095891033!5m2!1sen!2sin" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen ></iframe>  
       </div> 
    <div class="row">
      <?php print $messagetext; ?>
      <!-- Example row of columns -->
      <div class="l-form col-lg-6 col-md-6 col-sm-12">
            <form action="" class="form">
                <h1 class="form__title">Contact Us</h1>

                <div class="form__div">
                    <input type="text" class="form__input" placeholder=" ">
                    <label for="" class="form__label">Name</label>
                </div>

                <div class="form__div">
                    <input type="text" class="form__input" placeholder=" ">
                    <label for="" class="form__label">Email</label>
                </div>
                <div class="form__div">
                    <input type="text" class="form__input" placeholder=" ">
                    <label for="" class="form__label">Phone</label>
                </div>
                <div class="form__div">
                    <input type="text" class="form__input" placeholder=" ">
                    <label for="" class="form__label">Message</label>
                </div>

                <input type="submit" class="form__button" value="Send">
            </form>
        </div>
     
        <div class="col-md-6 col-lg-6 col-sm-12 details">
          <h2>Address</h2>
          <br><br>
          <p>Office no 403, Sanskruti House , Above Royal </p>
          <p>Enfield Showroom, Bhumkar Chowk , Wakad , Pune.</p>
          <p>Office no 403, Sanskruti House , Above Royal </p>
          <p>Enfield Showroom, Bhumkar Chowk , Wakad , Pune.</p>
          <p>Office no 403, Sanskruti House , Above Royal </p>
          <p>Enfield Showroom, Bhumkar Chowk , Wakad , Pune.</p>
        </div>
      </div>
     
      
    </div>
    <!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" charset="utf-8" async defer>
      $('.maps').mousedown(function () {
          $('.maps iframe').css("pointer-events", "auto");
      });

      $( ".maps" ).mouseleave(function() {
        $('.maps iframe').css("pointer-events", "none"); 
      });
    </script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','<?php print $gacode; ?>','auto');ga('send','pageview');
    </script>
  </body>
</html>

</div>
<br><br><br>
<?php include("includes/footer.php"); ?>