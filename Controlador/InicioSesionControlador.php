<?php

    class InicioSesionControlador{
        
        function __construct() {       
        }

        public function validarDatosInicioSesion($datosInicioSesion){
            if($datosInicioSesion->registrarUsuario($datosInicioSesion)){
                require_once '../Config/Sesion.php';
                $cedula=$datosInicioSesion->getCedula();
                
                $sesion=new Sesion();
                $sesion->iniciarSesion($cedula);
                
                header('Location: ../Vista/InicioVista.php');
                
            } 
            else echo "<p class='error'>*No se encontro en el sistema este usuario</p>";
        }
        
        
    }
    
    
    
    if (isset($_POST['submit'])) {
         require_once '../Modelo/InicioSesionModelo.php';
         $inicioSesionControlador= new InicioSesionControlador();
         $datosInicioSesion= new InicioSesionModelo($_POST['cedula'],$_POST['contrasena']);
         
         $inicioSesionControlador->validarDatosInicioSesion($datosInicioSesion);
    }
    
    if(isset($_POST['regresar'])){
        header("Location: http://localhost/PhpProject1/index.php");
        echo 'regreso?';
    }
    
    
?>
