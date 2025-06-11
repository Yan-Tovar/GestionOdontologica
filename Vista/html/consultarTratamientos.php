<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
    <link href="Vista/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script type="text/javascript" src="vista/jquery/jquery.js" ></script>
    <script src="Vista/js/script.js" type="text/javascript"></script>
    <script src="Vista/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="Vista/jquery/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>
</head>
<body>
    

<?php
    if($result->num_rows > 0){
    ?>
    <table>
        <tr>
            <th>Numero </th><th>Fecha Asignación </th>
            <th>Descripcion </th><th>Fecha Inicio </th>
            <th>Fecha Fin </th><th>Observaciones </th>
        <?php
        while($fila=$result->fetch_object()){
            ?>
            <tr>
                <td><?php echo $fila->TraNumero;?></td>
                <td><?php echo $fila->TraFechaAsignado;?></td>
                <td><?php echo $fila->TraDescripcion;?></td>
                <td><?php echo $fila->TraFechaInicio;?></td>
                <td><?php echo $fila->TraFechaFin;?></td>
                <td><?php echo $fila->TraObservaciones;?></td>
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
                        color:rgb(151, 129, 6);
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
        El paciente no tiene Tratamientos asignados
    </div>         
    <?php
    }
?>
</body>
</html>