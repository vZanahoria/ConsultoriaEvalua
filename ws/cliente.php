<?php 
header('Content-Type: application/json; charset=utf-8');
include_once(__DIR__.'/../admin/controllers/sistema.php');
include_once(__DIR__.'/../admin/controllers/cliente.php');
$accion=$_SERVER["REQUEST_METHOD"];
$id=isset($_GET["id"])?$_GET["id"]:null;
switch ($accion){
    case "DELETE":
        $data['mensaje']='No existe el cliente';
        if(!is_null($id)){
            $contador=$cliente->delete($id);
            if($contador==1)
                $data['mensaje']='Se elimino el cliente';
        }
        break;
    case "POST":
        $data=array();
        $data = $_POST['data'];
        if(is_null($id)){
            $cantidad = $cliente->new($data);
            if($cantidad!=0)
                $data['mensaje']='Se inserto el cliente';
            else
                $data['mensaje']='Ocurrio un error';
        }else{
            $cantidad=$cliente->edit($id,$data);
            if($cantidad!=0)
                $data['mensaje']='Se modifico el cliente';
            else
                $data['mensaje']='Ocurrio un error';
        }
        break;
    case "GET":
    default:  
    if(is_null($id))
        $data=$cliente->get(); 
    else
        $data=$cliente->get($id);
}
$data=json_encode($data);
echo $data;