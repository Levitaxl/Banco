<?php
    class TransaccionModelo{
        private $cedulaEmisor;
        private $nroCuentaEmisor;
        private $tipoBancoEmisor;
        private $cedulaReceptor;
        private $nroCuentaReceptor;
        private $tipoBancoReceptor;
        private $monto;
        
         function __construct($cedulaEmisor, $nroCuentaEmisor, $tipoBancoEmisor, $cedulaReceptor, $nroCuentaReceptor, $tipoBancoReceptor, $monto) {
            $this->cedulaEmisor = $cedulaEmisor;
            $this->nroCuentaEmisor = $nroCuentaEmisor;
            $this->tipoBancoEmisor = $tipoBancoEmisor;
            $this->cedulaReceptor = $cedulaReceptor;
            $this->nroCuentaReceptor = $nroCuentaReceptor;
            $this->tipoBancoReceptor = $tipoBancoReceptor;
            $this->monto = $monto;
        }
        
        
        function getCedulaReceptor() {
            return $this->cedulaReceptor;
        }

        function setCedulaReceptor($cedulaReceptor) {
            $this->cedulaReceptor = $cedulaReceptor;
        }
        function getCedulaEmisor() {
            return $this->cedulaEmisor;
        }

        function getNroCuentaEmisor() {
            return $this->nroCuentaEmisor;
        }

        function getTipoBancoEmisor() {
            return $this->tipoBancoEmisor;
        }

        function getNroCuentaReceptor() {
            return $this->nroCuentaReceptor;
        }

        function getTipoBancoReceptor() {
            return $this->tipoBancoReceptor;
        }

        function getMonto() {
            return $this->monto;
        }

        function setCedulaEmisor($cedulaEmisor) {
            $this->cedulaEmisor = $cedulaEmisor;
        }

        function setNroCuentaEmisor($nroCuentaEmisor) {
            $this->nroCuentaEmisor = $nroCuentaEmisor;
        }

        function setTipoBancoEmisor($tipoBancoEmisor) {
            $this->tipoBancoEmisor = $tipoBancoEmisor;
        }

        function setNroCuentaReceptor($nroCuentaReceptor) {
            $this->nroCuentaReceptor = $nroCuentaReceptor;
        }

        function setTipoBancoReceptor($tipoBancoReceptor) {
            $this->tipoBancoReceptor = $tipoBancoReceptor;
        }

        function setMonto($monto) {
            $this->monto = $monto;
        }
        
        
                
        public function consultarExistenciaCuentaEmisor($nroCuenta,$tipoBanco){
            require('../Config/DB.php');
           

            $cedula=$_SESSION['cedula'];
            $consulta="SELECT * FROM cuentas WHERE numeroCuentaBancaria='$nroCuenta' and tipoBanco='$tipoBanco' and cedulaAsociada='$cedula'";
            $resultado=mysqli_query($conn,$consulta);
            if(mysqli_num_rows($resultado)==0) return 1;
            else return 0;
        }
        
        
        public function consultarExistenciaCuenta($nroCuenta,$tipoBanco){
            require('../Config/DB.php');
           
            $consulta="SELECT * FROM cuentas WHERE numeroCuentaBancaria='$nroCuenta' and tipoBanco='$tipoBanco'";
            $resultado=mysqli_query($conn,$consulta);
            if(mysqli_num_rows($resultado)==0) return 1;
            else return 0;
        }
        
        public function realizarTransferencia($transaccion){
             require('../Config/DB.php');
              $cedulaEmisor=$transaccion->cedulaEmisor;
              $nroCuentaEmisor=$transaccion->nroCuentaEmisor;
              $tipoBancoEmisor=$transaccion->tipoBancoEmisor;
              $cedulaReceptor=$transaccion->cedulaReceptor;
              $nroCuentaReceptor=$transaccion->nroCuentaReceptor;
              $tipoBancoReceptor=$transaccion->tipoBancoReceptor;
              $monto=$transaccion->monto;
              $consulta="INSERT INTO transacciones(cedulaEmisor,cedulaReceptor,cuentaEmisor,cuentaReceptor,tipoBancoEmisor,tipoBancoReceptor,monto) VALUES('$cedulaEmisor','$cedulaReceptor','$nroCuentaEmisor','$nroCuentaReceptor','$tipoBancoEmisor','$tipoBancoReceptor','$monto')";
               // $consulta="INSERT INTO transacciones(cedulaEmisor,cedulaReceptor,cuentaEmisor,cuentaReceptor,tipoBancoEmisor,tipoBancoReceptor,monto)";
              $resultado=mysqli_query($conn,$consulta);
              $transaccion->actualizarSaldo($transaccion);

        }
    
        public function buscarCedulaDeLaCuenta($nroCuenta,$tipoBanco){
            require('../Config/DB.php');
            $consulta="SELECT * FROM cuentas WHERE numeroCuentaBancaria='$nroCuenta' and tipoBanco='$tipoBanco'";
            $resultado=mysqli_query($conn,$consulta);
            $mostrar=mysqli_fetch_array($resultado);
            return $cedulaAsociada=$mostrar['cedulaAsociada'];
            
            
        }
        
        public function buscarSaldoDeLaCuenta($nroCuenta,$tipoBanco){
            require('../Config/DB.php');
            $consulta="SELECT * FROM cuentas WHERE numeroCuentaBancaria='$nroCuenta' and tipoBanco='$tipoBanco'";
            $resultado=mysqli_query($conn,$consulta);
            $mostrar=mysqli_fetch_array($resultado);
            return $mostrar['saldo'];
             
         }
         
         public function actualizarSaldo($transaccion){
             require('../Config/DB.php');
             $nroCuentaEmisor=$transaccion->nroCuentaEmisor;
             $tipoBancoEmisor=$transaccion->tipoBancoEmisor;
             $nroCuentaReceptor=$transaccion->nroCuentaReceptor;
             $tipoBancoReceptor=$transaccion->tipoBancoReceptor;
             $saldoEmisor=$transaccion->buscarSaldoDeLaCuenta($nroCuentaEmisor,$tipoBancoEmisor);
             $saldoReceptor=$transaccion->buscarSaldoDeLaCuenta($nroCuentaReceptor,$tipoBancoReceptor);   
             $saldoEmisorActualizado=$saldoEmisor-$transaccion->monto;
             $saldoReceptorActualizado=$saldoReceptor+$transaccion->monto;
             $sql = "UPDATE cuentas SET saldo='$saldoEmisorActualizado' WHERE numeroCuentaBancaria='$nroCuentaEmisor' and tipoBanco='$tipoBancoEmisor'";
             mysqli_query($conn, $sql);
             $sq2 = "UPDATE cuentas SET saldo='$saldoReceptorActualizado' WHERE numeroCuentaBancaria='$nroCuentaReceptor' and tipoBanco='$tipoBancoReceptor'";
             mysqli_query($conn, $sq2);
         }
        
        }
        
        
?>
