<?php
require_once(__DIR__."/sistema.php");
class Cliente extends Sistema{
    public function get($id = null){
        $this->db();
        $this->beginTransaction();
        try{
            if(is_null($id)){
                $sql = "select *, concat(apellido_paterno, ' ', apellido_materno, ' ', nombre) as cliente from cliente";
                $st = $this ->db->prepare($sql);
                $st->execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                $sql = "select * from cliente where id_cliente=:id";
                $st = $this -> db->prepare($sql);
                $st -> bindParam(":id", $id, PDO::PARAM_INT);
                $st -> execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            }
            $this->commit();
        } catch (PDOException $e){
            $data='';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error.");
        }


        return $data;
    }

    public function edit($id, $data){
        $this -> db();
        $this->beginTransaction();
        try{
            $sql = "UPDATE cliente SET apellido_paterno =:apellido_paterno, apellido_materno =:apellido_materno, 
            nombre =:nombre, telefono=:telefono, correo =:correo where id_cliente=:id";
            $st = $this ->db->prepare($sql);
            $st->bindParam(":apellido_paterno", $data['apellido_paterno'], PDO::PARAM_STR);
            $st->bindParam(":apellido_materno", $data['apellido_materno'], PDO::PARAM_STR);
            $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $st->bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
            $st->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
            $st->bindParam(":id" , $id,PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
            $this->commit();
        } catch (PDOException $e){
            $data='';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error.");
        }

        return $rc;
    }

    public function delete($id){
        $this->db();
        $this->beginTransaction();
        try{
            $sql = "DELETE from cliente WHERE id_cliente=:id";
            $st = $this ->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st -> execute();
            $rc = $st->rowCount();
            $this->commit();
        } catch (PDOException $e){
            $data='';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error.");
        }
        return $rc;
    }

    public function new($data){
        $this->db();
        $this->beginTransaction();
        try{
            $sql = "insert into cliente (correo, apellido_paterno, apellido_materno, nombre, telefono) 
            values (:correo, :apellido_paterno, :apellido_materno, :nombre, :telefono)";
            $st = $this->db->prepare($sql);
            $st -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
            $st -> bindParam(":apellido_paterno", $data['apellido_paterno'], PDO::PARAM_STR);
            $st -> bindParam(":apellido_materno", $data['apellido_materno'], PDO::PARAM_STR);
            $st -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $st -> bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
            $st -> execute();
            $rc = $st->rowCount();
            $this->commit();
        } catch (PDOException $e){
            $data='';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error.");
        }

        return $rc;
    }
}
$cliente = new Cliente;
?>