<html>
<head>
	<meta charset="UTF-8">
        <link rel="stylesheet" href="../Public/ModificarInformacionUsuario.css">
         <script src=" https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="../Public/ModificarInformacionUsuario.js" async></script>
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
            <input class="input" type="text" name="nombre" id="nombre" value='<?php   echo $mostrarInformacionUsuario['nombre'];?>'  autofocus>
            <input class="input" type="text" name="apellido"id="apellido"value='<?php  echo $mostrarInformacionUsuario['apellido'];?>' >
            <input class="input" type="text" name= "telefono"id="telefono"value='<?php echo $mostrarInformacionUsuario['telefono'];?>' >
            <input class="input" type="text" name="ciudad" id="ciudad" value='<?php   echo $mostrarInformacionUsuario['ciudad'];?>'>
                
            <input type="submit" class="btn__submit" id="btn__submit" name="submit" value="Submit">
               
        </form>
        
        <?php 
       
         if (isset($_POST['submit'])) {
            if($informacionUsuario->validarDatos($_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['ciudad'])){
                $informacionUsuario->actualizarInformacionUsuario($_POST['nombre'],$_POST['apellido'], $_POST['telefono'], $_POST['ciudad']);
                $mostrarInformacionUsuario=$informacionUsuario->mostrarInformacionUsuario();
                $nombre=$mostrarInformacionUsuario['nombre'];
                $apellido=$mostrarInformacionUsuario['apellido'];
                $telefono=$mostrarInformacionUsuario['telefono'];
                $ciudad=$mostrarInformacionUsuario['ciudad'];
                echo "<p class='exito'>Datos modificados exitosamente</p>";
                echo "<script> MiFuncionJS('$nombre','$apellido','$telefono','$ciudad');</script>";
            }            
                        
            }
        
        ?>
            
    </div>
</body>


</html>

