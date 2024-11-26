<?php

require_once("../controller/controllerAgendamento.php");
require_once("../model/modelAgendamento.php");

if($_SERVER["REQUEST_METHOD"] == "PUT") {

    $query = $_SERVER["QUERY_STRING"];
    parse_str($query, $params);
    $id = $params["id"];

    $data = json_decode(file_get_contents("php://input"), true);

    $controllerAgendamento = new controllerAgendamento();
    $update = $controllerAgendamento->update($id, $data);

    if ($update) {
        $msg = array("msg" => "Agendamento alterado com sucesso");
        echo json_encode($msg);
    } else {
        $msg = array("msg" => "Error, agendamento nao pode ser atualizado");
        echo json_encode($msg);
    }

} else { 
    header("HTTP/1.1 405 Method Not Allowed");
}