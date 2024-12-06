<?php

require_once("../services/connectionDB.php");


class modelUserPets {
    public function save($data){
        try {
        
            $idPet = filter_var($data["idPet"], FILTER_SANITIZE_NUMBER_INT);
            $idUser = filter_var($data["idUser"], FILTER_SANITIZE_NUMBER_INT);
            
        
            $conn = connectionDB::connect();
            $save = $conn->prepare("INSERT INTO user_pet(idPet, idUser) VALUES (:idPet,:idUser)");
            $save->bindParam(":idPet",$idPet);
            $save->bindParam(":idUser", $idUser);
            $save->execute();
        
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }

    }



    public function listAll(){
        try{
            $conn = connectionDB::connect();
            $list = $conn->query("SELECT * FROM user_pet");
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
            $prepare = $conn->prepare("SELECT  
            user.nome_completo AS Usuario,
            pets.nome AS Pets FROM user_pet
            INNER JOIN User ON user_pet.iduser = user.id
            INNER JOIN Pets ON user_pet.idpet = pets.id
            WHERE iduser = :id ");
            $prepare->bindParam(":id",$id);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

        
           return $result;
        } catch(PDOException $e){
            return false;
        }
    }

    
    public function update($id, $data){
        try{

            return true;
        } catch(PDOException $e){
            return false;
        }

        
    }

    public function delete($id){
        try{
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

            $conn = connectionDB::connect();
            $delete = $conn->prepare("DELETE FROM user_pet WHERE id = :id");
            $delete->bindParam(":id", $id);
            $delete->execute();
    
            return true;
        }catch(PDOException $e){
           
            return false;
        }
    }

}
