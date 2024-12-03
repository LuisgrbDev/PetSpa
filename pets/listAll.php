<?php

require_once("../controller/controllerPets.php");
require_once("../model/modelPets.php");

if($_SERVER["REQUEST_METHOD"] ==  "GET") {

    $controllerPets = new modelPets();
    $list = $controllerPets->listAll();

    if($list) {
        $msg = array("users" => $list);
        echo json_encode($msg);
    } else {
        $msg = array("users" => []);
        echo json_encode($msg);
    }

} else {
    header("HTTP/1.1 405 Method Not Allowes");
}