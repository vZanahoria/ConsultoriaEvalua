<?php
require_once("sistema.php");
class Localidad extends Sistema
{

    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select l.localidad, l.id_localidad, m.id_municipio, m.municipio from municipio as m right join localidad l
            on m.id_municipio = l.id_municipio order by l.id_localidad;";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select l.localidad, l.id_localidad, m.id_municipio, m.municipio from municipio as m right join localidad l
            on m.id_municipio = l.id_municipio 
            where l.id_localidad=:id order by l.id_localidad;";
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
        $sql = "INSERT INTO localidad (localidad, id_municipio) VALUES (:localidad, :id_municipio)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":localidad", $data['localidad'], PDO::PARAM_STR);
        $st->bindParam(":id_municipio", $data['id_municipio'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM localidad WHERE id_localidad=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE localidad SET localidad =:localidad, id_municipio =:id_municipio
                where id_localidad =:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":localidad", $data['localidad'], PDO::PARAM_STR);
        $st->bindParam(":id_municipio", $data['id_municipio'], PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
}

$localidad = new Localidad;
?>