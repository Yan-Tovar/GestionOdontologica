<?php
session_start();
class Controlador {
public function verPagina($ruta){
    require_once $ruta;
}

public function loginP($correo, $contrasena) {
    $gestorUsuario = new GestorUsuario();
    $usuario = $gestorUsuario->consultarUsuarioP($correo, $contrasena);

    if ($usuario) {
        $_SESSION["us_cor"] = $usuario['PacCorreo'];
        $_SESSION["us_id"]  = $usuario['PacIdentificacion'];
        $_SESSION["us_nom"] = $usuario['PacNombres'];
        $_SESSION["us_ape"] = $usuario['PacApellidos'];
        $_SESSION["us_fec"] = $usuario['PacFechaNacimiento'];
        $_SESSION["us_sex"] = $usuario['PacSexo'];
        $_SESSION["rol"] = 'Paciente';
        require_once 'Vista/html/P_inicio.php';
    } else {
        echo "<script>alert('¡¡Upps!! El usuario no está registrado');</script>";
        require_once 'Vista/html/paginaInicio.php';
    }
}
public function loginM($correo, $contrasena) {
    $gestorUsuario = new GestorUsuario();
    $usuario = $gestorUsuario->consultarUsuarioM($correo, $contrasena);

    if ($usuario) {
        $_SESSION["us_id"]  = $usuario['MedIdentificacion'];
        $_SESSION["us_cor"] = $usuario['MedCorreo'];
        $_SESSION["us_nom"] = $usuario['MedNombres'];
        $_SESSION["us_ape"] = $usuario['MedApellidos'];
        $_SESSION["rol"] = 'Medico';
        require_once 'Vista/html/M_inicio.php';
    } else {
        echo "<script>alert('¡¡Upps!! El usuario no está registrado');</script>";
        require_once 'Vista/html/paginaInicio.php';
    }
}
public function loginA($correo, $contrasena) {
    $gestorUsuario = new GestorUsuario();
    $usuario = $gestorUsuario->consultarUsuarioA($correo, $contrasena);

    if ($usuario) {
        $_SESSION["us_id"]  = $usuario['AdmIdentificacion'];
        $_SESSION["us_cor"] = $usuario['AdmCorreo'];
        $_SESSION["us_nom"] = $usuario['AdmNombres'];
        $_SESSION["us_ape"] = $usuario['AdmApellidos'];
        $_SESSION["rol"] = "Administrador";
        require_once 'Vista/html/inicio.php';
    } else {
        echo "<script>alert('¡¡Upps!! El usuario no está registrado');</script>";
        require_once 'Vista/html/paginaInicio.php';
    }
}
public function cerrarSesion(){
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit;
}
public function agregarPaciente($cor, $con, $doc,$nom,$ape,$fec,$sex){
    $paciente = new Paciente($cor, $con,$doc, $nom, $ape, $fec, $sex);
    $gestorCita = new GestorCita();
    $registros = $gestorCita->consultarPacientePorId($doc);
    if($registros > 0){
        echo "<script>alert('¡¡Sin Registrar!! El paciente con este documento ya existe');</script>";
    } else {
        $registros = $gestorCita->validarCorreo($cor);
        if($registros > 0){
            echo "<script>alert('¡¡Sin Registrar!! Debes cambiar el correo');</script>";
        } else {
            $registros = $gestorCita->agregarPaciente($paciente);
            if($registros > 0){
                echo "
                <div id='noti' style='background-color: #33CCFF; padding: 10px; margin: 10px; border: 1px solid blue;'>
                    Se insertó el paciente \"$nom\" con éxito
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('noti').style.display = 'none';
                    }, 3000);
                </script>
                ";
                require_once 'Vista/html/inicio.php';
            } else {
                echo "
                <div id='noti' style='background-color:rgb(255, 51, 78); padding: 10px; margin: 10px; border: 1px solid blue;'>
                    error al ingresar el paciente \"$nom\"
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('noti').style.display = 'none';
                    }, 3000);
                </script>
                ";
                require_once 'Vista/html/registrar.php';
            }
        }
    }
}
public function agregarM($doc,$cor,$con,$nom,$ape){
    $medico = new Medico( $doc, $cor, $con, $nom, $ape, );
    $gestorUsuario = new GestorUsuario();
    $registros = $gestorUsuario->consultarMedicoPorDocumento($doc);
    if($registros > 0){
        echo "<script>alert('¡¡Sin Registrar!! El medico con este documento ya existe');</script>";
        require_once 'Vista/html/registrar.php';
    } else {
        $registros = $gestorUsuario->validarCorreoMedico($cor);
        if($registros > 0){
            echo "<script>alert('¡¡Sin Registrar!! Debes cambiar el correo');</script>";
            require_once 'Vista/html/registrar.php';
        } else {
            $registros = $gestorUsuario->agregarMedico($medico);
            if($registros > 0){
                echo "
                <div id='noti' style='background-color: #33CCFF; padding: 10px; margin: 10px; border: 1px solid blue;'>
                    Se insertó el médico \"$nom\" con éxito
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('noti').style.display = 'none';
                    }, 3000);
                </script>
                ";
                require_once 'Vista/html/inicio.php';
            } else {
                echo "
                <div id='noti' style='background-color:rgb(255, 51, 78); padding: 10px; margin: 10px; border: 1px solid blue;'>
                    error al ingresar el medico \"$nom\"
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('noti').style.display = 'none';
                    }, 3000);
                </script>
                ";
                require_once 'Vista/html/registrar.php';
            }
        }
    }
}
public function agregarA($doc,$cor,$con,$nom,$ape){
    $administrador = new Administrador( $doc, $cor, $con, $nom, $ape, );
    $gestorUsuario = new GestorUsuario();
    $registros = $gestorUsuario->consultarAdministradorPorDocumento($doc);
    if($registros > 0){
        echo "<script>alert('¡¡Sin Registrar!! El administrador con este documento ya existe');</script>";
        require_once 'Vista/html/registrar.php';
    } else {
        $registros = $gestorUsuario->validarCorreoAdministrador($cor);
        if($registros > 0){
            echo "<script>alert('¡¡Sin Registrar!! Debes cambiar el correo');</script>";
            require_once 'Vista/html/registrar.php';
        } else {
            $registros = $gestorUsuario->agregarAdministrador($administrador);
            if($registros > 0){
                echo "
                <div id='noti' style='background-color: #33CCFF; padding: 10px; margin: 10px; border: 1px solid blue;'>
                    Se insertó el administrador \"$nom\" con éxito
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('noti').style.display = 'none';
                    }, 3000);
                </script>
                ";
                require_once 'Vista/html/inicio.php';
            } else {
                echo "
                <div id='noti' style='background-color:rgb(255, 51, 78); padding: 10px; margin: 10px; border: 1px solid blue;'>
                    error al ingresar el administrador \"$nom\"
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('noti').style.display = 'none';
                    }, 3000);
                </script>
                ";
                require_once 'Vista/html/registrar.php';
            }
        }
    }
}
public function agregarCita($doc,$med,$fec,$hor,$con){
    $cita = new Cita(null, $fec, $hor, $doc, $med, $con, "Solicitada",
    "Ninguna");
    $gestorUsuario = new GestorUsuario();
    $result = $gestorUsuario->consultarMedicoPorDocumento($doc);
    if ($result > 0){
         $gestorCita = new GestorCita();
        $result = $gestorCita->validarPaciente($doc);
        if($result > 0){
            $id = $gestorCita->agregarCita($cita);
            $result = $gestorCita->consultarCitaPorId($id);
            require_once 'Vista/html/confirmarCita.php';
        }else{
            echo "<script>alert('¡¡Sin Registrar!! El Paciente con este documento no existe');</script>";
            require_once 'Vista/html/asignar.php';
        }   
    }else{
        echo "<script>alert('¡¡Sin Registrar!! El Medico con este documento no existe');</script>";
        require_once 'Vista/html/asignar.php';
    }
    
}
public function agregarTratamiento($fechaA,$des,$fechaI,$fechaF, $obs,$doc){
    $gestorCita = new GestorCita();
    $result = $gestorCita->validarPaciente($doc);
    if($result > 0){
        $tratamiento = new Tratamiento(null, $fechaA, $des, $fechaI, $fechaF, $obs, $doc);
        $gestorTratamiento = new GestorTratamiento();
        $id = $gestorTratamiento->agregarTratamiento($tratamiento);
        $result = $gestorTratamiento->consultarTratamientoPorId($id);
        require_once 'Vista/html/confirmarTratamiento.php';
    }else{
        echo "<script>alert('¡¡Sin Registrar!! El Paciente con este documento no existe');</script>";
        if($_SESSION['rol']=="Administrador"){
            require_once 'Vista/html/asignarTratamiento.php';
        }else{
            require_once 'Vista/html/M_asignarTratamiento.php';
        }
    }
    
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
public function listarMedicos(){
    $GestorUsuario = new GestorUsuario();
    $result = $GestorUsuario->listarMedicos();
    require_once 'Vista/html/listarMedicos.php';
}
public function listarAdministradores(){
    $GestorUsuario = new GestorUsuario();
    $result = $GestorUsuario->listarAdministradores();
    require_once 'Vista/html/listarAdministradores.php';
}
public function agregarConsultorio($num,$nom){
    $consultorio = new Consultorio($num,$nom); 
    $gestorCita = new GestorCita();
    $registros = $gestorCita->consultarConsultorioPorId($num);
    if($registros >=1){
        echo "<script>alert('¡¡Sin Registrar!! El Consultorio con este documento ya existe');</script>";
    } else {
            $registros = $gestorCita->agregarConsultorio($consultorio);
            if($registros > 0){
                echo "
                <div id='noti' style='background-color: #33CCFF; padding: 10px; margin: 10px; border: 1px solid blue;'>
                    Se insertó el Consultorio \"$nom\" con éxito
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('noti').style.display = 'none';
                    }, 3000);
                </script>
                ";
            } else {
                echo "
                <div id='noti' style='background-color:rgb(255, 51, 78); padding: 10px; margin: 10px; border: 1px solid blue;'>
                    error al ingresar el Consultorio \"$nom\"
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('noti').style.display = 'none';
                    }, 3000);
                </script>
                ";
            }
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
public function editarM($doc, $cor, $nom, $ape){
    $gestorUsuario = new GestorUsuario();
    $registros = $gestorUsuario->validarCorreoMedico($cor);
        if($registros > 0){
            echo "<p style='color:red'> Este correo ya este registrado. Debes cambirlo</p>";
        }else{
            $registros = $gestorUsuario->editarMedico($doc, $cor, $nom, $ape);
            if($registros > 0){
                echo "<p style='color:green'> Se editó el Medico con éxito</p>";
            } else {
                echo "<p style='color:green'>Error al editar el Medico</p>";
            }
        }
}
public function editarA($doc, $cor, $nom, $ape){
    $gestorUsuario = new GestorUsuario();
    $registros = $gestorUsuario->validarCorreoAdministrador($cor);
        if($registros > 0){
            echo "<p style='color:red'> Este correo ya este registrado. Debes cambirlo</p>";
        }else{
             $registros = $gestorUsuario->editarAdministrador($doc, $cor, $nom, $ape);
            if($registros > 0){
                echo "<p style='color:green'> Se editó el Administrador con éxito</p>";
            } else {
                echo "<p style='color:green'>Error al editar el administrador</p>";
            }
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
public function eliminarM($num){
    $gestorUsuario = new GestorUsuario();
    $registros = $gestorUsuario->validarMedicoForaneo($num);
    if($registros>=1){   
        echo"No se puede eliminar el medico porque tiene citas asociadas";
    }else{
        $registros = $gestorUsuario->eliminarMedico($num);
        if($registros > 0){
            echo "Se eliminó el medico con exito";
        } else {
            echo "Error al eliminar el medico";
        }
    }
}
public function eliminarA($num){
    $gestorUsuario = new GestorUsuario();
    $registros = $gestorUsuario->eliminarAdministrador($num);
    if($registros > 0){
        echo "Se eliminó el administrador con exito";
    } else {
        echo "Error al eliminar el administrador";
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