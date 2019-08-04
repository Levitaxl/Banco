<?php

    class ModificarInformacionUsuarioControlador{
        function __construct() {
            
        }
        
        public function mostrarInformacionUsuario(){
                require_once '../Modelo/ModificarInformacionUsuarioModelo.php'; 
                $informacionUsuario= new ModificarInformacionUsuarioModelo();
                
                $resultado=$informacionUsuario->buscaInformacionUsuario();
                return $resultado;
        }
        

        public function validarDatos($nombre,$apellido,$telefono,$ciudad){
            
                    $permiso=1;
         
                    if(!is_numeric($telefono)){
			echo "<p class='error'>*Ingrese un telefono valido</p>";
			$permiso=0;
                    }
                    else if(strlen($telefono)>11){
              		echo "<p class='error'>*El campo telefono contiene muchos numeros maximo 11)</p>";
			$permiso=0;
                    }
                    if(strlen($nombre)>30){
			echo "<p class='error'>El nombre es muy largo(Maximo 30 caracteres)</p>";
			$permiso=0;
                    }
                    if(strlen($apellido)>30){
			echo "<p class='error'>El apellido es muy largo(Maximo 30 caracteres)</p>";
			$permiso=0;
                    }
                    if(strlen($ciudad)>30){
			echo "<p class='error'>La nombre de la ciudad es muy larga(Maximo 30 caracteres)</p>";
			$permiso=0;
                    }
                    
                    
                
                    return $permiso;
                }
       
        public function actualizarInformacionUsuario($nombre,$apellido,$telefono,$ciudad){
           require_once '../Modelo/ModificarInformacionUsuarioModelo.php'; 
           $informacionUsuario= new ModificarInformacionUsuarioModelo();
           $informacionUsuario->actualizarInformacionUsuario($nombre, $apellido, $telefono, $ciudad);
           
       }
       
    }
    
      if (isset($_POST['cancelar'])) {
         header("Location:http://localhost/PhpProject1/Vista/InicioVista.php");
     }
      
    


?>