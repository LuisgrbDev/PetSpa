<?php
 
 require_once("../controller/controllerServico.php");
 require_once("../model/modelServico.php");
  
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $controllerServico = new controllerServico();
    $save = $controllerServico->save($data);

    if($save) {
        $msg = array("msg" => "Cadastro realizado com sucesso");
        echo json_encode($msg);
    } else {
        $msg = array("msg" => "Erro, ao realizar cadastro de Tipo de Servico");
        echo json_encode($msg);
    }

} else {
    header("HTTP/1.1 405 Method Not Allowed");
}