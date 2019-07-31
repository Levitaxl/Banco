<?php

class UsuarioModelo{
    private $nombre;
    private $apellido;
    private $cedula;
    private $telefono;
    private $ciudad;
    private $contrasena;
    
    function __construct($nombre, $apellido, $cedula, $telefono, $ciudad, $contrasena) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        $this->contrasena = $contrasena;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }
    
    public function registrarUsuario($usuario){
	require('../Config/DB.php');
        
        $nombre=$usuario->nombre;
        $apellido=$usuario->apellido;
        $cedula=$usuario->cedula;
        $telefono=$usuario->telefono;
        $ciudad=$usuario->ciudad;
        $contrasena=$usuario->contrasena;
        $query="INSERT INTO personas(nombre,apellido,cedula,telefono,ciudad,contrasena) VALUES('$nombre','$apellido','$cedula','$telefono','$ciudad','$contrasena')";
        if(mysqli_query($conn,$query))return 0;
    }
    
    public function buscarUsuarioPorCedula($usuario){
	require('../Config/DB.php');
        $cedula=$usuario->cedula;
        $consulta="SELECT * FROM personas WHERE cedula='$cedula'";
        $resultadoConsulta=mysqli_query($conn,$consulta);
        if(mysqli_num_rows($resultadoConsulta)>0) return 1;
        else return 0;
    }
   
}



?>