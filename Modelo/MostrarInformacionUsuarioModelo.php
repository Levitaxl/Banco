<?php
    class MostrarInformacionUsuarioModelo{
        
        function __construct() {  
        }
        
        public function buscarInformacionUsuario(){
            require('../Config/DB.php');
            session_start();

            $cedula=$_SESSION['cedula'];
            $query="SELECT * FROM personas WHERE cedula='$cedula'";
            $resultado=mysqli_query($conn,$query);

            $mostrar=mysqli_fetch_array($resultado);
            return $mostrar;
            
        }

        
        public function buscarInformacionCuentaUsuario(){
           
            require('../Config/DB.php');          
            $cedula=$_SESSION['cedula'];
            $query="SELECT * FROM cuentas WHERE cedulaAsociada='$cedula'";
            $resultado=mysqli_query($conn,$query);
            return $resultado;
        }
    }
?>
