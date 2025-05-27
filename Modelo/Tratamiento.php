<?php
class Tratamiento {
    private $numero;
    private $fechaAsignado;
    private $descripcion;
    private $fechaInicial;
    private $fechaFinal;
    private $observaciones;
    private $paciente;
public function __construct($num,$fechaA,$des,$fechaI,$fechaF,$obs,$pac) {
    $this->numero=$num;
    $this->fechaAsignado=$fechaA;
    $this->descripcion=$des;
    $this->fechaInicial=$fechaI;
    $this->fechaFinal=$fechaF;
    $this->observaciones=$obs;
    $this->paciente=$pac;
}
public function obtenerNumero(){
    return $this->numero;
}
public function obtenerFechaA(){
    return $this->fechaAsignado;
}
public function obtenerDescripcion(){
    return $this->descripcion;
}
public function obtenerFechaI(){
    return $this->fechaInicial;
}
public function obtenerFechaF(){
    return $this->fechaFinal;
}
public function obtenerObservaciones(){
    return $this->observaciones;
}
public function obtenerPaciente(){
    return $this->paciente;
}
}