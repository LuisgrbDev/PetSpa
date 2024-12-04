<?php

require_once("../controller/ControllerRaca.php");
 require_once("../model/modelRaca.php");

if($_SERVER["REQUEST_METHOD"] == "PUT") {

    $query = $_SERVER["QUERY_STRING"];
    parse_str($query, $params);
    $id = $params["id"];

    $data = json_decode(file_get_contents("php://input"), true);

    $ControllerRaca = new ControllerRaca();
    $update = $ControllerRaca->update($id, $data);

    if ($update) {
        $msg = array("msg" => "Raça alterado com sucesso");
        echo json_encode($msg);
    } else {
        $msg = array("msg" => "Error, Raça nao pode ser atualizado");
        echo json_encode($msg);
    }

} else { 
    header("HTTP/1.1 405 Method Not Allowed");
}