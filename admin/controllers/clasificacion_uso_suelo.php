<?php
require_once("sistema.php");
class ClasificacionUsoSuelo extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from clasificacion_uso_suelo";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from clasificacion_uso_suelo where id_clasificacion_uso=:id";
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
        $sql = "INSERT INTO clasificacion_uso_suelo (clasificacion_uso_suelo) VALUES (:clasificacion_uso_suelo)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":clasificacion_uso_suelo", $data['clasificacion_uso_suelo'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE clasificacion_uso_suelo SET clasificacion_uso_suelo = :clasificacion_uso_suelo where id_clasificacion_uso= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":clasificacion_uso_suelo", $data['clasificacion_uso_suelo'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM clasificacion_uso_suelo WHERE id_clasificacion_uso=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$usosuelo = new ClasificacionUsoSuelo;
?>