<?php
require_once("sistema.php");
class EstadoAvaluo extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        $this->beginTransaction();
        try{
            if (is_null($id)) {
                $sql = "select * from estado_avaluo";
                $st = $this->db->prepare($sql);
                $st->execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $sql = "select * from estado_avaluo where id_estado_avaluo=:id";
                $st = $this->db->prepare($sql);
                $st->bindParam(":id", $id, PDO::PARAM_INT);
                $st->execute();
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

    public function new ($data)
    {
        $this->db();
        $this->beginTransaction();
        try{
            $sql = "INSERT INTO estado_avaluo (estado_avaluo) VALUES (:estado_avaluo)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":estado_avaluo", $data['estado_avaluo'], PDO::PARAM_STR);
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
    public function edit($id, $data)
    {
        $this->db();
        $this->beginTransaction();
        try{
            $sql = "UPDATE estado_avaluo SET estado_avaluo = :estado_avaluo where id_estado_avaluo= :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":estado_avaluo", $data['estado_avaluo'], PDO::PARAM_STR);
            $st->execute();
            $rc = $st->rowCount();
            $this->commit();
        } catch (PDOException $e){
            $data = '';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error.");
        }

        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $this->beginTransaction();
        try{
            $sql = "DELETE FROM estado_avaluo WHERE id_estado_avaluo=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
            $this->commit();
        } catch(PDOException $e){
            $data='';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error.");
        }
        return $rc;
    }
}
$estadoavaluo= new EstadoAvaluo;
?>