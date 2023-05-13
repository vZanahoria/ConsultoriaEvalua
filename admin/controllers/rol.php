<?php
require_once("sistema.php");
class Rol extends Sistema
{

    public function getPrivilege($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from privilegio p left join rol_privilegio rp 
            on p.id_privilegio = rp.id_privilegio left join rol r on r.id_rol=rp.id_rol";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from privilegio p left join rol_privilegio rp 
            on p.id_privilegio = rp.id_privilegio left join rol r on r.id_rol=rp.id_rol
            where r.id_rol=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function newPrivilege($id, $data)
    {
        $this->db();
        $sql = "INSERT INTO rol_privilegio (id_rol, id_privilegio) VALUES (:id_rol, :id_privilegio)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_rol", $id, PDO::PARAM_INT);
        $st->bindParam(":id_privilegio", $data['id_privilegio'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function deletePrivilege($id, $id_rol)
    {
        $this->db();
        $sql = "DELETE FROM rol_privilegio WHERE id_rol=:id AND id_privilegio=:id_privilegio";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":id_privilegio", $id_rol, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function deleteAllPrivileges($id){
        $this->db();
        $sql2 = "DELETE FROM rol_privilegio WHERE id_rol=:id";
        $st2 = $this->db->prepare($sql2);
        $st2->bindParam(":id", $id, PDO::PARAM_INT);
        $st2->execute();
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from rol";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from rol where id_rol=:id";
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
        $sql = "INSERT INTO rol (rol) VALUES (:rol)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":rol", $data['rol'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE rol SET rol=:rol WHERE id_rol=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":rol", $data['rol'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM rol WHERE id_rol=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$rol = new Rol;
?>