<?php

require_once("../controller/controllerAgendamento_servico.php");
require_once("../model/modelAgendamento_servico.php");

if($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET["id"];

    $controllerAgendamento_servico = new controllerAgendamento_servico();
    $search = $controllerAgendamento_servico->searchById($id);

    if($search) {
        $msg = array("Agendamento" => $search);
        echo json_encode($msg);
    } else {
        $msg = array("Agendamento" => [], "msg" => "Category not found");
        echo json_encode($msg);
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
}