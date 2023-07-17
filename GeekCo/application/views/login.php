<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <link rel="stylesheet" href="<?php echo site_url('asset/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('asset/css/Material-Design-Iconic-Font.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('asset/css/Poppins.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('asset/css/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('asset/css/css/Login-Form-Basic-icons.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('asset/css/css/custom.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('asset/css/fonts/material-icon/css/material-design-iconic-font.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('asset/css/css/style.css');?>">
    <title>Login form</title>
</head>
<body>
  <form method="post" action="<?php echo site_url('Login/process_login'); ?>">    
    <div class="signin-content">
      <div class="signin-image"><figure><img src="<?php echo site_url('asset/img/signin-image.jpg');?>" alt="sing up image"></figure><a href="<?php echo site_url('Login/sign'); ?>" class="signup-image-link">Vous n avez pas encore de compte?</a></div>
      <div class="signin-form">
        <h2 class="form-title">Se connecter</h2>
        <p style="color:red"><?php echo isset($errorl) ? $errorl : ''; ?></p>
        <form method="POST" class="register-form" id="login-form">
            <div class="form-group"><label class="form-label" for="your_name"></label><input type="text" id="your_name" name="email" placeholder="Entrer votre email" require></div>
            <div class="form-group"><label class="form-label" for="your_pass"></label><input type="password" id="your_pass" name="pass" placeholder="Entrer votre mot de passe"></div>
            <div class="form-group form-button"><input type="submit" id="signin" class="form-submit" name="signin" value="Se connecter"></div>
        </form>
        <div class="social-login">
            <ul class="socials">
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
      </div>
    </div>
  </form>
  <script src="<?php echo site_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo site_url('asset/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo site_url('asset/js/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo site_url('asset/js/js/main.js'); ?>"></script>         
</body>
</html>