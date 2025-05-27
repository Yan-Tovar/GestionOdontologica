<?php
require_once 'Controlador/Controlador.php';
require_once 'Modelo/GestorUsuario.php';
require_once 'Modelo/Usuario.php';
require_once 'Modelo/GestorCita.php';
require_once 'Modelo/Cita.php';
require_once 'Modelo/Paciente.php';
require_once 'Modelo/Conexion.php';
require_once 'Modelo/GestorTratamiento.php';
require_once 'Modelo/Tratamiento.php';



$controlador = new Controlador();

if( isset($_GET["accion"])){
if($_GET["accion"] == "asignar"){
    $controlador->cargarAsignar();
}
elseif($_GET["accion"] == "citapdf"){
    $controlador->verPagina('Vista/html/Citapdf.php');
}
elseif($_GET["accion"] == "login"){
    $controlador->verPagina('Vista/html/login.php');
}
elseif($_GET["accion"] == "inicio"){
    $controlador->verPagina('Vista/html/inicio.php');
}
elseif($_GET["accion"] == "Pinicio"){
    $controlador->verPagina('Vista/html/P_inicio.php');
}
elseif($_GET["accion"] == "Minicio"){
    $controlador->verPagina('Vista/html/M_inicio.php');
}
elseif($_GET["accion"] == "consultar"){
    $controlador->verPagina('Vista/html/consultar.php');
}
elseif($_GET["accion"] == "cancelar"){
    $controlador->verPagina('Vista/html/cancelar.php');
}
elseif($_GET["accion"] == "consultorio"){
    $controlador->verPagina('Vista/html/consultorios.php');
}
elseif($_GET["accion"] == "verCitas"){
    $controlador->verPagina('Vista/html/P_verCitas.php');
}
elseif($_GET["accion"] == "MverCitas"){
    $controlador->verPagina('Vista/html/M_verCitas.php');
}
elseif($_GET["accion"] == "verTratamientos"){
    $controlador->verPagina('Vista/html/P_verTratamientos.php');
}
elseif($_GET["accion"] == "asignarTratamientos"){
    $controlador->verPagina('Vista/html/M_asignarTratamiento.php');
}
elseif($_GET["accion"] == "AasignarTratamientos"){
    $controlador->verPagina('Vista/html/asignarTratamiento.php');
}
elseif($_GET["accion"] == "iniciarSesion"){
    $rol = $_POST["rol"];
    switch ($rol) {
        case "paciente":
            $controlador->loginP($_POST["correo"], $_POST["contrasena"]);
            break;
        case "medico":
            $controlador->loginM($_POST["correo"], $_POST["contrasena"]);
            break;
        case "administrador":
            $controlador->loginA($_POST["correo"], $_POST["contrasena"]);
            break;
        default:
            echo "Debe seleccionar un rol";
    }   
}
elseif($_GET["accion"] == "cerrarSesion"){
    $controlador->cerrarSesion();
}
elseif($_GET["accion"] == "guardarCita"){
    $controlador->agregarCita(
    $_POST["asignarDocumento"],
    $_POST["medico"],
    $_POST["fecha"],
    $_POST["hora"],
    $_POST["consultorio"]);

}
elseif($_GET["accion"] == "guardarTratamiento"){
    $controlador->agregarTratamiento(
$_POST["fechaAsignacion"],
$_POST["descripcion"],
$_POST["fechaInicio"],
$_POST["fechaFin"],
$_POST["observaciones"],
$_POST["asignarDocumento"],);

}
elseif($_GET["accion"] == "consultarCita"){
    $controlador->consultarCitas($_GET["consultarDocumento"]);
}
elseif($_GET["accion"] == "consultarCitaMedico"){
    $controlador->consultarCitasMedico($_GET["consultarDocumento"]);
}
elseif($_GET["accion"] == "consultarTratamientos"){
    $controlador->consultarTratamiento($_GET["consultarDocumento"]);
}
elseif($_GET["accion"] == "consultarTratamientosP"){
    $controlador->consultarTratamientoP($_GET["consultarDocumento"]);
}
elseif($_GET["accion"] == "cancelarCita"){
    $controlador->cancelarCitas($_GET["cancelarDocumento"]);
}
elseif($_GET["accion"] == "consultarPaciente"){
    $controlador->consultarPaciente($_GET["documento"]);
}
elseif($_GET["accion"] == "ingresarPaciente"){
    $controlador->agregarPaciente(
        $_GET["PacDocumento"],
        $_GET["PacNombres"],
        $_GET["PacApellidos"],
        $_GET["PacNacimiento"],
        $_GET["PacSexo"]
        );
}
elseif($_GET["accion"] == "consultarHora"){
    $controlador->consultarHorasDisponibles($_GET["medico"], $_GET["fecha"]);
}
elseif($_GET["accion"] == "verCita"){
    $controlador->verCita($_GET["numero"]);
}
elseif($_GET["accion"] == "confirmarCancelar"){
    $controlador->confirmarCancelarCita($_GET["numero"]);
}
elseif($_GET["accion"] == "listarConsultorio"){
    $controlador->listarConsultorio();
}
elseif($_GET["accion"] == "ingresarConsultorio"){
    $controlador->agregarConsultorio(
        $_GET["ConNombre"],
        $_GET["ConNumero"]
        );
}
elseif($_GET["accion"] == "editarConsultorio"){
    $controlador->editarC(
        $_GET["inputNumero"],
        $_GET["inputNombre"]
        );
}
elseif($_GET["accion"] == "editarTratamiento"){
    $controlador->editarT(
        $_GET["inputNumero"],
        $_GET["inputFechaA"],
        $_GET["inputDescripcion"],
        $_GET["inputFechaI"],
        $_GET["inputFechaF"],
        $_GET["inputObservaciones"],
        $_GET["inputPaciente"]
        );
}
elseif ($_GET["accion"] == "eliminarConsultorio") {
    $id = $_GET["id"];
    $controlador->eliminarC($id);
}
elseif ($_GET["accion"] == "eliminarTratamiento") {
    $id = $_GET["id"];
    $controlador->eliminarT($id);
}
} else {
    $controlador->verPagina('Vista/html/paginaInicio.php');
}
?>