<?php
require_once("sistema.php");
class Avaluo extends Sistema
{

    public function get($id = null)
    {
        $this->db();
        $this->beginTransaction();
        try{
            if (is_null($id)) {
                $sql = "select a.id_avaluo, a.valor_reposicion, a.valor_mercado, a.observaciones,
                 ep.id_estado_pago, ep.estado_pago,
                ea.id_estado_avaluo, ea.estado_avaluo, p.id_propiedad, p.ubicacion,
                concat(v.apellido_materno, ' ', v.apellido_paterno, ' ', v.nombre) as valuador
                from avaluo a
                left join estado_pago ep on a.id_estado_pago = ep.id_estado_pago
                left join estado_avaluo ea on a.id_estado_avaluo = ea.id_estado_avaluo
                left join propiedad p on a.id_propiedad = p.id_propiedad
                left join valuador v on a.id_valuador = v.id_valuador";
                $st = $this->db->prepare($sql);
                $st->execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $sql = "select a.id_avaluo, a.valor_reposicion, a.valor_mercado, a.observaciones, 
                ep.id_estado_pago, ep.estado_pago,
                ea.id_estado_avaluo, ea.estado_avaluo, p.id_propiedad, p.ubicacion,
                concat(v.apellido_materno, ' ', v.apellido_paterno, ' ', v.nombre) as valuador
                from avaluo a
                left join estado_pago ep on a.id_estado_pago = ep.id_estado_pago
                left join estado_avaluo ea on a.id_estado_avaluo = ea.id_estado_avaluo
                left join propiedad p on a.id_propiedad = p.id_propiedad
                left join valuador v on a.id_valuador = v.id_valuador
                where id_avaluo=:id";
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

    public function new($data)
    {
        $this->db();
        $this->beginTransaction();
        try{
            $sql = "INSERT INTO avaluo (valor_reposicion, valor_mercado, observaciones,  id_estado_pago, id_estado_avaluo, id_propiedad, id_valuador) 
            VALUES (:valor_reposicion, :valor_mercado, :observaciones, :id_estado_pago, :id_estado_avaluo, :id_propiedad, :id_valuador)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":valor_reposicion", $data['valor_reposicion'], PDO::PARAM_STR);
            $st->bindParam(":valor_mercado", $data['valor_mercado'], PDO::PARAM_STR);
            $st->bindParam(":observaciones", $data['observaciones'], PDO::PARAM_STR);
            $st->bindParam(":id_estado_pago", $data['id_estado_pago'], PDO::PARAM_INT);
            $st->bindParam(":id_estado_avaluo", $data['id_estado_avaluo'], PDO::PARAM_INT);
            $st->bindParam(":id_propiedad", $data['id_propiedad'], PDO::PARAM_INT);
            $st->bindParam(":id_valuador", $data['id_valuador'], PDO::PARAM_INT);
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
            $sql = "DELETE FROM avaluo WHERE id_avaluo=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
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

    public function edit($id, $data)
    {
        $this->db();
        $this->beginTransaction();
        try{
            $sql = "UPDATE avaluo SET valor_reposicion =:valor_reposicion, valor_mercado =:valor_mercado, observaciones =:observaciones,
            id_estado_pago =:id_estado_pago, id_estado_avaluo =:id_estado_avaluo, id_propiedad =:id_propiedad,
            id_valuador =:id_valuador
                    where id_avaluo =:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":valor_reposicion", $data['valor_reposicion'], PDO::PARAM_STR);
            $st->bindParam(":valor_mercado", $data['valor_mercado'], PDO::PARAM_STR);
            $st->bindParam(":observaciones", $data['observaciones'], PDO::PARAM_STR);
            $st->bindParam(":id_estado_pago", $data['id_estado_pago'], PDO::PARAM_INT);
            $st->bindParam(":id_estado_avaluo", $data['id_estado_avaluo'], PDO::PARAM_INT);
            $st->bindParam(":id_propiedad", $data['id_propiedad'], PDO::PARAM_INT);
            $st->bindParam(":id_valuador", $data['id_valuador'], PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
            $this->commit();
        }
        catch (PDOException $e){
            $data = '';
            $this->rollBack();
            $this->flash("danger", "Ocurrió algún error.");
        }
        return $rc;
    }
    public function chartAvaluoCompleto()
    {
        $this->db();
        $sql = "select
        COUNT(case when id_estado_pago = 1 then 1 end) AS pagado,
        COUNT(case when id_estado_pago = 2 then 2 end) AS pendiente_pago
        from avaluo;";
        $st = $this->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

}

$avaluo = new Avaluo;
?>