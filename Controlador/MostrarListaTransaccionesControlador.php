<?php
    class MostrarListaTransaccionesControlador{
        
        function __construct() {
            
        }
        
        public function informacionTransacciones(){
             require_once '../Modelo/MostrarListaTransaccionesModelo.php'; 
             $informacionTransacciones= new MostrarListaTransaccionesModelo();
             $resultado=$informacionTransacciones->buscarInformacionTransacciones();
             return $resultado;
        }

    }
    
    
    
    
?>
