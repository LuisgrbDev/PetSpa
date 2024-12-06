<?php
 
require_once("../controller/controllerAgendamento.php");
require_once("../model/modelAgendamento.php");

if($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $query = $_SERVER["QUERY_STRING"];
    parse_str($query, $params);
    $id = $params["id"];

    $controllerAgendamento = new controllerAgendamento();
    $delete = $controllerAgendamento->delete($id);

    if ($delete) {
        $msg = array("msg" => "Agendamento excluido com sucesso");
        echo json_encode($msg);
    } else {
        $msg = array("msg" => "Agendamento nao pode ser excluido");
        echo json_encode($msg);
    }

    
} else {
    header("HTTP/1.1 405 Method Not Allowed");
}