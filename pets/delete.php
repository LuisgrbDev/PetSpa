<?php
require_once("../controller/controllerPets.php");
require_once("../model/modelPets.php");

if($_SERVER["REQUEST_METHOD"] == "DELETE") {

    // Pega a query string
    $query = $_SERVER["QUERY_STRING"];
    parse_str($query, $params);

    if (isset($params["id"])) {
        $id = $params["id"];

        // Instancia o controller
        $controllerPets = new controllerPets();
        $delete = $controllerPets->delete($id);

        if($delete) {
            $msg = array("msg" => "Product has been deleted successfully.");
            echo json_encode($msg);
        } else {
            $msg = array("msg" => "Error, Product could not be deleted.");
            echo json_encode($msg);
        }
    } else {
        $msg = array("msg" => "No ID provided.");
        echo json_encode($msg);
    }

} else {
    header("HTTP/1.1 405 Method Not Allowed");
}
