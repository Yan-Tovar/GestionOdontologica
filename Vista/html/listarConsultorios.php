
        <?php
            if($result->num_rows > 0){
        ?>
        <table>
            <tr>
                <th>ConNumero</th><th>ConNombre</th>
            </tr>
            <?php
                while($fila=$result->fetch_object()){
            ?>
            <tr>
                <td><?php echo $fila->ConNumero;?></td>
              <td><?php echo $fila->ConNombre;?></td>
                <td>Ver</td>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php
            }
            else {
        ?>
        <p>Aún no hay Consultorios.</p>
        <input type="button" name="ingPaciente" id="ingPaciente" value="IngresarPaciente" onclick="mostrarFormulario()">
        <?php
}
?>
   