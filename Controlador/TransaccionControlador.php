<?php
    class TransaccionControlador{
        function __construct() {
            
        }
        
        public function validarDatosTransaccion($transaccion){
            $permiso=1;
            if(!is_numeric($transaccion->getNroCuentaEmisor())){
                echo "<p class='error'>*Ingrese cuenta del emisor correctamente</p>";
		$permiso=0;
            }
            if(!is_numeric($transaccion->getNroCuentaReceptor())){
		echo "<p class='error'>*Ingrese un numero de cuenta valido a realizar la transaccion</p>";
		$permiso=0;
            }
            if(!is_numeric($transaccion->getMonto())){
		echo "<p class='error'>*Ingrese monto valido</p>";
		$permiso=0;
            }
            
            else if($transaccion->getMonto()<0){
                echo "<p class='error'>*El monto de la transaccion debe de ser mayor a 0</p>";
		$permiso=0;
            }
            if (strcmp ($transaccion->getTipoBancoEmisor(), "Seleccione su tipo de banco") == 0) {
		echo "<p class='error'>*Seleccione el tipo de banco del emisor</p>";
		$permiso=0;
            }
            if (strcmp ($transaccion->getTipoBancoReceptor(), "Seleccione el tipo de banco") == 0) {
		echo "<p class='error'>*Seleccione el tipo de banco del banco del receptor/p>";
		$permiso=0;
            }
            if($transaccion->consultarExistenciaCuentaEmisor($transaccion->getNroCuentaEmisor(),$transaccion->getTipoBancoEmisor())){
                echo "<p class='error'>*La cuenta del emisor no se encuentra en el sistema</p>";
		 $permiso=0;
            }
            
            else  if($transaccion->getMonto()>$transaccion->buscarSaldoDeLaCuenta($transaccion->getNroCuentaEmisor(),$transaccion->getTipoBancoEmisor())){
                   echo "<p class='error'>*La cuenta del emisor no posee suficiente saldo para realizar la transaccion</p>";
                    $permiso=0;
                }
            
            if($transaccion->consultarExistenciaCuenta($transaccion->getNroCuentaReceptor(),$transaccion->getTipoBancoReceptor())){
                echo "<p class='error'>*La cuenta del receptor no se encuentra en el sistema</p>";
		$permiso=0;
            }
           
            
            return $permiso;
    }

    }
    
    
     if (isset($_POST['submit'])) {
         
         $tipoBancoEmisor=$_POST['tipoBancoEmisor'];
         $tipoBancoReceptor=$_POST['tipoBancoReceptor'];
         echo "<script> MiFuncionJS('$tipoBancoEmisor','$tipoBancoReceptor');</script>";
         
         
         
         
         require_once '../Modelo/TransaccionModelo.php';
         
         
         $transaccionControlador= new TransaccionControlador();
         session_start();
         $cedulaEmisor=$_SESSION['cedula'];
         $transaccion= new TransaccionModelo($cedulaEmisor, $_POST['nroCuentaEmisor'], $_POST['tipoBancoEmisor'],'', $_POST['nroCuentaReceptor'], $_POST['tipoBancoReceptor'], $_POST['monto']);
        //NOTA->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Este espacio en blanco('') es porque primero tengo que buscar la cedula del receptor                                                                                                    
         if($transaccionControlador->validarDatosTransaccion($transaccion)){
             $nroCuentaReceptor=$transaccion->getNroCuentaReceptor();
             $tipoBancoReceptor=$transaccion->getTipoBancoReceptor();
             $transaccion->setCedulaReceptor($transaccion->buscarCedulaDeLaCuenta($nroCuentaReceptor,$tipoBancoReceptor));
             $transaccion->realizarTransferencia($transaccion);
             echo "<p class='exito'>*Transsacion exitosa</p>";
             
         } 
     }
    
      if (isset($_POST['cancelar'])) {
         header("Location:http://localhost/PhpProject1/Vista/InicioVista.php");
     }
    
    
?>

