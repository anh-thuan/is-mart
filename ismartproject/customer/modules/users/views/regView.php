<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register-form</title>
  <!-- CORE CSS-->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" rel="stylesheet">

<style type="text/css">
html,
body {
    height: 100%;
}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: middle;
}
.margin {
  margin: 0 !important;
}
</style>
  
</head>

<body class="blue">


  <div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
      <form class="login-form" id="form-login" action="" method="POST">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="http://w3lessons.info/logo.png" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text">W3lessons - Material Design SignUp Form</p>
          </div>
        </div>
        <!--Fullname-->
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="fullname" type="text" name="fullname" value="<?php echo set_value('fullname')?>" class="validate">
            <label for="fullname" class="center-align">Fullname</label>
            <div class="text-danger">
            <?php echo form_error('fullname');?>
            </div>
          </div>
        </div>
        <!--Username-->
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="username" value="<?php echo set_value('username')?>" class="validate">
            <label for="username" class="center-align">Username</label>
            <div class="text-danger">
            <?php echo form_error('username');?>
            </div>
          </div>
        </div>
        <!--Password-->
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="password" value="" autocomplete="false" class="validate">
            <label for="password">Password</label>
            <div class="text-danger">
            <?php echo form_error('password');?>
            </div>
          </div>
        </div>
        <!--Email-->
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input id="email" type="text" name="email" value="<?php echo set_value('email')?>" class="validate">
            <label for="email" class="center-align">Email</label>
            <div class="text-danger">
            <?php echo form_error('email');?>
            </div>
          </div>
        </div> 
        <div class="row">
        <div class="input-field col s12">
        <input type="submit" id="btn-login" name="btn-reg" value="Signup" class="signup-button">
        </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up"><span>Already have an account? <a href="<?php echo base_url("?mod=users&action=login")?>" id="lost-pass" class="link login-link">Login</a></span></p>
          </div>
        </div>
      </form>
    </div>
  </div>


  <center>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Post Page - Responsive -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-5104998679826243"
     data-ad-slot="3470684978"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>

  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!--materialize js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>



  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27820211-3', 'auto');
  ga('send', 'pageview');

</script><script src="//load.sumome.com/" data-sumo-site-id="1cf2c3d548b156a57050bff06ee37284c67d0884b086bebd8e957ca1c34e99a1" async="async"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>