<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Iglesia La Verdad y La Vida</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>Public/estilo/login.css">
</head>
<body>

<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container">
            <!-- <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" /> -->
            <img id="profile-img" class="profile-img-card" src="<?= base_url() ?>Public/images/VYV.png"/> 
            <p id="profile-name" class="profile-name-card"></p>

            <div id="mensaje" align="center">
           
             <font size="4" color="red" ><?php print_r($Mensaje); ?></font>
        
            </div>

            <div class="form-signin">
	            <?= form_open(base_url().'login/iniciosesion'); ?>
	                <span id="reauth-email" class="reauth-email"></span>
	                <input type="text" id="inputEmail" class="form-control" placeholder="Nombre de usuario" name="username_v" required autofocus>
	                <input type="password" id="inputPassword" class="form-control" placeholder="Contrasena" name="password_v"required>
	                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Ingresar</button>
	            <?= form_close() ?>
	        </div>

            <a href="#" class="forgot-password">
              Olvido la contrasena?
            </a>
            	<div = "footerinfo">
            		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. 
            		<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>'
            		 . CI_VERSION . '</strong>' : '' ?></p>
            	</div>
        </div><!-- /card-container -->
    </div><!-- /container -->


</body>
</html>