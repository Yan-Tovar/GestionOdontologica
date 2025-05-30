<?php
class Conexion {
    private $mySQLI;
    private $sql;
    private $result;
    private $filasAfectadas;
    private $citaId;
public function abrir() {
    $this->mySQLI = new mysqli("localhost", "root", "", "citas");
    if ($this->mySQLI->connect_error) {
        die("Conexión fallida: " . $this->mySQLI->connect_error);
    }
    return $this->mySQLI; // ← Esta línea es clave
}

public function cerrar(){
    $this->mySQLI->close();
}
public function consulta($sql){
    $this->sql = $sql;
    $this->result = $this->mySQLI->query($this->sql);
    $this->filasAfectadas = $this->mySQLI->affected_rows;
    $this->citaId = $this->mySQLI->insert_id;
    return $this->result;
}

public function obtenerResult(){
    return $this->result;
}
public function obtenerFilasAfectadas(){
    return $this->filasAfectadas;
}
public function obtenerUnaFila() {
    if ($this->result) {
        return $this->result->fetch_assoc();
    }
    return null;
}
public function obtenerCitaId(){
    return $this->citaId;
}
public function obtenerConexion() {
    return $this->mySQLI;
}

}