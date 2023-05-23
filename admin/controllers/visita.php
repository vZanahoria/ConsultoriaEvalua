<?php
require_once("sistema.php");
class Visita extends Sistema
{

    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select v.id_visita, v.fecha_visita, p.id_propiedad, p.ubicacion, v2.id_valuador,
            concat(v2.apellido_paterno, ' ', v2.apellido_materno, ' ', v2.nombre) as valuador,
           a.id_avaluo,ev.id_estado_visita, ev.estado_visita
     from visita v
     left join valuador v2 on v.id_valuador = v2.id_valuador
     left join avaluo a on v.id_avaluo = a.id_avaluo
     left join propiedad p on a.id_propiedad = p.id_propiedad
     left join estado_visita ev on v.id_estado_visita = ev.id_estado_visita";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select v.id_visita, v.fecha_visita, p.id_propiedad, p.ubicacion, v2.id_valuador,
            concat(v2.apellido_paterno, ' ', v2.apellido_materno, ' ', v2.nombre) as valuador,
            a.id_avaluo, ev.id_estado_visita, ev.estado_visita
     from visita v
     left join valuador v2 on v.id_valuador = v2.id_valuador
     left join avaluo a on v.id_avaluo = a.id_avaluo
     left join propiedad p on a.id_propiedad = p.id_propiedad
     left join estado_visita ev on v.id_estado_visita = ev.id_estado_visita
            where id_visita=:id";
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
        $sql = "INSERT INTO visita (fecha_visita, id_estado_visita, id_avaluo, id_valuador) 
        VALUES (:fecha_visita, :id_estado_visita, :id_avaluo, :id_valuador)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":fecha_visita", $data['fecha_visita'], PDO::PARAM_STR);
        $st->bindParam(":id_estado_visita", $data['id_estado_visita'], PDO::PARAM_INT);
        $st->bindParam(":id_avaluo", $data['id_avaluo'], PDO::PARAM_INT);
        $st->bindParam(":id_valuador", $data['id_valuador'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM visita WHERE id_visita=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE visita SET fecha_visita =:fecha_visita, id_estado_visita =:id_estado_visita, 
        id_avaluo =:id_avaluo, id_valuador =:id_valuador
                where id_visita =:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":fecha_visita", $data['fecha_visita'], PDO::PARAM_STR);
        $st->bindParam(":id_estado_visita", $data['id_estado_visita'], PDO::PARAM_INT);
        $st->bindParam(":id_avaluo", $data['id_avaluo'], PDO::PARAM_INT);
        $st->bindParam(":id_valuador", $data['id_valuador'], PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
}

$visita = new Visita;
?>