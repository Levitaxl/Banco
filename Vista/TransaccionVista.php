<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <link rel="stylesheet" href="../Public/Transaccion.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="../Public/Transaccion.js"></script>
	<title>Realizar Transaccion</title>
</head>
<body>
     <?php include('Header.php');?>
	<div class="container">
		<div class="form__top">
			<h2><span>Realizar Transaccion</span></h2>
		</div>		
		<form class="form__reg" action='<?php $_SERVER['PHP_SELF']; ?>' method="POST">
			
			 <input class="input" type="text" name="nroCuentaEmisor" placeholder="Ingrese su numero de cuenta a realizar la transaccion"
                                id="nroCuentaEmisor" value="<?php if(isset($_POST['nroCuentaEmisor'])) echo $_POST['nroCuentaEmisor']; ?>"autofocus>

			 <select class="input" name="tipoBancoEmisor" id="tipoBancoEmisor">
				<option>Seleccione su tipo de banco</option>
				<option>Mercantil</option>
				<option>Provincial</option>
				<option>Banesco</option>
				<option>Venezuela</option>
			</select>


			 <input class="input" type="text" name="nroCuentaReceptor"  id="nroCuentaReceptor"
                                value="<?php if(isset($_POST['nroCuentaReceptor'])) echo $_POST['nroCuentaReceptor']; ?>" placeholder="Ingrese el numero de cuenta a la cual se le realizara la transaccion">

			 <select class="input"  name="tipoBancoReceptor" id="tipoBancoReceptor">
				<option>Seleccione el tipo de banco</option>
				<option>Mercantil</option>
				<option>Provincial</option>
				<option>Banesco</option>
				<option>Venezuela</option>
			</select>

			<input class="input" type="text" name="monto" id="monto" 
                        value="<?php if(isset($_POST['monto'])) echo $_POST['monto']; ?>"placeholder="Ingrese el monto">
            	
                        
                        <input type="submit" name="submit" value="Submit" class="btn__submit">
            
                </form>
            <?php include('../Controlador/TransaccionControlador.php');?>
	</div>
</body>
</html>