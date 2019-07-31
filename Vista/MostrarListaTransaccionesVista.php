<html>
<head>
    <link rel="stylesheet" href="../Public/MostrarListaTransacciones.css">
	<title>Informacion del usuario</title>
</head>
<body>
    <?php include('Header.php');?>
<table class="content-table">
  <thead>
    <tr>
      <th>Cedula Emisor</th>
      <th>Cuenta Emisor</th>
      <th>Tipo Del Banco Del Emisor</th>
      <th>Cedula Receptor</th>
      <th>Cuenta Receptor</th>
      <th>Tipo Del Banco Del Receptor</th>
      <th>Monto</th>
    </tr>
  </thead>
  <tbody>
  	<?php
		require('../Controlador/MostrarListaTransaccionesControlador.php');
                $transacciones= new MostrarListaTransaccionesControlador();
                $listaTransacciones=$transacciones->informacionTransacciones();
                while($mostrar=mysqli_fetch_array($listaTransacciones)){
	?>

	<tr>
		<td><?php echo $mostrar['cedulaEmisor'];?></td>
		<td><?php echo $mostrar['cuentaEmisor'];?></td>
		<td><?php echo $mostrar['tipoBancoEmisor'];?></td>
		<td><?php echo $mostrar['cedulaReceptor'];?></td>
		<td><?php echo $mostrar['cuentaReceptor'];?></td>
                <td><?php echo $mostrar['tipoBancoReceptor'];?></td>
		<td><?php echo $mostrar['monto'];?></td>
	</tr>
        <?php }?>

  </tbody>
</table>
</body>


</html>
