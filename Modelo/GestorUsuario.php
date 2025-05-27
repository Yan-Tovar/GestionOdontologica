<?php
class GestorUsuario {
public function consultarUsuarioP($correo, $contrasena){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT * FROM Pacientes WHERE PacCorreo = '$correo'
    AND PacContrasena = '$contrasena'";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
    $conexion->cerrar();
    return $result ;
}
public function consultarUsuarioM($correo, $contrasena){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT * FROM Medicos WHERE MedCorreo = '$correo'
    AND MedContrasena = '$contrasena'";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
    $conexion->cerrar();
    return $result ;
}
public function consultarUsuarioA($correo, $contrasena){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT * FROM Administradores WHERE AdmCorreo = '$correo' 
    AND AdmContrasena = '$contrasena'";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
    $conexion->cerrar();
    return $result ;
}
public function datosUsuarioP($correo){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT * FROM Pacientes WHERE PacCorreo = '$correo' ";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
    $conexion->cerrar();
    return $result ;
}
public function datosUsuarioM($correo){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT * FROM Medicos WHERE MedCorreo = '$correo' ";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
    $conexion->cerrar();
    return $result ;
}
public function datosUsuarioA($correo){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT * FROM administradores WHERE AdmCorreo = '$correo' ";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
    $conexion->cerrar();
    return $result ;
}
}
?>