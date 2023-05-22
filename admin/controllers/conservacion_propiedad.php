<?php
require_once("sistema.php");
class ConservacionPropiedad extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from conservacion_propiedad";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from conservacion_propiedad where id_conservacion=:id";
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
        $sql = "INSERT INTO conservacion_propiedad (conservacion) VALUES (:conservacion)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":conservacion", $data['conservacion'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE conservacion_propiedad SET conservacion = :conservacion where id_conservacion= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":conservacion", $data['conservacion'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM conservacion_propiedad WHERE id_conservacion=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$conservacionpropiedad= new ConservacionPropiedad;
?>