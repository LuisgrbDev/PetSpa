<?php

require_once("../controller/controllerUserPets.php");
require_once("../model/modelUserPets.php");

if($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET["id"];

    $controllerUserPets = new controllerUserPets();
    $search = $controllerUserPets->searchById($id);

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