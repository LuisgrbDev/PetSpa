<?php
 
 require_once("../controller/ControllerEspecie.php");
 require_once("../model/modelEspecie.php");
 
if($_SERVER["REQUEST_METHOD"] == "GET"){
 
    $ControllerEspecie = new ControllerEspecie();
    $listAll = $ControllerEspecie->listAll();
    
    if($listAll){
        $msg = array("Especies" => $listAll);
        echo json_encode($msg);
    }else {
        $msg = array("Especies" => []);
        echo json_encode($msg);
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
}
 
 
 
?>