<?php
require_once("sistema.php");
class Usuario extends Sistema
{

    public function getRole($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from rol r left join usuario_rol ur 
            on r.id_rol = ur.id_rol left join usuario u on u.id_usuario=ur.id_usuario";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from rol r left join usuario_rol ur 
            on r.id_rol = ur.id_rol left join usuario u on u.id_usuario=ur.id_usuario
            where u.id_usuario=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function newRol($id, $data)
    {
        $this->db();
        $sql = "INSERT INTO usuario_rol (id_usuario, id_rol) VALUES (:id_usuario, :id_rol)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_usuario", $id, PDO::PARAM_INT);
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
            $sql = "select * from usuario";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from usuario where id_usuario=:id";
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
        $sql = "INSERT INTO usuario (correo, contrasena) VALUES (:correo, md5(:contrasena))";
        $st = $this->db->prepare($sql);
        $st->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
        $st->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE usuario SET correo=:correo, contrasena=md5(:contrasena) WHERE id_usuario=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
        $st->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql2 = "DELETE FROM usuario_rol WHERE id_usuario=:id";
        $st2 = $this->db->prepare($sql2);
        $st2->bindParam(":id", $id, PDO::PARAM_INT);
        $st2->execute();

        $sql = "DELETE FROM usuario WHERE id_usuario=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$usuario = new Usuario;
?>