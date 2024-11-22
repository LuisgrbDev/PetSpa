<?php

require_once("../services/connectionDB.php");


class modelAgendamento {
    public function save($data){
        try{
            $id_servico = filter_var($data["id_servico"], FILTER_SANITIZE_NUMBER_INT);
             $data = htmlspecialchars($data["data"],ENT_NOQUOTES);   
             $hora = htmlspecialchars($data["hora"],ENT_NOQUOTES);
             $taxi = filter_var($data["taxi"],FILTER_VALIDATE_BOOLEAN);
            
             $conn = connectionDB::connect();
             $save = $conn->prepare("INSERT INTO agendamento(id_servico,data,hora,taxi) VALUES (:id_servico,:data,:hora,:taxi)");
             $save->bindParam(":id_servico",$id_servico);
             $save->bindParam(":data",$data);
             $save->bindParam(":hora",$hora);
             $save->bindParam(":taxi",$taxi);
             $save->execute();
             
            return true;
        }catch(PDOException $e){
            return false;
        }

    }



    public function listAll(){
        try{
            $conn = connectionDB::connect();
            $list = $conn->query("SELECT * FROM agendamento");
            $result = $list->fetchAll(PDO::FETCH_ASSOC);
           
            return $result;
        }catch(PDOException $e){
            return false;
        }
    }

    
    public function searchById(){
        try{
           return true;
        }catch(PDOException $e){
            return false;
        }
    }

    
    public function update(){
        try{
      
                  return true;
        }catch(PDOException $e){
            return false;
        }

        
    }

    public function delete(){
        try{
            
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

}





?>