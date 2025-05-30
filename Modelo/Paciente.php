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
    private $numero;
    private $nombre;
    
public function __construct($num,$nom) {
    $this->numero=$num;
    $this->nombre=$nom;
    
}
public function consultorioNumero(){
    return $this->numero;
}
public function consultorioNombre(){
    return $this->nombre;
}
}