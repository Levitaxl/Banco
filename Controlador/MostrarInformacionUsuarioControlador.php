<?php
        class MostrarInformacionUsuarioControlador{
            function __construct() {
                
            }
            
            public function InformacionUsuario(){
                require_once '../Modelo/MostrarInformacionUsuarioModelo.php'; 
                $informacionUsuario= new MostrarInformacionUsuarioModelo();
                
                $resultado=$informacionUsuario->buscarInformacionUsuario();
                return $resultado;
            }
            
            public function InformacionCuentasUsuario(){
                require_once '../Modelo/MostrarInformacionUsuarioModelo.php';
                 $informacionCuentasUsuario= new MostrarInformacionUsuarioModelo();
                 $resultado=$informacionCuentasUsuario->buscarInformacionCuentaUsuario();
                 return $resultado;
            } 
        }
?>
    
