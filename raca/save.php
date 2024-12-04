<?php
 
 require_once("../controller/ControllerRaca.php");
 require_once("../model/modelRaca.php");
  
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $ControllerRaca = new ControllerRaca();
    $save = $ControllerRaca->save($data);

    if($save) {
        $msg = array("msg" => "Raça cadastrada com sucesso");
        echo json_encode($msg);
    } else {
        $msg = array("msg" => "Raça, não pode ser cadastrada");
        echo json_encode($msg);
    }

} else {
    header("HTTP/1.1 405 Method Not Allowed");
}