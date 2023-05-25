<?php
require_once("sistema.php");
class NaturalezaReclamacion extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from naturaleza_reclamacion";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from naturaleza_reclamacion where id_naturaleza=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function new ($data)
    {
        $this->db();
        $sql = "INSERT INTO naturaleza_reclamacion (naturaleza_reclamacion) VALUES (:naturaleza_reclamacion)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":naturaleza_reclamacion", $data['naturaleza_reclamacion'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE naturaleza_reclamacion SET naturaleza_reclamacion = :naturaleza_reclamacion where id_naturaleza= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":naturaleza_reclamacion", $data['naturaleza_reclamacion'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM naturaleza_reclamacion WHERE id_naturaleza=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$naturaleza= new NaturalezaReclamacion;
?>