<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../Public/IniciarSesion.css">
	<title>Formulario</title>
</head>
<body>
	<div class="container">
		<div class="form__top">
			<h2>Login</h2>
		</div>		
		<form class="form__reg" action='<?php $_SERVER['PHP_SELF']; ?>' method="POST">
                    <input class="input" type="text" name="cedula"placeholder="Cedula"  autofocus>
                    <input class="input" type="password" name="contrasena" placeholder="Contraseña">
                    <input type="submit" name="submit" value="Submit" class="btn__submit">
                   
                </form>
            <?php include('../Controlador/InicioSesionControlador.php');?>
	</div>
</body>
</html>