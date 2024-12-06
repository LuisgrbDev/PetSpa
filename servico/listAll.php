<?php
 
require_once("../controller/controllerServico.php");
require_once("../model/modelServico.php");
 
if($_SERVER["REQUEST_METHOD"] == "GET"){
 
    $controllerServico = new controllerServico();
    $listAll = $controllerServico->listAll();
    
    if($listAll){
        $msg = array("Servicos" => $listAll);
        echo json_encode($msg);
    }else {
        $msg = array("Servicos" => []);
        echo json_encode($msg);
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
}
 
 
 
?>