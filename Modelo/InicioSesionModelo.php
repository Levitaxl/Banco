<?php
    class InicioSesionModelo{
        private $cedula;
        private $contrasena;
        
         function __construct($cedula, $contrasena) {
            $this->cedula = $cedula;
            $this->contrasena = $contrasena;
        }
        
        function getCedula() {
            return $this->cedula;
        }

        function getContrasena() {
            return $this->contrasena;
        }

        function setCedula($cedula) {
            $this->cedula = $cedula;
        }

        function setContrasena($contrasena) {
            $this->contrasena = $contrasena;
        }
        
        public function registrarUsuario($datosInicioSesion){
            require('../Config/DB.php');
            $cedula=$datosInicioSesion->cedula;
            $contrasena=$datosInicioSesion->contrasena;
            $consulta="SELECT * FROM personas WHERE cedula='$cedula' and contrasena='$contrasena'";
            $resultadoConsulta=mysqli_query($conn,$consulta);
            if(mysqli_num_rows($resultadoConsulta)>0)return 1;
            else return 0;         
        }


    }
?>
