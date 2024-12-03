<?php
 
require_once("../controller/controllerAgendamento.php");
require_once("../model/modelAgendamento.php");
 
if($_SERVER["REQUEST_METHOD"] == "GET"){
 
    $controllerAgendamento = new controllerAgendamento();
    $listAll = $controllerAgendamento->listAll();
    
    if($listAll){
        $msg = array("Agendamentos" => $listAll);
        echo json_encode($msg);
    }else {
        $msg = array("Agendamentos" => []);
        echo json_encode($msg);
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
}
 
 
 
?>