<?php
require_once("sistema.php");
class Estado extends Sistema
{
    public function getMunicipio($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select m.municipio
            from estado as e
            join municipio m on e.id_estado = m.id_estado;";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select m.municipio
            from estado as e
            join municipio m on e.id_estado = m.id_estado
            where e.id_estado=:id;";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function newMunicipio($id, $data)
    {
        $this->db();
        $sql = "INSERT INTO municipio (id_municipio, municipio, id_estado) VALUES (:id_municipio, :municipio, :id_estado)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_municipio", $id, PDO::PARAM_INT);
        $st->bindParam(":id_rol", $data['id_rol'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function deleteRole($id, $id_rol)
    {
        $this->db();
        $sql = "DELETE FROM usuario_rol WHERE id_usuario=:id AND id_rol=:id_rol";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function deleteAllRoles($id){
        $this->db();
        $sql2 = "DELETE FROM usuario_rol WHERE id_usuario=:id";
        $st2 = $this->db->prepare($sql2);
        $st2->bindParam(":id", $id, PDO::PARAM_INT);
        $st2->execute();
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from estado";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from estado where id_estado=:id";
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
        $sql = "INSERT INTO estado (estado) VALUES (:estado)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":estado", $data['estado'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE estado SET estado = :estado where id_estado= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":estado", $data['estado'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM estado WHERE id_estado=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$estado = new Estado;
?>