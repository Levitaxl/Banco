<?php
    class CreacionCuentaBancariaModelo{
        private $cedulaAsociada;
        private $numeroCuentaBancaria;
        private $saldo;
        private $tipoBanco;
        
        function __construct($cedulaAsociada, $numeroCuentaBancaria, $saldo, $tipoBanco) {
            $this->cedulaAsociada = $cedulaAsociada;
            $this->numeroCuentaBancaria = $numeroCuentaBancaria;
            $this->saldo = $saldo;
            $this->tipoBanco = $tipoBanco;
        }
        
        function getCedulaAsociada() {
            return $this->cedulaAsociada;
        }

        function getNumeroCuentaBancaria() {
            return $this->numeroCuentaBancaria;
        }

        function getSaldo() {
            return $this->saldo;
        }

        function getTipoBanco() {
            return $this->tipoBanco;
        }

        function setCedulaAsociada($cedulaAsociada) {
            $this->cedulaAsociada = $cedulaAsociada;
        }

        function setNumeroCuentaBancaria($numeroCuentaBancaria) {
            $this->numeroCuentaBancaria = $numeroCuentaBancaria;
        }

        function setSaldo($saldo) {
            $this->saldo = $saldo;
        }

        function setTipoBanco($tipoBanco) {
            $this->tipoBanco = $tipoBanco;
        }
        
        public function buscarExistenciaCuentaBancaria($cuentaBancaria){
            //session_start();
            require('../Config/DB.php');
            $cedulaAsociada=$_SESSION['cedula'];
            $numeroCuentaBancaria=$cuentaBancaria->numeroCuentaBancaria;
            $tipoBanco=$cuentaBancaria->tipoBanco;
            $consulta="SELECT * FROM cuentas WHERE cedulaAsociada='$cedulaAsociada' and numeroCuentaBancaria='$numeroCuentaBancaria' and tipoBanco='$tipoBanco'";
            $resultado=mysqli_query($conn,$consulta);
            if(mysqli_num_rows($resultado)>0) return 1;
            else return 0;
        }
        
        public function registrarCuentaBancaria($cuentaBancaria){
             require('../Config/DB.php');
             $cedulaAsociada=$cuentaBancaria->cedulaAsociada;
             $numeroCuentaBancaria=$cuentaBancaria->numeroCuentaBancaria;
             $tipoBanco=$cuentaBancaria->tipoBanco;
             $saldo=$cuentaBancaria->saldo;
             $consulta="INSERT INTO cuentas(cedulaAsociada,numeroCuentaBancaria,saldo,tipoBanco) VALUES('$cedulaAsociada','$numeroCuentaBancaria','$saldo','$tipoBanco')";
             if(mysqli_query($conn,$consulta)){
				echo "<p class='error'>Registro exitoso</p>";
		}
        }
     
    }
        
        
?>

