<?php
require_once("sistema.php");
class Valuador extends Sistema{
    public function get($id = null){
        $this->db();
        if(is_null($id)){
            $sql = "select * from valuador";
            $st = $this ->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        }
        else{
            $sql = "select * from departamento where id_valuador=:id";
            $st = $this -> db->prepare($sql);
            $st -> bindParam(":id", $id, PDO::PARAM_INT);
            $st -> execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }

        return $data;
    }

    public function edit($id, $data){
        $this -> db;
        $sql = "UPDATE valuador SET apellido_paterno =:apellido_paterno, apellido_materno =:apellido_materno, 
        nombre =:nombre, telefono=:telefono where id_valuador=:id";
        $st = $this ->db->prepare($sql);
        $st->bindParam(":apellido_paterno", $data['apellido_paterno'], PDO::PARAM_STR);
        $st->bindParam(":apellido_materno", $data['apellido_materno'], PDO::PARAM_STR);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id){
        $this->db();
        $sql = "DELETE from valuador WHERE id_valuador=:id";
        $st = $this ->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st -> execute();

        $rc = $st->rowCount();

        return $rc;
    }

    public function new($data){
        $this->db();
        $sql = "INSERT INTO valuador (apellido_paterno, apellido_materno, nombre, telefono)
        VALUES (:apellido_paterno, :apellido_materno, :nombre, :telefono)";
        $st = $this->db->prepare($sql);
        $st -> bindParam(":apellido_paterno", $data['apellido_paterno'], PDO::PARAM_STR);
        $st -> bindParam(":apellido_materno", $data['apellido_materno'], PDO::PARAM_STR);
        $st -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st -> bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
        $st -> execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$valuador = new Valuador;
?>