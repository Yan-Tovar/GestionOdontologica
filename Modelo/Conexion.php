<?php
class Conexion {
    private $mySQLI;
    private $sql;
    private $result;
    private $filasAfectadas;
    private $resultado;
    private $citaId;
public function abrir(){
    $this->mySQLI=new mysqli("localhost","root","","citas");
    if(mysqli_connect_error()){
        return 0;
    } else {
        return 1;
    }
}
public function cerrar(){
    $this->mySQLI->close();
}
public function consulta($sql){
    $this->sql = $sql;
    $this->result = $this->mySQLI->query($this->sql);
    $this->filasAfectadas = $this->mySQLI->affected_rows;
    $this->resultado = $this->mySQLI->query($sql);
    $this->citaId = $this->mySQLI->insert_id;
    return $this->resultado;
}

public function obtenerResult(){
    return $this->result;
}
public function obtenerFilasAfectadas(){
    return $this->filasAfectadas;
}
 public function obtenerUnaFila() {
        if ($this->resultado) {
            return $this->resultado->fetch_assoc();
        }
        return null;
    }
public function obtenerCitaId(){
    return $this->citaId;
}
}