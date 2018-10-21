<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Flupcoin</title>
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/index.css" rel="stylesheet">

      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script>$(document).ready(function() {
          $('[data-toggle="popover"]').popover();
      });</script>
      <style>
      .form-control-feedback {
          padding-top: 10px;
      }
      </style>
</head>

<body>
<nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".flupbook-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand navbar-custom-brand" href="index.php">
              <img src="images/Logo.png" class="img-responsive logo" />
            </a>
        </div>
        <div class="collapse navbar-collapse flupbook-navbar">
        <ul class="nav navbar-nav navbar-right">
            <li class="login-input"><div class="form-group has-feedback">
                    <input class="input" data-container=".row" placeholder="E-mail" id="emailEntered" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Must be your registered e-mail " type="text" required="">

                </div></li>
            <li class="login-input"><div class="form-group has-feedback">
                    <input class="input" data-container=".row" placeholder="Password" id="passwordEntered" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Must be at least 32 characters long, and may contain letters." type="password" required="">
                    <a href="" class="fa fa-warning form-control-feedback"></a>
                </div></li>
            <li class="login"><button type="submit" class="btn-login" id="btnLogin">Log in</button></li>
        </ul>
        </div>
    </div>
    </div>
</nav>

<div class="container index">
  <div class="row">
    <div class="col-xs-0 col-sm-6 col-md-6 col-lg-6 text-center">
      <h1 class="text-center">Be a Forest Warrior!</h1>
      <center><small>EARN MONEY BY SAVING OUR FOREST</small></center>
        <a href="#about">ABOUT</a> | <a href="#works">HOW IT WORKS</a> | <a href="#contact">CONTACT</a>
      <center><img src="images/ForestWarrior.gif" class="img-responsive" alt="Image"></center>
      <div class="row threeIcons text-center">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
          <center><img src="images/ForestGuard.png"  class="img-responsive" width="90em"/></center>
          <small>Guardian</small>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <center><img src="images/ForestWarrior.png"  class="img-responsive" width="90em"/></center>
          <small>Knight  </small>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <center><img src="images/ForestNinja.png"  class="img-responsive" width="90em"/></center>
            <small>Ninja</small>
        </div>
      </div>
      <br />
      <br />

    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 signup">
      <div class="panel panel-success">
        <div class="panel-body">
           <form role="form">
            <h2>SIGNUP</h2> <small style="color: #3fc380;">It's free and always will be.</small>
            <hr class="colorgraph">
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-md-12">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                  <input type="text" class="form-control" id="firstname" placeholder="Firstname">
              </div><br>
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                  <input type="text" class="form-control" id="lastname" placeholder="Lastname">
              </div><br>
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
                  <input type="email" class="form-control" id="email" placeholder="E-mail">
              </div><br>
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
                  <input type="password" class="form-control" id="password" placeholder="Password">
              </div><br>
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
                  <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
              </div><br>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-12 text-center">
              <small>By clicking <strong class="label label-success">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.</small>
            </div>
            </div>
            <div class="text-center">
              <button type="button" class="btn-register" id="btnRegister">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row index" id="about">

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
      <div class="panel panel-success about">
          <div class="panel-title text-center">
            <img src="images/ForestMoney.png" class="img-responsive img-center img-about" alt="ForestMoney">
            <h1>Money</h1>
          </div>
        <div class="panel-body">

          <p class="lead text-center">You can now earn money by converting your virtual coins to peso.</p>
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <div class="panel panel-success about">
          <div class="panel-title text-center">
            <img src="images/ForestDiscover.png" class="img-responsive img-center img-about" alt="ForestDiscover">
            <h1>Discover</h1>
          </div>
        <div class="panel-body">

          <p class="lead text-center">Know more about the forest in our nation for you to be aware of how beautiful our natural resources is.</p>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <div class="panel panel-success about">
          <div class="panel-title text-center">
            <img src="images/ForestShare.png" class="img-responsive img-center img-about" alt="ForestShare2">
            <h1>Share</h1>
          </div>
        <div class="panel-body">

          <p class="lead text-center">You can now share your new discovery, reports, and adventures in our platform. This can help our community to be aware of the situation in every forest.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row index" id="works">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
      <h2>How it Works?</h2>
    </div>
  </div>
  <div class="row index" id="works">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <ul class="howItWorks">
        <li>Share the situation of a forest</li>
        <li>Share your adventure in a forest</li>
        <li>Share an illegal activity in a forest</li>
        <li>Earn forest coins that can be converted to peso.</li>
      </ul>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <center><img src="images/question.jpg" class="img-responsive" width="300em"/></center>
    </div>
  </div>

  <br />
  <br />
  <br />
  <div class="row index" id="contact">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
      <h2>Contact Us</h2>
      <br />
      <center><img src="images/Telegram.png" class="img-responsive" width="200em"/></center>
      <br />
      <div class="img-center-icons">
      <a href="#"><img src="images/fb.png" class="img-responsive" width="100em"/></a>
      <a href="#"><img src="images/twitter.png" class="img-responsive" width="80em"/></a>
      <a href="#"><img src="images/insta.png" class="img-responsive" width="50em"/></a>
      </div>
    </div>
  </div>
  <br />
  <br />
  <br />
  <br />
  <footer>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <a href="#home">Home</a> | <a href="#about">About</a> | <a href="#works">How it Works</a> | <a href="#contact">Contact Us</a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
          &copy;FLUPCOIN Made in Philippines
        </div>
    </div>
  </footer>

</div>

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/functionality.js"></script>

<script type="text/javascript">
$('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

var amountScrolled = 300;

$(window).scroll(function() {
  if ( $(window).scrollTop() > amountScrolled ) {
    $('a.back-to-top').fadeIn('slow');
  } else {
    $('a.back-to-top').fadeOut('slow');
  }
});

$('a.back-to-top, a.simple-back-to-top').click(function() {
  $('html, body').animate({
    scrollTop: 0
  }, 700);
  return false;
});
</script>
</body>
</html>
