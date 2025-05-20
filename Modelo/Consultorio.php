<?php
class Consultorio {
    private $nombre;
public function __construct($nom) {
    $this->nombre=$nom;
}
public function consultorioNombre(){
    return $this->nombre;
}
}