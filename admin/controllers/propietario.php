<?php
require_once("sistema.php");
class Propietario extends Sistema{
    public function get($id = null){
        $this->db();
        $this->beginTransaction();
        try{
            if(is_null($id)){
                $sql = "select * , concat (apellido_materno, ' ', apellido_paterno, ' ', nombre) as propietario from propietario";
                $st = $this ->db->prepare($sql);
                $st->execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                $sql = "select * from propietario where id_propietario=:id";
                $st = $this -> db->prepare($sql);
                $st -> bindParam(":id", $id, PDO::PARAM_INT);
                $st -> execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            }
            $this->commit();
        } catch (PDOException $e){
            $data = '';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error");
        }
        

        return $data;
    }

    public function edit($id, $data){
        $this -> db();
        $this->beginTransaction();
        try{
            $sql = "UPDATE propietario SET apellido_paterno =:apellido_paterno, apellido_materno =:apellido_materno, 
            nombre =:nombre, telefono=:telefono where id_propietario=:id";
            $st = $this ->db->prepare($sql);
            $st->bindParam(":apellido_paterno", $data['apellido_paterno'], PDO::PARAM_STR);
            $st->bindParam(":apellido_materno", $data['apellido_materno'], PDO::PARAM_STR);
            $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $st->bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
            $st->bindParam(":id" , $id,PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
            $this->commit();
        } catch (PDOException $e){
            $data = '';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error");
        }

        return $rc;
    }

    public function delete($id){
        $this->db();
        $this->beginTransaction();
        try{
            $sql = "DELETE from propietario WHERE id_propietario=:id";
            $st = $this ->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st -> execute();
    
            $rc = $st->rowCount();
            $this->commit();
        } catch (PDOException $e){
            $data='';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error");
        }
        return $rc;
    }

    public function new($data){
        $this->db();
        $this->beginTransaction();
        try{
            $sql = "insert into propietario (correo, apellido_paterno, apellido_materno, nombre, telefono) 
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
            $this->flash("danger", "Ocurrió algún error");
        }
        return $rc;
    }
}
$propietario = new propietario;
?>