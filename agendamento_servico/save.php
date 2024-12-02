<?php
 
 require_once("../controller/controllerAgendamento_servico.php");
 require_once("../model/modelAgendamento_servico.php");
  
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $controllerAgendamento = new controllerAgendamento_servico();
    $save = $controllerAgendamento->save($data);

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