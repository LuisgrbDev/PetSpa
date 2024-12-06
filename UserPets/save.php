<?php
 
 require_once("../controller/controllerUserPets.php");
 require_once("../model/modelUserPets.php");
  
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $controllerUserPets = new controllerUserPets();
    $save = $controllerUserPets->save($data);

    if($save) {
        $msg = array("msg" => "Agendamento realizado com sucesso");
        echo json_encode($msg);
    } else {
        $msg = array("msg" => "Erro, ao realizar agendamento");
        echo json_encode($msg);
    }

} else {
    header("HTTP/1.1 405 Method Not Allowed");
}