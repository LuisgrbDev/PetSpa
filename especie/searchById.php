<?php

require_once("../controller/ControllerEspecie.php");
 require_once("../model/modelEspecie.php");

if($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET["id"];

    $ControllerEspecie = new ControllerEspecie();
    $search = $ControllerEspecie->searchById($id);

    if($search) {
        $msg = array("Especie" => $search);
        echo json_encode($msg);
    } else {
        $msg = array("Especie" => [], "msg" => "Especie não definida");
        echo json_encode($msg);
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
}