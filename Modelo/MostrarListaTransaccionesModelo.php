<?php
class MostrarListaTransaccionesModelo {
    
    function __construct() {   
    }
    
     public function buscarInformacionTransacciones(){
            require('../Config/DB.php');
            session_start();

            $cedula=$_SESSION['cedula'];
            $query="SELECT * FROM transacciones WHERE cedulaEmisor='$cedula' or cedulaReceptor='$cedula'";
            $resultado=mysqli_query($conn,$query);

            //$mostrar=mysqli_fetch_array($resultado);
            return $resultado;
            
        }
}

?>
