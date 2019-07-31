<html>
<head>
	<meta charset="UTF-8">
        <link rel="stylesheet" href="../Public/ModificarInformacionUsuario.css">
	<title>Formulario</title>
</head>
<body>
        <?php include('Header.php');
        require_once '../Controlador/ModificarInformacionUsuarioControlador.php';
        $informacionUsuario=new ModificarInformacionUsuarioControlador();
        $mostrarInformacionUsuario=$informacionUsuario->mostrarInformacionUsuario();
        ?>
    
    
    <div class="container">
        <div class="form__top">
            <h2><span>Modificar su informacion</span></h2>
        </div>
        
        <form class="form__reg" action="<?php $_SERVER['PHP_SELF']; ?>"  method="post">
            <?php require('../Config/DB.php');?>
            <input class="input" type="text" name="nombre" value='<?php echo $mostrarInformacionUsuario['nombre'];?>'  autofocus>
            <input class="input" type="text" name="apellido"value='<?php echo $mostrarInformacionUsuario['apellido'];?>' >
            <input class="input" type="text" name= "telefono"value='<?php echo $mostrarInformacionUsuario['telefono'];?>' >
            <input class="input" type="text" name="ciudad" value='<?php echo $mostrarInformacionUsuario['ciudad'];?>'>
                
            <div class="btn__form">
                <input type="submit" class="btn__submit" name="submit" value="Submit">
                <input type="submit" class="btn__reset" type="cancelar" value="Cancelar" name="cancelar">
            </div>
        </form>
        
        <?php
        
          if (isset($_POST['submit'])) {
            if($informacionUsuario->validarDatos($_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['ciudad'])){
                $informacionUsuario->actualizarInformacionUsuario($_POST['nombre'],$_POST['apellido'], $_POST['telefono'], $_POST['ciudad']);
                header("Location: http://localhost/PhpProject1/Vista/InicioVista.php");
                echo 'TODO FINO PAPAH';
            }            
                        
            }
        
        
        
        
        ?>
    </div>
</body>
</html>