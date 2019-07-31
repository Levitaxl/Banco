<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <link rel="stylesheet" href="../Public/Transaccion.css">
	<title>Realizar Transaccion</title>
</head>
<body>
     <?php include('Header.php');?>
	<div class="container">
		<div class="form__top">
			<h2><span>Realizar Transaccion</span></h2>
		</div>		
		<form class="form__reg" action='<?php $_SERVER['PHP_SELF']; ?>' method="POST">
			
			 <input class="input" type="text" name="nroCuentaEmisor" placeholder="Ingrese su numero de cuenta a realizar la transaccion"autofocus>

			 <select class="input" name="tipoBancoEmisor">
				<option>Seleccione su tipo de banco</option>
				<option>Mercantil</option>
				<option>Provincial</option>
				<option>Banesco</option>
				<option>Venezuela</option>
			</select>


			 <input class="input" type="text" name="nroCuentaReceptor"placeholder="Ingrese el numero de cuenta a la cual se le realizara la transaccion">

			 <select class="input" name="tipoBancoReceptor">
				<option>Seleccione el tipo de banco</option>
				<option>Mercantil</option>
				<option>Provincial</option>
				<option>Banesco</option>
				<option>Venezuela</option>
			</select>

			<input class="input" type="text" name="monto" placeholder="Ingrese el monto">


            <div class="btn__form">
            	<input type="submit" name="submit" value="Submit" class="btn__submit">
            	<input type="submit" class="btn__reset" type="cancelar" value="Cancelar" name="cancelar">	
            </div>
            
                </form>
            <?php include('../Controlador/TransaccionControlador.php');?>
	</div>
</body>
</html>