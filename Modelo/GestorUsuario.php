<?php
class GestorUsuario {

public function consultarUsuarioP($correo, $contrasena) {
    $conexion = new Conexion();
    $conn = $conexion->abrir();

    $stmt = $conn->prepare("SELECT * FROM Pacientes WHERE PacCorreo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();
    $conexion->cerrar();

    if ($usuario && password_verify($contrasena, $usuario['PacContrasena'])) {
        return $usuario;
    } else {
        return false;
    }
}
public function consultarUsuarioM($correo, $contrasena) {
    $conexion = new Conexion();
    $conn = $conexion->abrir();

    $stmt = $conn->prepare("SELECT * FROM Medicos WHERE MedCorreo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();
    $conexion->cerrar();

    if ($usuario && password_verify($contrasena, $usuario['MedContrasena'])) {
        return $usuario;
    } else {
        return false;
    }
}
public function consultarUsuarioA($correo, $contrasena) {
    $conexion = new Conexion();
    $conn = $conexion->abrir();

    $stmt = $conn->prepare("SELECT * FROM Administradores WHERE AdmCorreo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();
    $conexion->cerrar();

    if ($usuario && password_verify($contrasena, $usuario['AdmContrasena'])) {
        return $usuario;
    } else {
        return false;
    }
}
public function consultarMedicoPorDocumento($doc){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT MedIdentificacion FROM medicos WHERE MedIdentificacion = '$doc' ";
    $conexion->consulta($sql);
    $result = $conexion->obtenerUnaFila();
    $conexion->cerrar();
    return $result ;
}
public function validarCorreoMedico($cor){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT MedCorreo FROM Medicos WHERE MedCorreo = '$cor'";
    $conexion->consulta($sql);
    $result = $conexion->obtenerUnaFila();
    $conexion->cerrar();
    return $result ;
}
public function agregarMedico(Medico $medico){
    $conexion = new Conexion();
    $conexion->abrir();
    $documento = $medico->obtenerDocumento();
    $correo = $medico->obtenerCorreo();
    $contrasena = password_hash($medico->obtenerContrasena(), PASSWORD_DEFAULT);
    $nombre = $medico->obtenerNombre();
    $apellidos= $medico->obtenerApellidos();
    $sql = "INSERT INTO medicos VALUES ('$documento', '$correo', '$contrasena', '$nombre', '$apellidos' )";
    $conexion->consulta($sql);
    $filasAfectadas = $conexion->obtenerFilasAfectadas();
    $conexion->cerrar();
    return $filasAfectadas;
}
public function consultarAdministradorPorDocumento($doc){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT AdmIdentificacion FROM Administradores Where AdmIdentificacion = '$doc'";
    $conexion->consulta($sql);
    $result = $conexion->obtenerUnaFila();
    $conexion->cerrar();
    return $result ;
}
public function validarCorreoAdministrador($cor){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT AdmCorreo FROM Administradores WHERE AdmCorreo = '$cor'";
    $conexion->consulta($sql);
    $result = $conexion->obtenerUnaFila();
    $conexion->cerrar();
    return $result ;
}
public function agregarAdministrador(Administrador $administrador){
    $conexion = new Conexion();
    $conexion->abrir();
    $documento = $administrador->obtenerDocumento();
    $correo = $administrador->obtenerCorreo();
    $contrasena = password_hash($administrador->obtenerContrasena(), PASSWORD_DEFAULT);
    $nombre = $administrador->obtenerNombre();
    $apellidos= $administrador->obtenerApellidos();
    $sql = "INSERT INTO administradores VALUES ('$documento', '$correo', '$contrasena', '$nombre', '$apellidos' )";
    $conexion->consulta($sql);
    $filasAfectadas = $conexion->obtenerFilasAfectadas();
    $conexion->cerrar();
    return $filasAfectadas;
}
public function listarMedicos(){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM Medicos";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result ;
}
public function listarAdministradores(){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM Administradores";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result ;
}
public function consultarUsuariosTotales(){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT 'Pacientes' as Tipo, COUNT(*) as Cantidad FROM Pacientes
        UNION ALL
        SELECT 'Medicos', COUNT(*) FROM Medicos
        UNION ALL
        SELECT 'Administradores', COUNT(*) FROM Administradores; ";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result ;
}
public function editarMedico($doc, $cor, $nom, $ape){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "UPDATE Medicos SET MedIdentificacion = '$doc', MedCorreo = '$cor'
    , MedNombres = '$nom', MedApellidos = '$ape' "
    . " WHERE MedIdentificacion = $doc ";
    $conexion->consulta($sql);
    $filasAfectadas = $conexion->obtenerFilasAfectadas();
    $conexion->cerrar();
    return $filasAfectadas;
}
public function editarAdministrador($doc, $cor, $nom, $ape){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "UPDATE Administradores SET AdmIdentificacion = '$doc', AdmCorreo = '$cor'
    , AdmNombres = '$nom', AdmApellidos = '$ape' "
    . " WHERE AdmIdentificacion = $doc ";
    $conexion->consulta($sql);
    $filasAfectadas = $conexion->obtenerFilasAfectadas();
    $conexion->cerrar();
    return $filasAfectadas;
}
public function validarMedicoForaneo($doc){
    $conexion = new Conexion();
    $conexion->abrir();

    $sql = "SELECT COUNT(*) AS cantidad FROM citas WHERE CitMedico = $doc;";
    $conexion->consulta($sql);
    $fila = $conexion->obtenerUnaFila();

    $conexion->cerrar();

    return $fila['cantidad'];
}
public function eliminarMedico($doc){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "DELETE FROM Medicos "
    . " WHERE MedIdentificacion = '$doc' ";
    $conexion->consulta($sql);
    $filasAfectadas = $conexion->obtenerFilasAfectadas();
    $conexion->cerrar();
    return $filasAfectadas;
}
public function eliminarAdministrador($doc){
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "DELETE FROM Administradores "
    . " WHERE AdmIdentificacion = '$doc' ";
    $conexion->consulta($sql);
    $filasAfectadas = $conexion->obtenerFilasAfectadas();
    $conexion->cerrar();
    return $filasAfectadas;
}
}
?>