<?php
$value=$_SESSION['us_id'];
if(isset($value) && $_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'Medico'){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
         <link href="Vista/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="vista/jquery/jquery.js" ></script>
        <script src="Vista/js/script.js" type="text/javascript"></script>
        <script src="Vista/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="Vista/jquery/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
            if($result->num_rows > 0){
        ?>
        <table class="table">
            <tr>
                <th>Documento</th><th>Nombre Completo</th><th>Sexo</th>
            </tr>
            <?php
                while($fila=$result->fetch_object()){
            ?>
            <tr>
                <td><?php echo $fila->PacIdentificacion;?></td>
              <td><?php echo $fila->PacNombres . " ". $fila->PacApellidos;?></td>
                <td><?php echo $fila->PacSexo;?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php
            }
            else {
        ?>
        <div id='noti' style='
                            display: inline-flex;
                            align-items: center;
                            background-color: #d4edda;
                            color:rgb(132, 155, 3);
                            padding: 12px 18px;
                            margin: 20px;
                            border-radius: 25px;
                            font-family:arial;
                            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                            border-left: 6px solid rgb(191, 241, 9);
                            max-width: 400px;
                            position: relative;'>
                <i class='material-icons' 
                    style='font-size: 16px;
                    font-size: 22px;
                    margin-right: 10px;
                    color:rgb(233, 157, 17);'>info</i>
            <p>El paciente no existe en la base de datos</p>
        </div>
           <button type="button" class="btn-verde" name="ingPaciente" id="ingPaciente" onclick="mostrarFormulario()"><i class="material-icons">add</i>Agregar</button>
        <?php
}
?>
    </body>
</html>
<?php
}else{
    header("Location: index.php");
}
?>