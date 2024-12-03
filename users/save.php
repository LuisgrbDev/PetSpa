<?php

require_once("../controller/controllerUsers.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados JSON da requisição
    $data = json_decode(file_get_contents("php://input"), true);

    // Instancia o controller
    $controllerUsers = new controllerUsers();

    // Chama o método save
    $save = $controllerUsers->save($data);

    // Retorna uma resposta em JSON
    if ($save) {
        $msg = array("msg" => "User created successfully.");
        echo json_encode($msg);
    } else {
        $msg = array("msg" => "Error, User was not created");
        echo json_encode($msg);
    }

} else {
    // Se o método não for POST, retorna 405
    header("HTTP/1.1 405 Method Not Allowed");
    // $msg = array("msg" => "Method Not Allowed");
    // echo json_encode($msg);
}

