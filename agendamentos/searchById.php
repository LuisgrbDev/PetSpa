<?php

require_once("../controller/controllerAgendamento.php");
require_once("../model/modelAgendamento.php");

if($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET["id"];

    $controllerAgendamento = new controllerAgendamento();
    $search = $controllerAgendamento->searchById($id);

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