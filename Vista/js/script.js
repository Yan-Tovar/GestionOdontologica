$(document).ready(function(){
    $("#frmPaciente").dialog({
        autoOpen: false,
        height: 310,
        width: 400,
        modal: true,
        buttons: {
            "Insertar":insertarPaciente,
            "Cancelar":cancelar
        }
    });
    $("#frmConsultorio").dialog({
        autoOpen: false,
        height: 310,
        width: 400,
        modal: true,
        buttons: {
            "Agregar":insertarConsultorio,
            "Cancelar":cancelar
        }
    });
    $("#frmEditar").dialog({
        autoOpen: false,
        height: 310,
        width: 400,
        modal: true,
        buttons: {
            "Cambiar":editarConsultorio,
            "Cancelar":cancelar
        }
    });
    $("#frmEditarT").dialog({
        autoOpen: false,
        height: 310,
        width: 400,
        modal: true,
        buttons: {
            "Cambiar":editarTratamiento,
            "Cancelar":cancelar
        }
    });
});
function consultarPaciente(){
    var url = "index.php?accion=consultarPaciente&documento=" +
    $("#asignarDocumento").val();
    $("#paciente").load(url,function(){
    });
}
function mostrarFormulario(){
    documento = "" + $("#asignarDocumento").val();
    $("#PacDocumento").attr("value",documento);
    $("#frmPaciente").dialog('open');
}
function insertarPaciente(){
    queryString = $("#agregarPaciente").serialize();
    url = "index.php?accion=ingresarPaciente&" + queryString ;
    $("#paciente").load(url);
    $("#frmPaciente").dialog('close');
}
function cancelar(){
    $(this).dialog('close');
}
function cargarHoras(){
    if( ($("#medico").val() == -1 ) || ($("#fecha").val() == "") || ($("#consultorio").val() == -1)){
        $("#hora").html("<option value='-1' selected='selected'>--Selecione la hora </option>")
    } else {
        queryString = "medico="+$("#medico").val()+"&fecha="+$("#fecha").val();
        url = "index.php?accion=consultarHora&" + queryString ;
        $("#hora").load(url);
    }
}
function seleccionarHora(){
    if($("#medico").val() == -1 ){
        alert("Debe seleccionar un médico");
    } else if ($("#fecha").val() == ""){
        alert("Debe seleccionar una fecha");
    }
}
function consultarCita(){
    url = "index.php?accion=consultarCita&consultarDocumento=" +
    $("#consultarDocumento").val() ;
    $("#paciente2").load(url);
}
function consultarCitaM(){
    url = "index.php?accion=consultarCitaMedico&consultarDocumento=" +
    $("#consultarDocumento").val() ;
    $("#paciente2").load(url);
}
function consultarTratamientos(){
    url = "index.php?accion=consultarTratamientos&consultarDocumento=" +
    $("#consultarDocumento").val() ;
    $("#paciente2").load(url);
}
function consultarTratamientosP(){
    url = "index.php?accion=consultarTratamientosP&consultarDocumento=" +
    $("#consultarDocumento").val() ;
    $("#paciente2").load(url);
}
function cancelarCita(){
    url = "index.php?accion=cancelarCita&cancelarDocumento=" +
    $("#cancelarDocumento").val() ;
    $("#paciente3").load(url);
}
function confirmarCancelar(numero){
    if(confirm("Esta seguro de cancelar la cita " + numero)){
        $.get("index.php",{accion:'confirmarCancelar',numero:numero},function(mensaje)
        {
        alert(mensaje);
        });
    }
    $("#cancelarConsultar").trigger("click");
}
function listarConsultorio(){
    var url = "index.php?accion=listarConsultorio";
    $("#listado").load(url,function(){
    });
}
function agregarConsultorio(){
    $("#frmConsultorio").dialog('open');
}
function insertarConsultorio(){
    queryString = $("#agregarConsultorios").serialize();
    url = "index.php?accion=ingresarConsultorio&" + queryString ;
    $("#listado").load(url);
    $("#frmConsultorio").dialog('close');
}
function mostrarFormularioE(numero, nombre) {
    // Llenar los campos del formulario
    $('#inputNumero').attr("value",numero);
    $('#inputNombre').val(nombre);

    // Mostrar el formulario tipo diálogo
    $('#frmEditar').dialog('open');
}
function editarConsultorio(numero, nombre){
    numero = $("#inputNumero").val();
    nombre = $("#inputNombre").val();
    url = "index.php?accion=editarConsultorio&inputNumero=" + encodeURIComponent(numero) + "&inputNombre=" + encodeURIComponent(nombre);
    $("#listado").load(url);
    $("#frmEditar").dialog('close');

}
function mostrarFormularioTratamiento(numero, fechaA, descripcion, fechaI, fechaF, observaciones, paciente) {
    // Llenar los campos del formulario
    $('#inputNumero').attr("value",numero);
    $('#inputFechaA').val(fechaA);
    $('#inputDescripcion').val(descripcion);
    $('#inputFechaI').val(fechaI);
    $('#inputFechaF').val(fechaF);
    $('#inputObservaciones').val(observaciones);
    $('#inputPaciente').val(paciente);
    // Mostrar el formulario tipo diálogo
    $('#frmEditarT').dialog('open');
}
function editarTratamiento(numero, fechaA, descripcion, fechaI, fechaF, observaciones, paciente){
    numero = $("#inputNumero").val();
    fechaA = $("#inputFechaA").val();
    descripcion = $("#inputDescripcion").val();
    fechaI = $("#inputFechaI").val();
    fechaF = $("#inputFechaF").val();
    observaciones = $("#inputObservaciones").val();
    paciente = $("#inputPaciente").val();
    url = "index.php?accion=editarTratamiento&inputNumero=" + encodeURIComponent(numero)
    + "&inputFechaA=" + encodeURIComponent(fechaA) + "&inputDescripcion=" + encodeURIComponent(descripcion)
    + "&inputFechaI=" + encodeURIComponent(fechaI) + "&inputFechaF=" + encodeURIComponent(fechaF)
    + "&inputObservaciones=" + encodeURIComponent(observaciones) + "&inputPaciente=" + encodeURIComponent(paciente);
    $("#paciente2").load(url);
    $("#frmEditarT").dialog('close');

}
function eliminarC(numero){
    if (numero) {
        if (confirm('¿Está seguro de Eliminar el Consultorio?')) {
            let url = "index.php?accion=eliminarConsultorio&id=" + numero ;
            $("#listado").load(url);
        }
    } else {
        alert('No se ha podido encontrar el ID');
    }
}
function eliminarTratamiento(numero){
    if (numero) {
        if (confirm('¿Está seguro de Eliminar el Tratamiento?')) {
            let url = "index.php?accion=eliminarTratamiento&id=" + numero ;
            $("#paciente2").load(url);
        }
    } else {
        alert('No se ha podido encontrar el ID');
    }
}
