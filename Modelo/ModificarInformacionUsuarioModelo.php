<?php
class ModificarInformacionUsuarioModelo {
    function __construct() {
        
    }
    
    public function buscaInformacionUsuario() {
        require('../Config/DB.php');
        session_start();

        $cedula=$_SESSION['cedula'];
        $query="SELECT * FROM personas WHERE cedula='$cedula'";
        $resultado=mysqli_query($conn,$query);
        $mostrar=mysqli_fetch_array($resultado);
        return $mostrar;
    }
    
    public function actualizarInformacionUsuario($nombre,$apellido,$telefono,$ciudad){
        require('../Config/DB.php');
 
        $cedula=$_SESSION['cedula'];
        
        $sql = "UPDATE personas SET nombre='$nombre',apellido='$apellido',telefono='$telefono',ciudad='$ciudad' WHERE cedula='$cedula'";
        mysqli_query($conn, $sql);
    }

}
