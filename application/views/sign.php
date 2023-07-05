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
    <title>Sign Form</title>
</head>
<body>    
  <div class="form signup">
    <form method="post" action="<?php echo site_url('Login/process_sign_in'); ?> " enctype="multipart/form-data">
      <div class="signup-content">
          <div class="signup-form">
              <h2 class="form-title">Inscription</h2>
              <form method="POST" class="register-form" id="register-form">
                  <p style="color:red"><?php echo isset($errors) ? $errors : ''; ?></p>
                  <div class="form-group"><input type="text" id="name" name="nom" placeholder="Entrer votre nom" value="<?php echo isset($formData['nom']) ? $formData['nom'] : ''; ?>" style="border-right-style: none;" require></div>
                  <div class="form-group"><input type="text" id="email" name="prenom" placeholder="Entrer votre prenom" value="<?php echo isset($formData['prenom']) ? $formData['prenom'] : ''; ?>" require></div>
                  <div class="form-group"><input type="date" id="date_naissance" name="date_naissance" value="<?php echo isset($formData['date_naissance']) ? $formData['date_naissance'] : ''; ?>" require></div>
                  <div class="form-group"><select style="width:100%;border-top: none;border-left: none;border-right: none;" name="idprofession" value="<?php echo isset($formData['idprofession']) ? $formData['idprofession'] : ''; ?>" id="idprofession" require>
                    <option value="#">Choisissez votre Profession</option> 
                    <?php for($i = 0;$i<count($prof);$i++) { ?>
                      <option value="<?php echo $prof[$i]['id']; ?>"><?php echo $prof[$i]['designation']; ?></option>
                    <?php } ?>
                  </select></div>
                  <div class="form-group"><input type="text" id="pseudo" name="pseudo" placeholder="Entrer votre pseudo" value="<?php echo isset($formData['pseudo']) ? $formData['pseudo'] : ''; ?>" style="border-right-style: none;" require></div>
                  <div class="form-group"><input type="file" id="image" name="image" placeholder="Entrer votre nom" style="border-right-style: none;" require></div>
                  <div class="form-group"><input type="email" id="pass" name="email" placeholder="Entrer votre Email" value="<?php echo isset($formData['email']) ? $formData['email'] : ''; ?>" require></div>
                  <div class="form-group"><input type="password" id="re_pass" name="pass" placeholder="Entrer votre mot de passe" value="<?php echo isset($formData['pass']) ? $formData['pass'] : ''; ?>" require></div>
                  <div class="form-group"><input type="password" id="re_pass" name="pass1" placeholder="Confirmer votre mot de passe" value="<?php echo isset($formData['pass1']) ? $formData['pass1'] : ''; ?>" require></div>
                  <div class="form-group form-button"><input type="submit" id="signup" class="form-submit" name="signup" value="Inscription"></div>
              </form>
          </div>
          <div class="signup-image"><figure><img src="<?php echo site_url('asset/img/signup-image.jpg');?>" alt="sing up image"></figure><a href="<?php echo site_url('login');?>" class="signup-image-link">Vous etes deja membre?</a></div>
      </div>
    </form>
  </div> 
  <script src="<?php echo site_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo site_url('asset/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo site_url('asset/js/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo site_url('asset/js/js/main.js'); ?>"></script>         
</body>
</html>
  
