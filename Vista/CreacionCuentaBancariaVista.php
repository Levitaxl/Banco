<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <link rel="stylesheet" href="../Public/CreacionCuentaBancaria.css">
	<title>Formulario</title>
</head>
<body>
        <?php include('Header.php');?>
	<div class="container">
		<div class="form__top">
			<h2><span>Registro de Cuenta</span></h2>
		</div>		
		<form class="form__reg" action='<?php $_SERVER['PHP_SELF']; ?>' method="POST">
			<input class="input" type="text" name="numeroCuentaBancaria" placeholder="Ingrese numero de cuenta bancaria" autofocus>

			<input class="input" type="text" name="saldo" placeholder="Ingrese su saldo inicial"autofocus>

			<select class="input" name="tipoBanco">
				<option>Seleccione su tipo de banco</option>
				<option>Mercantil</option>
				<option>Provincial</option>
				<option>Banesco</option>
				<option>Venezuela</option>
			</select>

            	<input type="submit" name="submit" value="Submit" class="btn__submit">
		</form>
            <?php include('../Controlador/CreacionCuentaBancariaControlador.php');?>
	</div>
</body>
</html>
