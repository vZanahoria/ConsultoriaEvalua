<?php
require_once("sistema.php");

class Privilegio extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "SELECT * FROM privilegio";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "SELECT * FROM privilegio where id_privilegio=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll();
        }
        return $data;
    }

    public function new($data)
    {
        $this->db();
        $sql = "INSERT INTO privilegio (privilegio) VALUES (:privilegio)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":privilegio", $data['privilegio'], PDO::PARAM_STR);
        $st->execute();

        $rc= $st->rowCount();
        return $rc;
    }

    public function edit($id, $data){
        $this->db();
        $sql = "UPDATE privilegio SET privilegio=:privilegio WHERE id_privilegio=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":privilegio", $data['privilegio'], PDO::PARAM_STR);
        $st->execute();

        $rc=$st->rowCount();
        return $rc;
    }

    public function delete($id){
        $this->db();
        $sql = "DELETE FROM privilegio WHERE id_privilegio=:id";
        $st=$this->db->prepare($sql);
        $st->bindParam(":id",$id,PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$privilegio = new Privilegio();
?>