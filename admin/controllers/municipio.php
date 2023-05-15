<?php
require_once("sistema.php");
class Municipio extends Sistema
{

    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select m.municipio from estado as e left join municipio m 
            on e.id_estado = m.id_estado";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select m.municipio
            from estado as e
            left join municipio m on e.id_estado = m.id_estado
            where e.id_estado=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function new($data)
    {
        $this->db();
        $sql = "INSERT INTO municipio (municipio, id_estado) VALUES (:municipio, :id_estado)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":municipio", $data['municipio'], PDO::PARAM_STR);
        $st->bindParam(":id_estado", $data['id_estado'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM municipio WHERE id_municipio=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE municipio SET municipio =:municipio, id_estado =:id_estado
                where id_municipio =:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":municipio", $data['municipio'], PDO::PARAM_STR);
        $st->bindParam(":id_estado", $data['id_estado'], PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
}

$municipio = new Municipio;
?>