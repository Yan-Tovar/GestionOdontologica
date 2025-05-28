<?php
session_start();
class Controlador {
public function verPagina($ruta){
    require_once $ruta;
}

public function loginP($correo, $contrasena){
    $gestorUsuario = new GestorUsuario();
    $result = $gestorUsuario->consultarUsuarioP($correo, $contrasena);
    if($result->num_rows > 0){
        $resultdp= $gestorUsuario->datosUsuarioP($correo);
        $row = $result->fetch_assoc();
        $_SESSION["us_cor"]=$row['PacCorreo'];
        $_SESSION["us_con"]=$row['PacContrasena'];
        $_SESSION["us_id"]=$row['PacIdentificacion'];
        $_SESSION["us_nom"]=$row['PacNombres'];
        $_SESSION["us_ape"]=$row['PacApellidos'];
        $_SESSION["us_fec"]=$row['PacFechaNacimiento'];
        $_SESSION["us_sex"]=$row['PacSexo'];
        require_once 'Vista/html/P_inicio.php';
    }else{
        require_once 'Vista/html/errorUsuario.php';
    }
}
public function loginM($correo, $contrasena){
    $gestorUsuario = new GestorUsuario();
    $result = $gestorUsuario->consultarUsuarioM($correo, $contrasena);
    if($result->num_rows > 0){
        $resultdp= $gestorUsuario->datosUsuarioM($correo);
        $row = $result->fetch_assoc();
        $_SESSION["us_id"]=$row['MedIdentificacion'];
        $_SESSION["us_cor"]=$row['MedCorreo'];
        $_SESSION["us_con"]=$row['MedContrasena'];
        $_SESSION["us_nom"]=$row['MedNombres'];
        $_SESSION["us_ape"]=$row['MedApellidos'];
        require_once 'Vista/html/M_inicio.php';
    }else{
        require_once 'Vista/html/errorUsuario.php';
    }
}
public function loginA($correo, $contrasena){
    $gestorUsuario = new GestorUsuario();
    $result = $gestorUsuario->consultarUsuarioA($correo, $contrasena);
    if($result->num_rows > 0){
        $resultdp= $gestorUsuario->datosUsuarioA($correo);
        $row = $result->fetch_assoc();
        $_SESSION["us_id"]=$row['AdmIdentificacion'];
        $_SESSION["us_cor"]=$row['AdmCorreo'];
        $_SESSION["us_con"]=$row['AdmContrasena'];
        $_SESSION["us_nom"]=$row['AdmNombres'];
        $_SESSION["us_ape"]=$row['AdmApellidos'];
        require_once 'Vista/html/inicio.php';
    }else{
        require_once 'Vista/html/errorUsuario.php';
    }
}
public function cerrarSesion(){
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit;
}
public function agregarCita($doc,$med,$fec,$hor,$con){
    $cita = new Cita(null, $fec, $hor, $doc, $med, $con, "Solicitada",
    "Ninguna");
    $gestorCita = new GestorCita();
    $id = $gestorCita->agregarCita($cita);
    $result = $gestorCita->consultarCitaPorId($id);
    require_once 'Vista/html/confirmarCita.php';
}
public function agregarTratamiento($fechaA,$des,$fechaI,$fechaF, $obs,$doc){
    $tratamiento = new Tratamiento(null, $fechaA, $des, $fechaI, $fechaF, $obs, $doc);
    $gestorTratamiento = new GestorTratamiento();
    $id = $gestorTratamiento->agregarTratamiento($tratamiento);
    $result = $gestorTratamiento->consultarTratamientoPorId($id);
    require_once 'Vista/html/confirmarTratamiento.php';
}
public function consultarCitas($doc){
    $gestorCita = new GestorCita();
    $result = $gestorCita->consultarCitasPorDocumento($doc);
    require_once 'Vista/html/consultarCitas.php';
}
public function consultarCitasMedico($doc){
    $gestorCita = new GestorCita();
    $result = $gestorCita->consultarCitasMPorDocumento($doc);
    require_once 'Vista/html/consultarCitas.php';
}
public function consultarTratamiento($doc){
    $gestorCita = new GestorCita();
    $result = $gestorCita->consultarTratamientosPorDocumento($doc);
    require_once 'Vista/html/consultarTratamientos.php';
}
public function consultarTratamientoP($doc){
    $gestorCita = new GestorCita();
    $result = $gestorCita->consultarTratamientosPorDocumento($doc);
    require_once 'Vista/html/A_consultarTratamientos.php';
}
public function cancelarCitas($doc){
    $gestorCita = new GestorCita();
    $result = $gestorCita->consultarCitasPorDocumento($doc);
    require_once 'Vista/html/cancelarCitas.php';
}
public function descargarCitas(){
    $gestorCita = new GestorCita();
    $result = $gestorCita->descargarCitas();
    require_once 'Vista/Excel/descargarExcel.php';
}
public function consultarPaciente($doc){
    $gestorCita = new GestorCita();
    $result = $gestorCita->consultarPaciente($doc);
    require_once 'Vista/html/consultarPaciente.php';
}
public function agregarPaciente($cor, $con, $doc,$nom,$ape,$fec,$sex){
    $paciente = new Paciente($cor, $con,$doc, $nom, $ape, $fec, $sex);
    $gestorCita = new GestorCita();
    $registros = $gestorCita->validarCorreo($paciente);
    if($registros > 0){
        echo "<script>alert('Debes cambiar el correo porque este ya esta con la contraseña 1234paciente');</script>";
    } else {
        $registros = $gestorCita->agregarPaciente($paciente);
        if($registros > 0){
            echo "Se insertó el paciente con exito";
        } else {
            echo "Error al grabar el paciente";
        }
    }
}
public function cargarAsignar(){
    $gestorCita = new GestorCita();
    $result = $gestorCita->consultarMedicos();
    $result2 = $gestorCita->consultarConsultorios();
    require_once 'Vista/html/asignar.php';
}
public function consultarHorasDisponibles($medico,$fecha){
    $gestorCita = new GestorCita();
    $result = $gestorCita->consultarHorasDisponibles($medico,
    $fecha);
    require_once 'Vista/html/consultarHoras.php';
}
public function verCita($cita){
    $gestorCita = new GestorCita();
    $result = $gestorCita->consultarCitaPorId($cita);
    require_once 'Vista/html/confirmarCita.php';
}
public function confirmarCancelarCita($cita){
    $gestorCita = new GestorCita();
    $registros = $gestorCita->cancelarCita($cita);
    if($registros > 0){
        echo "La cita se ha cancelado con éxito";
    } else {
        echo "Hubo un error al cancelar la cita";
    }
}
public function listarConsultorio(){
    $GestorCita = new GestorCita();
    $result = $GestorCita->listarConsultorios();
    require_once 'Vista/html/listarConsultorios.php';
}
public function agregarConsultorio($num,$nom){
    // La clase 'Consultorio' está dentro de Modelo/Paciente.php
    $paciente = new Consultorio($num,$nom); 
    $gestorCita = new GestorCita();
    $registros = $gestorCita->agregarConsultorio($paciente);
    if($registros > 0){
        echo "Se insertó el consultorio con exito";
    } else {
        echo "Error al grabar el consultorio";
    }
}
public function editarC($num,$nom){
    $gestorCita = new GestorCita();
    $registros = $gestorCita->editarConsultorio($num,$nom);
    if($registros > 0){
        echo "Se editó el consultorio con exito";
    } else {
        echo "Error al editar el consultorio";
    }
}
public function editarT($num,$fecA, $des, $fecI, $fecF, $obs, $pac){
    $gestorCita = new GestorCita();
    $registros = $gestorCita->editarTratamiento($num,$fecA, $des, $fecI, $fecF, $obs, $pac);
    if($registros > 0){
        echo "Se editó el tratamiento con exito";
    } else {
        echo "Error al editar el tratamiento";
    }
}
public function eliminarC($num){
    $gestorCita = new GestorCita();
    $registros = $gestorCita->validarConsultorioForaneo($num);
    if($registros>=1){   
        echo"No se puede eliminar el consultorio porque tiene citas asociadas";
    }else{
        $registros = $gestorCita->eliminarConsultorio($num);
        if($registros > 0){
            echo "Se eliminó el consultorio con exito";
        } else {
            echo "Error al eliminar el consultorio";
        }
    }
}
public function eliminarT($num){
    $gestorCita = new GestorCita();
    $registros = $gestorCita->eliminarTratamiento($num);
    if($registros > 0){
        echo "Se eliminó el tratamiento con exito";
    } else {
        echo "Error al eliminar el tratamiento";
    }
}
}