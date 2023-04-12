<?php
require_once("sistema.php");
class EstadoPago extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from estado_pago";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from estado_pago where id_estado_pago=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function new ($data)
    {
        $this->db();
        $sql = "INSERT INTO estado_pago (estado_pago) VALUES (:estado_pago)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":estado_pago", $data['estado_pago'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE estado_pago SET estado_pago = :estado_pago where id_estado_pago= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":estado_pago", $data['estado_pago'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM estado_pago WHERE id_estado_pago=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$estadopago= new EstadoPago;
?>