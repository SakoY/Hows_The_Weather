<!DOCTYPE HTML>
<!--[if lte IE 8]><script>var supportedBrowser=0;</script><![endif]-->
<?php
  $city = '';
  include 'weatherScript.php';
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=50%, shrink-to-fit=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="weather.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
  </head>
  <body>
    <div class="container">
      <div class="load"></div>
            <div id="acenter">
              <div id="titlebg">
                <h1 class="display-3">How's The Weather?</h1>
              </div>
              <form>
                <fieldset class="form-group">
                  <label for="city">Enter a city</label>
                  <div id="citybox"><input type="text" name="city" class="form-control" id="city" placeholder="Eg. Atlanta"></div>
                </fieldset>
                <button id="go" type="submit" class="btn btn-primary">Go</button>
              </form>
              <br>
              <div id="alertdiv">
                <!-- Alert if error or show forcast -->
                <?php
                  if ($_GET) {
                      if ($forcast == '') {
                          echo '<div class="alert alert-danger animated fadeIn" role="alert">'.$error.'</div>';
                      } else {
                          echo '<div class="alert alert-success animated fadeIn" role="alert">'.$forcast.'</div>';
                      }
                  }
                ?>
              </div>
              <nav id="footer" class="navbar navbar-default  navbar-bottom" role="navigation">
                  <div class="container text-center">
                      <p class="navbar-text col-md-12 col-sm-12 col-xs-12"> By Sako Yeremian</p>
                  </div>
              </nav>
              </div>
            </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
      if('<?php echo $_GET['city']?>'!=''){
        $(".load").show();
        //updates background to the picture of the entered city
        $("body").css({
          "background": "url('<?php echo $background?>') no-repeat center center fixed",
          "background-color": "transparent",
          "-webkit-background-size": 'cover',
          "-moz-background-size": 'cover',
          "-o-background-size": 'cover',
          "background-size": 'cover',
          "min-width": '750px',
        });
      }
        // fade out loading ring after page loads and fade in body
        $(window).load(function() {
          $(".load").fadeOut(500);
          $("body").addClass( "animated fadeIn");
          $("body").show();
        });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</html>
