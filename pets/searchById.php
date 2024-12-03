<?php

require_once("../model/modelPets.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Verificando se o parâmetro 'id' foi passado na URL
    $id = $_GET["id"] ?? null; // Usando operador de coalescência nula para verificar se o 'id' existe

    if ($id) {
        // Instanciando o modelo e realizando a busca
        $modelPets = new modelPets();
        $search = $modelPets->searchById($id);
        
        // Respondendo conforme o resultado da busca
        if ($search) {
            echo json_encode(["user" => $search]);
        } else {
            echo json_encode(["user" => [], "msg" => "User not found."]);
        }
    } else {
        // Caso o parâmetro 'id' não seja fornecido
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(["msg" => "Missing 'id' parameter."]);
    }

} else {
    // Caso o método HTTP não seja GET
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode(["msg" => "Method Not Allowed"]);
}

