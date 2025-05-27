<?php
    if($result->num_rows > 0){
    ?>
    <table>
        <tr>
            <th>Numero </th><th>Fecha Asignación </th>
            <th>Descripcion </th><th>Fecha Inicio </th>
            <th>Fecha Fin </th><th>Observaciones </th><th>Paciente </th>
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
                <td><?php echo $fila->TraPaciente;?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
    }
    else {
    ?>
        <p>El paciente no tiene Tratamientos asignados</p>
    <?php
    }
?>
