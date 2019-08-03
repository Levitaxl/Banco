<?php
    class CreacionCuentaBancariaControlador{
        function __construct() {
            
        }
        
        
         public function validarDatosCuentaBancaria($cuentaBancaria){
             $permiso=1;
             
             if(!is_numeric($cuentaBancaria->getNumeroCuentaBancaria())){
		echo "<p class='error'>*Ingrese un numero de cuenta valido(maximo 10numeros) Ejemplo: 1111111111</p>";
		$permiso=0;
            }
            if($cuentaBancaria->getNumeroCuentaBancaria()>9999999999){
		echo "<p class='error'>*Su numero de cuenta bancaria debe de tener un maximo de 10 digitos</p>";
		$permiso=0;
            }
            if(!is_numeric($cuentaBancaria->getSaldo())){
                echo "<p class='error'>*Ingrese numero de saldo valido</p>";
		$permiso=0;
            }
            if($cuentaBancaria->getSaldo()>9999){
		echo "<p class='error'>*La cantidad maxima de saldo inicial que puede tener es de 9999</p>";
		$permiso=1;
            }
            if (strcmp ($cuentaBancaria->getTipoBanco() , "Seleccione su tipo de banco") == 0) {
		echo "<p class='error'>*Seleccione su tipo de banco</p>";
		$permiso=0;
            }
            if($cuentaBancaria->buscarExistenciaCuentaBancaria($cuentaBancaria)){
                echo "<p class='error'>Esta cuenta ya se encuentra en el sistema</p>";
                $permiso=0;
            }
            return $permiso;
             
         }
    }
    
     if (isset($_POST['submit'])) {
           require_once '../Modelo/CreacionCuentaBancariaModelo.php';
           session_start();
           $cedulaAsociada=$_SESSION['cedula'];
           $cuentaBancaria= new CreacionCuentaBancariaModelo($cedulaAsociada,$_POST['numeroCuentaBancaria'],$_POST['saldo'],$_POST['tipoBanco']);
           $cuentaBancariaControlador=new CreacionCuentaBancariaControlador();
           if($cuentaBancariaControlador->validarDatosCuentaBancaria($cuentaBancaria)){
               $cuentaBancaria->registrarCuentaBancaria($cuentaBancaria);
               echo "<p class='exito'>Registro de cuenta exitoso</p>";
           }
     }
     if (isset($_POST['cancelar'])) {
         header("Location:http://localhost/PhpProject1/Vista/InicioVista.php");
     }
?>

