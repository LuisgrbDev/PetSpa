<?php
 
 require_once("../controller/ControllerEspecie.php");
 require_once("../model/modelEspecie.php");
  
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $controllerEspecie = new ControllerEspecie();
    $save = $controllerEspecie->save($data);

    if($save) {
        $msg = array("msg" => "Especie cadastrada com sucesso");
        echo json_encode($msg);
    } else {
        $msg = array("msg" => "Especie, não pode ser cadastrada");
        echo json_encode($msg);
    }

} else {
    header("HTTP/1.1 405 Method Not Allowed");
}