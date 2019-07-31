<?php
    class Sesion{
        
        public function iniciarSesion($cedula){
            session_start();
            $_SESSION['cedula']=$cedula;
            $varsesion=$_SESSION['cedula'];
        }
        
  
    }
    
    
?>
