<?php
 
 require_once("../controller/ControllerEspecie.php");
 require_once("../model/modelEspecie.php");


if($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $query = $_SERVER["QUERY_STRING"];
    parse_str($query, $params);
    $id = $params["id"];

    $ControllerEspecie = new ControllerEspecie();
    $delete = $ControllerEspecie->delete($id);

    if ($delete) {
        $msg = array("msg" => "Especie excluida com sucesso");
        echo json_encode($msg);
    } else {
        $msg = array("msg" => "Especie nao pode ser excluido");
        echo json_encode($msg);
    }

    
} else {
    header("HTTP/1.1 405 Method Not Allowed");
}