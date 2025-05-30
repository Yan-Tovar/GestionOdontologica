<?php
class Medico {
    private $documento;
    private $correo;
    private $contrasena;
    private $nombre;
    private $apellidos;
public function __construct($doc,$cor,$con,$nom,$ape) {
    $this->documento=$doc;
    $this->correo=$cor;
    $this->contrasena=$con;
    $this->nombre=$nom;
    $this->apellidos=$ape;
}
public function obtenerDocumento(){
    return $this->documento;
}
public function obtenerCorreo(){
    return $this->correo;
}
public function obtenerContrasena(){
    return $this->contrasena;
}
public function obtenerNombre(){
    return $this->nombre;
}
public function obtenerApellidos(){
    return $this->apellidos;
}
}
class Administrador {
    private $documento;
    private $correo;
    private $contrasena;
    private $nombre;
    private $apellidos;
public function __construct($doc,$cor,$con,$nom,$ape) {
    $this->documento=$doc;
    $this->correo=$cor;
    $this->contrasena=$con;
    $this->nombre=$nom;
    $this->apellidos=$ape;
}
public function obtenerDocumento(){
    return $this->documento;
}
public function obtenerCorreo(){
    return $this->correo;
}
public function obtenerContrasena(){
    return $this->contrasena;
}
public function obtenerNombre(){
    return $this->nombre;
}
public function obtenerApellidos(){
    return $this->apellidos;
}
}