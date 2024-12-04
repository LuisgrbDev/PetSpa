<?php
 
 require_once("../controller/ControllerRaca.php");
 require_once("../model/modelRaca.php");
 
if($_SERVER["REQUEST_METHOD"] == "GET"){
 
    $ControllerRaca = new ControllerRaca();
    $listAll = $ControllerRaca->listAll();
    
    if($listAll){
        $msg = array("Raças" => $listAll);
        echo json_encode($msg);
    }else {
        $msg = array("Racas" => []);
        echo json_encode($msg);
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
}
 
 
 
?>