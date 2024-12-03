<?php

require_once("../services/connectionDB.php");


class modelRaca{
    public function save($data){
        try {
            // Verifique se $data é um array
            if (!is_array($data)) {
                throw new Exception("Os dados fornecidos não são um array.");
            }
        
            $raca = htmlspecialchars($data["raca"], ENT_NOQUOTES);
            $id_especie = filter_var($data["id_especie"],FILTER_SANITIZE_NUMBER_INT);
            
            
        
    
            $conn = connectionDB::connect();
            $save = $conn->prepare("INSERT INTO raca(raca, id_especie) VALUES (:raca,:id_especie)");
            $save->bindParam(":raca", $raca);
            $save->bindParam(":id_especie",$id_especie);
    
            $save->execute();
        
            return true;
        } catch (PDOException $e) {
            return false;
        } catch (Exception $e) {
            echo $e;
            return false;
        }

    }



    public function listAll(){
        try{
            $conn = connectionDB::connect();
            $list = $conn->query("SELECT * FROM raca");  
            $result = $list->fetchAll(PDO::FETCH_ASSOC);
           
            return $result;
        }catch(PDOException $e){
           
            return false;
        }
    }

    
    public function searchById($id){
        try{
            $id =  filter_var($id,FILTER_SANITIZE_NUMBER_INT);
            $conn = connectionDB::connect();
            $prepare = $conn->prepare("SELECT * FROM raca WHERE id = :id");
            $prepare->bindParam(":id",$id);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

        
           return $result;
        }catch(PDOException $e){
            return false;
        }
    }

    
    public function update($id, $data){
        try{
            
            $id =  filter_var($id,FILTER_SANITIZE_NUMBER_INT);
            $id_especie =  filter_var($data["id_especie"],FILTER_SANITIZE_NUMBER_INT);
            $raca = htmlspecialchars($data["raca"], ENT_NOQUOTES);
            $conn = connectionDB::connect();
            $update = $conn->prepare("UPDATE raca SET raca = :raca, id_especie = :id_especie WHERE id = :id");
            $update->bindParam(":id", $id);
            $update->bindParam(":raca", $raca);
            $update->bindParam(":id_especie",$id_especie);
            $update->execute();

                  return true;
        }catch(PDOException $e){
            //echo $e;
            return false;
        }

        
    }

    public function delete($id){
        try{
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

            $conn = connectionDB::connect();
            $delete = $conn->prepare("DELETE FROM raca  WHERE id = :id");
            $delete->bindParam(":id", $id);
            $delete->execute();
    
            
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

}





?>