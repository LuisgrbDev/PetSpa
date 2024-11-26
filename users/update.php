<?php

require_once("../controller/controllerUsers.php");
require_once("../model/modelUsers.php");

if ($_SERVER["REQUEST_METHOD"] == "PUT") {

    // Verificando se o parâmetro 'id' foi passado na URL
    if (isset($_GET["id"])) {
        $id = $_GET["id"];  // Usando $_GET para extrair o 'id'

        // Recebendo os dados no formato JSON via PUT
        $data = json_decode(file_get_contents("php://input"), true);

        // Instanciando o controlador e chamando a função de update
        $controllerUsers = new controllerUsers();
        $update = $controllerUsers->update($id, $data);

        if ($update) {
            // Caso a atualização seja bem-sucedida
            $msg = array("msg" => "User has been updated successfully.");
            echo json_encode($msg);
        } else {
            // Caso ocorra um erro na atualização
            $msg = array("msg" => "Error, User was not updated.");
            echo json_encode($msg);
        }

    } else {
        // Caso o parâmetro 'id' não seja fornecido
        header("HTTP/1.1 400 Bad Request");
        $msg = array("msg" => "Missing 'id' parameter.");
        echo json_encode($msg);
    }

} else {
    // Caso o método HTTP não seja PUT
    header("HTTP/1.1 405 Method Not Allowed");
    $msg = array("msg" => "Method Not Allowed");
    echo json_encode($msg);
}
