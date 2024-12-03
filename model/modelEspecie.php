<?php

require_once("../services/connectionDB.php");


class modelEspecie {
    public function save($data){
        try {
            // Verifique se $data é um array
            if (!is_array($data)) {
                throw new Exception("Os dados fornecidos não são um array.");
            }
        
            $tipo = htmlspecialchars($data["tipo"], ENT_NOQUOTES);
            
        
    
            $conn = connectionDB::connect();
            $save = $conn->prepare("INSERT INTO especie(tipo) VALUES (:tipo)");
            $save->bindParam(":tipo", $tipo);
    
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
            $list = $conn->query("SELECT * FROM especie");  
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
            $prepare = $conn->prepare("SELECT * FROM especie WHERE id = :id");
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
            $tipo = htmlspecialchars($data["tipo"], ENT_NOQUOTES);
            $conn = connectionDB::connect();
            $update = $conn->prepare("UPDATE especie SET tipo = :tipo WHERE id = :id");
            $update->bindParam(":id", $id);
            $update->bindParam(":tipo", $tipo);
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
            $delete = $conn->prepare("DELETE FROM especie  WHERE id = :id");
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