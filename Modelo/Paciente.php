<?php
class Paciente {
    private $correo;
    private $contrasena;
    private $identificacion;
    private $nombres;
    private $apellidos;
    private $fechaNacimiento;
    private $sexo;
public function __construct($cor,$con,$ide,$nom,$ape,$fNa,$sex) {
    $this->correo=$cor;
    $this->contrasena= $con;
    $this->identificacion=$ide;
    $this->nombres=$nom;
    $this->apellidos=$ape;
    $this->fechaNacimiento=$fNa;
    $this->sexo=$sex;
}
public function obtenerCorreo(){
    return $this->correo;
}
public function obtenerContrasena(){
    return $this->contrasena;
}
public function obtenerIdentificacion(){
    return $this->identificacion;
}
public function obtenerNombres(){
    return $this->nombres;
}
public function obtenerApellidos(){
    return $this->apellidos;
}
public function obtenerFechaNacimiento(){
    return $this->fechaNacimiento;
}
public function obtenerSexo(){
    return $this->sexo;
}
}
class Consultorio {
    private $nombre;
    private $numero;
public function __construct($nom,$num) {
    $this->nombre=$nom;
    $this->numero=$num;
}
public function consultorioNombre(){
    return $this->nombre;
}
public function consultorioNumero(){
    return $this->numero;
}
}