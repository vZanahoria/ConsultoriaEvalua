<?php
require_once("sistema.php");
class ConservacionPropiedad extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        $this->beginTransaction();
        try{
            if (is_null($id)) {
                $sql = "select * from conservacion_propiedad";
                $st = $this->db->prepare($sql);
                $st->execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $sql = "select * from conservacion_propiedad where id_conservacion=:id";
                $st = $this->db->prepare($sql);
                $st->bindParam(":id", $id, PDO::PARAM_INT);
                $st->execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            }
            $this->commit();
        } catch (PDOException $e){
            $data='';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error");
        }



        return $data;
    }

    public function new ($data)
    {
        $this->db();
        $this->beginTransaction();
        try{
            $sql = "INSERT INTO conservacion_propiedad (conservacion) VALUES (:conservacion)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":conservacion", $data['conservacion'], PDO::PARAM_STR);
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
            $sql = "UPDATE conservacion_propiedad SET conservacion = :conservacion where id_conservacion= :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":conservacion", $data['conservacion'], PDO::PARAM_STR);
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
            $sql = "DELETE FROM conservacion_propiedad WHERE id_conservacion=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
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
}
$conservacionpropiedad= new ConservacionPropiedad;
?>