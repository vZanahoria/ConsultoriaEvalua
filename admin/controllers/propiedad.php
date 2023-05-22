<?php
require_once("sistema.php");
class Propiedad extends Sistema
{

    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select p.id_propiedad, p.ubicacion, p.codigo_postal, l.localidad, tp.tipo_propiedad, cus.clasificacion_uso_suelo,
            cp.conservacion,
            concat(p2.apellido_paterno, ' ', p2.apellido_materno, ' ', p2.nombre) as propietario,
            concat(c.apellido_paterno, ' ', c.apellido_materno, ' ',c.nombre) as cliente
     from propiedad p left join propietario p2 on p2.id_propietario = p.id_propietario
     left join localidad l on p.id_localidad = l.id_localidad
     left join tipo_propiedad tp on p.id_tipo_propiedad = tp.id_tipo_propiedad
     left join conservacion_propiedad cp on p.id_conservacion = cp.id_conservacion
     left join cliente c on p.id_cliente = c.id_cliente
     left join clasificacion_uso_suelo cus on p.id_clasificacion_uso = cus.id_clasificacion_uso";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select select p.id_propiedad, p.ubicacion, p.codigo_postal,l.localidad, tp.tipo_propiedad, cus.clasificacion_uso_suelo,
            cp.conservacion,
            concat(p2.apellido_paterno, ' ', p2.apellido_materno, ' ', p2.nombre) as propietario,
            concat(c.apellido_paterno, ' ', c.apellido_materno, ' ',c.nombre) as cliente
     from propiedad p left join propietario p2 on p2.id_propietario = p.id_propietario
     left join localidad l on p.id_localidad = l.id_localidad
     left join tipo_propiedad tp on p.id_tipo_propiedad = tp.id_tipo_propiedad
     left join conservacion_propiedad cp on p.id_conservacion = cp.id_conservacion
     left join cliente c on p.id_cliente = c.id_cliente
     left join clasificacion_uso_suelo cus on p.id_clasificacion_uso = cus.id_clasificacion_uso
     where id_propiedad=:id";
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
        $sql = "INSERT INTO propiedad (ubicacion, codigo_postal, id_propietario, id_localidad, id_tipo_propiedad, id_conservacion, id_cliente, id_clasificacion_uso) 
        VALUES (:ubicacion, :codigo_postal, :id_propietario, :id_localidad, :id_tipo_propiedad, :id_conservacion, :id_cliente, :id_clasificacion_uso)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":ubicacion", $data['ubicacion'], PDO::PARAM_STR);
        $st->bindParam(":codigo_postal", $data['codigo_postal'], PDO::PARAM_STR);
        $st->bindParam(":id_propietario", $data['id_propietario'], PDO::PARAM_INT);
        $st->bindParam(":id_localidad", $data['id_localidad'], PDO::PARAM_INT);
        $st->bindParam(":id_tipo_propiedad", $data['id_tipo_propiedad'], PDO::PARAM_INT);
        $st->bindParam(":id_conservacion", $data['id_conservacion'], PDO::PARAM_INT);
        $st->bindParam(":id_cliente", $data['id_cliente'], PDO::PARAM_INT);
        $st->bindParam(":id_clasificacion_uso", $data['id_clasificacion_uso'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM propiedad WHERE id_propiedad=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE propiedad SET ubicacion =:ubicacion, codigo_postal =:codigo_postal, id_propietario =:id_propietario,
        id_localidad =:id_localidad, id_tipo_propiedad =:id_tipo_propiedad, id_conservacion =:id_conservacion,
        id_cliente =:id_cliente, id_clasificacion_uso =:id_clasificacion_uso
                where id_propiedad =:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":ubicacion", $data['ubicacion'], PDO::PARAM_STR);
        $st->bindParam(":codigo_postal", $data['codigo_postal'], PDO::PARAM_STR);
        $st->bindParam(":id_propietario", $data['id_propietario'], PDO::PARAM_INT);
        $st->bindParam(":id_localidad", $data['id_localidad'], PDO::PARAM_INT);
        $st->bindParam(":id_tipo_propiedad", $data['id_tipo_propiedad'], PDO::PARAM_INT);
        $st->bindParam(":id_conservacion", $data['id_conservacion'], PDO::PARAM_INT);
        $st->bindParam(":id_cliente", $data['id_cliente'], PDO::PARAM_INT);
        $st->bindParam(":id_clasificacion_uso", $data['id_clasificacion_uso'], PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
}

$propiedad = new Propiedad;
?>