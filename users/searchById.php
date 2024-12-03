<?php

require_once("../model/modelUsers.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Verificando se o parâmetro 'id' foi passado na URL
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        
        // Instanciando o modelo
        $modelUsers = new modelUsers();
        $search = $modelUsers->searchById($id);
        
        if ($search) {
            // Retorna o usuário encontrado
            $msg = array("user" => $search);
            echo json_encode($msg);
        } else {
            // Caso o usuário não seja encontrado
            $msg = array("user" => [], "msg" => "User not found.");
            echo json_encode($msg);
        }
    } else {
        // Caso o parâmetro 'id' não seja fornecido
        header("HTTP/1.1 400 Bad Request");
        $msg = array("msg" => "Missing 'id' parameter.");
        echo json_encode($msg);
    }

} else {
    // Caso o método HTTP não seja GET
    header("HTTP/1.1 405 Method Not Allowed");
    $msg = array("msg" => "Method Not Allowed");
    echo json_encode($msg);
}
