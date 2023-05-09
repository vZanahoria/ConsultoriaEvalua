<?php
session_start();
require_once('config.php');
class Sistema{
    var $db = null;
    public function db(){
        $dsn = DBDRIVER . ':host=' . DBHOST .';dbname=' . DBNAME . ';port=' . DBPORT;
        $this -> db = new PDO($dsn, DBUSER, DBPASS);
    }

    public function flash($color, $msg){
        include('views/flash.php');
    }

    public function login($correo, $contrasena){
        if(!is_null($contrasena)){
            if(strlen($contrasena)>0){
                $contrasena = md5($contrasena);
                $this->db();
                $sql = "SELECT id_usuario, correo FROM usuario where correo=:correo AND contrasena=:contrasena";
                $st=$this->db->prepare($sql);
                $st->bindParam(":correo", $correo, PDO::PARAM_STR);
                $st->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
                $st->execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
                if (isset($data[0])) {
                    $data = $data[0];
                    $_SESSION = $data;
                    $_SESSION['roles'] = $this->getRoles($correo);
                    $_SESSION['privilegios'] = $this->getPrivilegios($correo);
                    $_SESSION['validado'] = true;
                    return true;
                }
            }
        }
        return false;
    }

    public function validateEmail($correo){
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public function getRoles($correo)
    {
        $roles = array();
        if ($this->validateEmail($correo)) {
            $this->db();
            $sql = "SELECT r.rol 
            FROM usuario AS u 
            join usuario_rol AS ur on u.id_usuario=ur.id_usuario 
            join rol AS r on ur.id_rol=r.id_rol 
            WHERE u.correo=:correo";
            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $rol) {
                array_push($roles, $rol['rol']);
            }
        }
        return $roles;
    }

    public function getPrivilegios($correo)
    {
        $privilegios = array();
        if ($this->validateEmail($correo)) {
            $this->db();
            $sql = "SELECT p.privilegio FROM usuario as u join usuario_rol as ur on u.id_usuario=ur.id_usuario 
            join rol as r on ur.id_rol=r.id_rol 
            join rol_privilegio as rp on r.id_rol=rp.id_rol
            join privilegio as p on rp.id_privilegio=p.id_privilegio 
            where u.correo=:correo";
            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $privilegio) {
                array_push($privilegios, $privilegio['privilegio']);
            }
        }
        return $privilegios;
    }
    public function validateRol($rol)
    {
        if (isset($_SESSION['validado'])) {
            if ($_SESSION['validado'] = true) {
                if (isset($_SESSION['roles'])) {
                    if (!in_array($rol, $_SESSION['roles'])) {
                        $this->killApp('No tienes el rol adecuado.');
                    }
                } else {
                    $this->killApp('No tienes roles asignados.');
                }
            } else {
                $this->killApp('No estas validado.');
            }
        } else {
            $this->killApp('No te has logeado.');
        }
    }
    public function validatePrivilegio($privilegio)
    {
        if (isset($_SESSION['validado'])) {
            if ($_SESSION['validado'] = true) {
                if (isset($_SESSION['privilegios'])) {
                    if (!in_array($privilegio, $_SESSION['privilegios'])) {
                        $this->killApp('No tienes el privilegio adecuado.');
                    }
                } else {
                    $this->killApp('No tienes privilegios asignados.');
                }
            } else {
                $this->killApp('No estas validado.');
            }
        } else {
            $this->killApp('No te has logeado.');
        }
    }
    public function killApp($msg)
    {
        ob_end_clean();
        include("views/header_error.php");
        $this->flash('danger', $msg);
        include("views/footer_error.php");
        die();
    }

}
$sistema = new Sistema();
?>