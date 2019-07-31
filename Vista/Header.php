<?php 
    session_start();
    error_reporting(0);
    if($_SESSION['cedula']==null || $_SESSION['cedula']==''){
        
        echo 'usted no tiene autorizacion';
        die();
    }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
        <link rel="stylesheet" type="text/css" href="../Public/Header.css">
</head>
<body>
	<header>
		<input type="checkbox" id="btn-menu">
		<label for="btn-menu">
		</label>		
		<nav class="menu">
			<ul>
                            <li><a href="http://localhost/PhpProject1/Vista/InicioVista.php">Inicio</a></li>
                            <li><a href="http://localhost/PhpProject1/Vista/CreacionCuentaBancariaVista.php">Crear cuenta bancaria</a></li>
                            <li><a href="http://localhost/PhpProject1/Vista/TransaccionVista.php">Realizar transaccion</a></li>
                            <li><a href="http://localhost/PhpProject1/Vista/MostrarListaTransaccionesVista.php">Mostrar lista de transacciones</a></li>
                            <li><a href="http://localhost/PhpProject1/Vista/MostrarInformacionUsuarioVista.php">Mostrar su informacion</a></li>
                            <li><a href="http://localhost/PhpProject1/Vista/ModificarInformacionUsuarioVista.php">Editar su informacion</a></li>
                            <li><a href="../Config/logOut.php">Cerrar Sesion</a></li>
			</ul>
		</nav>

	</header>
</body>
</html>

