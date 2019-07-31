<?php 
	class UsuarioControlador{	
		public function __construct(){}

		public function registrar($usuario){
                    $usuario->registrarUsuario($usuario);
		}
                
                public function validarDatos($usuario){
                    $permiso=1;
                    
                    //require_once '../Vista/CreacionUsuarioVista.php';
                    
                    if(!is_numeric($usuario->getCedula())){
                        echo "<p class='error'>*Ingrese una cedula valida</p>";
			$permiso=0;
                    }
                    if(!is_numeric($usuario->getTelefono())){
			echo "<p class='error'>*Ingrese un telefono valido</p>";
			$permiso=0;
                    }
                    if(strlen($usuario->getTelefono())>11){
              		echo "<p class='error'>*El campo telefono contiene muchos numeros maximo 11)</p>";
			$permiso=0;
                    }
                    if(strlen($usuario->getNombre())>30){
			echo "<p class='error'>El nombre es muy largo(Maximo 30 caracteres)</p>";
			$permiso=0;
                    }
                    if(strlen($usuario->getApellido())>30){
			echo "<p class='error'>El apellido es muy largo(Maximo 30 caracteres)</p>";
			$permiso=0;
                    }
                    if(strlen($usuario->getCiudad())>30){
			echo "<p class='error'>La nombre de la ciudad es muy larga(Maximo 30 caracteres)</p>";
			$permiso=0;
                    }
                    
                    if($usuario->buscarUsuarioPorCedula($usuario)){
                        echo "<p class='error'>El usuario ya se encuentra en el sistema</p>";
			$permiso=0;
                    }
                    
                
                    return $permiso;
                }
	}

        if (isset($_POST['submit'])) {
            require_once '../Modelo/UsuarioModelo.php';
            $usuarioControlador=new UsuarioControlador();
            $usuario = new UsuarioModelo($_POST['nombre'],$_POST['apellido'],$_POST['cedula'],$_POST['telefono'],$_POST['ciudad'],$_POST['contrasena']);
            
            
            if($usuarioControlador->validarDatos($usuario)){  
                 $usuarioControlador->registrar($usuario); 
                 echo "<p class='error'>Registro exitoso</p>";       
            }
       
}

if (isset($_POST['regresar'])) {
         header("Location: http://localhost/PhpProject1/index.php");
         
     }      
        
            

        
        
        
        
        
?>