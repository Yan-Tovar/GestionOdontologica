<?php
class Consultorios {
    public function listarConsultorios(){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT ConNumero, ConNombre FROM Consultorios";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
    $conexion->cerrar();
    return $result ;
}
}
?>