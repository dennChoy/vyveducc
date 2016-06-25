<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>vyveducc</title>
    <link rel="stylesheet" href="<?= base_url() ?>public/estilo/login/normalize.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/estilo/login/style.css">
    
    <script src="js/prefixfree.min.js"></script>

    
  </head>

  <body>

    <div class="login">
    	<h1>Login</h1>
      <div id="mensaje" align="center">
        <font size="5" color="red" align="center" ><?php echo $Mensaje; ?></font>
      </div>
      <form class="form-horizontal" action="<?= $accion ?>" method="POST" id="formClienteCrear">
        	  <input type="text" name="username_v" placeholder="Usuario" required="required" />
            <input type="password" name="password_v" placeholder="Contraseña" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Ingresar.</button>
      </form>
    </div>
    
        <script src="js/index.js"></script>    
  </body>
</html>
