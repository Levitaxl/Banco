<html>
<head>
	<meta charset="UTF-8">
        <link rel="stylesheet" href="../Public/CreacionUsuario.css">
	<title>Formulario</title>
</head>
<body>
    <div class="container">
         
        <div class="form__top">
            <h1>Registro De Usuario</h1>
        </div>
        
        <form class="form__reg" action="<?php $_SERVER['PHP_SELF']; ?>"  method="post">
            <input class="input" type="text" name="nombre"     placeholder="Nombre" autofocus>
            <input class="input" type="text" name="apellido"   placeholder="Apellido">
            <input class="input" type="text" name="cedula"     placeholder="Cedula">
            <input class="input" type="text" name= "telefono"  placeholder="Telefono">
            <input class="input" type="text" name= "ciudad"  placeholder="Ciudad">
            <input class="input" type="password" name="contrasena" placeholder="Contrasena">

                
            <input type="submit" class="btn__submit" name="submit" value="Submit">
        </form>
        <?php include('../Controlador/UsuarioControlador.php');?>
    </div>
</body>
</html>