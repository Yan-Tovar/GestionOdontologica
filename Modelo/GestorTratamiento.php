<?php
class GestorTratamiento {
    
public function agregarTratamiento(Tratamiento $tratamiento){
    $conexion = new Conexion();
    $conexion->abrir();
    $fechaA = $tratamiento->obtenerFechaA();
    $des = $tratamiento->obtenerDescripcion();
    $fechaI = $tratamiento->obtenerFechaI();
    $fechaF = $tratamiento->obtenerFechaF();
    $obs = $tratamiento->obtenerObservaciones();
    $pac = $tratamiento->obtenerPaciente();
    $sql = "INSERT INTO tratamientos VALUES ( null,'$fechaA','$des',
    '$fechaI','$fechaF','$obs','$pac')";
    $conexion->consulta($sql);
    $tratamientoId = $conexion->obtenerCitaId();
    $conexion->cerrar();
    return $tratamientoId ;
}
public function consultarTratamientoPorId($id){
    $conexion = new Conexion();
    $conexion->abrir();
    if (!isset($id) || empty($id)) {
    echo "ID no válido";
    exit;
}
    $sql = "SELECT pacientes.* , tratamientos.* "
     . "FROM pacientes, tratamientos "
     . "WHERE tratamientos.TraPaciente = pacientes.PacIdentificacion "
     . "AND tratamientos.TraNumero = '$id'";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
    $conexion->cerrar();
    return $result ;
}
}
?>