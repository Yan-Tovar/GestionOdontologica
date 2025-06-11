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
        <table class="table">
            <tr>
                <th>Número</th><th>Fecha</th><th>Hora</th><th>Acciones</th>
            </tr>
            <?php
            while($fila=$result->fetch_object()){
                ?>
                <tr>
                    <td><?php echo $fila->CitNumero;?></td>
                    <td><?php echo $fila->CitFecha;?></td>
                    <td><?php echo $fila->CitHora;?></td>
                    <td><a href="#" onclick="confirmarCancelar(<?php echo $fila->CitNumero;?>)" class='btn-rojo'><i class='material-icons'>cancel</i>Cancelar</a></td>
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
                        color:rgb(145, 123, 0);
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
        El paciente no tiene citas asignadas
    </div>    
        <?php
        }
        ?>
</body>
</html>