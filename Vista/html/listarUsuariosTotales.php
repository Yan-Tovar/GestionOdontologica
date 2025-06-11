<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php
        if($result->num_rows > 0){
        ?>
        <table  able class="table">
            <tr>
                <th>Rol</th><th>Cantidad Usuarios</th>
            </tr>
            <?php
        $valor = 0;
        while($fila = $result->fetch_object()){
            ?>
            <tr>
                <td><?php echo $fila->Tipo; ?></td>
                <td><?php echo $fila->Cantidad; ?></td>  
            </tr>
        <?php
            }
        ?>
        </table>
        <?php
        } else {
            echo "<p>No hay resultados para mostrar.</p>";
        }
        ?>      
</body>
</html>