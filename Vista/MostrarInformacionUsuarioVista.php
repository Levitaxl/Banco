<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../Public/MostrarInformacionUsuario.css">
	<title>Informacion del usuario</title>
</head>
<body>
    <?php include('Header.php');?>
<table class="content-table">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Cedula</th>
      <th>Telefono</th>
      <th>Ciudad</th>
    </tr>
  </thead>
  <tbody>
  	<?php
		require('../Controlador/MostrarInformacionUsuarioControlador.php');
                $informacionUsuarioControlador= new MostrarInformacionUsuarioControlador();
                $informacionUsuario=$informacionUsuarioControlador->InformacionUsuario();
	?>

	<tr>
		<td><?php echo $informacionUsuario['nombre'];?></td>
		<td><?php echo $informacionUsuario['apellido'];?></td>
		<td><?php echo $informacionUsuario['cedula'];?></td>
		<td><?php echo $informacionUsuario['telefono'];?></td>
		<td><?php echo $informacionUsuario['ciudad'];?></td>
	</tr>

  </tbody>
</table>

<table class="content-table">
  <thead>
    <tr>
      <th>cedulaAsociada</th>
      <th>numeroCuentaBancaria</th>
      <th>saldo</th>
      <th>tipoBanco</th>
    </tr>
  </thead>
  <tbody>
  	<?php
        
               $resultado=$informacionUsuarioControlador->InformacionCuentasUsuario();
                
		while($mostrar=mysqli_fetch_array($resultado)){
	?>
	<tr>
		<td><?php echo $mostrar['cedulaAsociada'];?></td>
		<td><?php echo $mostrar['numeroCuentaBancaria'];?></td>
		<td><?php echo $mostrar['saldo'];?></td>
		<td><?php echo $mostrar['tipoBanco'];?></td>
	</tr>
	<?php }?>
  </tbody>
</table>

</body>


</html>



