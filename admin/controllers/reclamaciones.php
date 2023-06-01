<?php
require_once("sistema.php");
class Reclamaciones extends Sistema
{

    public function get($id = null)
    {
        $this->db();
        $this->beginTransaction();
        try{
            if (is_null($id)) {
                $sql = "select r.id_reclamacion, r.descripcion, r.fecha_reclamo,
                nr.id_naturaleza, nr.naturaleza_reclamacion,
                er.id_estado_reclamacion, er.estado_reclamacion,
                c.id_cliente, concat(c.apellido_materno, ' ', c.apellido_paterno, ' ', c.nombre) as cliente,
                a.id_avaluo
         from reclamaciones r
         left join naturaleza_reclamacion nr on r.id_naturaleza = nr.id_naturaleza
         left join estado_reclamacion er on er.id_estado_reclamacion = r.id_estado_reclamacion
         left join cliente c on c.id_cliente = r.id_cliente
         left join avaluo a on r.id_avaluo = a.id_avaluo";
                $st = $this->db->prepare($sql);
                $st->execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $sql = "select r.id_reclamacion, r.descripcion, r.fecha_reclamo,
                nr.id_naturaleza, nr.naturaleza_reclamacion,
                er.id_estado_reclamacion, er.estado_reclamacion,
                c.id_cliente, concat(c.apellido_materno, ' ', c.apellido_paterno, ' ', c.nombre) as cliente,
                a.id_avaluo
         from reclamaciones r
         left join naturaleza_reclamacion nr on r.id_naturaleza = nr.id_naturaleza
         left join estado_reclamacion er on er.id_estado_reclamacion = r.id_estado_reclamacion
         left join cliente c on c.id_cliente = r.id_cliente
         left join avaluo a on r.id_avaluo = a.id_avaluo
                where id_reclamacion=:id";
                $st = $this->db->prepare($sql);
                $st->bindParam(":id", $id, PDO::PARAM_INT);
                $st->execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            }
            $this->commit();
        } catch (PDOException $e){
            $data = '';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error.");
        }

        return $data;
    }

    public function new($data)
    {
        $this->db();
        $this->beginTransaction();
        try{
            $sql = "INSERT INTO reclamaciones (descripcion, fecha_reclamo, id_naturaleza, id_estado_reclamacion, id_cliente, id_avaluo) 
            VALUES (:descripcion, :fecha_reclamo, :id_naturaleza, :id_estado_reclamacion, :id_cliente, :id_avaluo)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
            $st->bindParam(":fecha_reclamo", $data['fecha_reclamo'], PDO::PARAM_STR);
            $st->bindParam(":id_naturaleza", $data['id_naturaleza'], PDO::PARAM_INT);
            $st->bindParam(":id_estado_reclamacion", $data['id_estado_reclamacion'], PDO::PARAM_INT);
            $st->bindParam(":id_cliente", $data['id_cliente'], PDO::PARAM_INT);
            $st->bindParam(":id_avaluo", $data['id_avaluo'], PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
            $this->commit();
        } catch(PDOException $e){
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
            $sql = "DELETE FROM reclamaciones WHERE id_reclamacion=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
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
            $sql = "UPDATE reclamaciones SET descripcion =:descripcion, fecha_reclamo =:fecha_reclamo, id_naturaleza =:id_naturaleza, 
            id_estado_reclamacion =:id_estado_reclamacion, id_cliente =:id_cliente, id_avaluo =:id_avaluo
                    where id_reclamacion =:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
            $st->bindParam(":fecha_reclamo", $data['fecha_reclamo'], PDO::PARAM_STR);
            $st->bindParam(":id_naturaleza", $data['id_naturaleza'], PDO::PARAM_INT);
            $st->bindParam(":id_estado_reclamacion", $data['id_estado_reclamacion'], PDO::PARAM_INT);
            $st->bindParam(":id_cliente", $data['id_cliente'], PDO::PARAM_INT);
            $st->bindParam(":id_avaluo", $data['id_avaluo'], PDO::PARAM_INT);
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
}

$reclamaciones = new Reclamaciones;
?>