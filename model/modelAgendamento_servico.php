<?php

require_once("../services/connectionDB.php");


class modelAgendamento_servico {
    public function save($data){
        try {
        
            $id_agendamento = filter_var($data["id_agendamento"], FILTER_SANITIZE_NUMBER_INT);
            $id_servico = filter_var($data["id_servico"], FILTER_SANITIZE_NUMBER_INT);
            $id_pet = filter_var($data["id_pet"], FILTER_SANITIZE_NUMBER_INT);
        
            $conn = connectionDB::connect();
            $save = $conn->prepare("INSERT INTO agendamento_servico(id_agendamento, id_servico, id_pet) VALUES (:id_agendamento,:id_servico,:id_pet)");
            $save->bindParam(":id_agendamento",$id_agendamento);
            $save->bindParam(":id_servico", $id_servico);
            $save->bindParam(":id_pet",$id_pet);
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
            $list = $conn->query("SELECT * FROM agendamento_servico");
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
            $prepare = $conn->prepare("SELECT  servico.tipo_servico AS Servico,
             servico.descricao AS Descricao, 
             servico.preco, 
             agendamento.data AS Data, 
             agendamento.hora,
              agendamento.taxi,
              pets.nome, pets.sexo FROM servico INNER JOIN agendamento ON agendamento.id_servico = servico.id WHERE agendamento.id_servico = :id;");
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
            $id_servico = filter_var($data["id_servico"], FILTER_SANITIZE_NUMBER_INT);
            $data_agendamento = htmlspecialchars($data["data"], ENT_NOQUOTES);
            $hora = htmlspecialchars($data["hora"], ENT_NOQUOTES);
            $taxi = filter_var($data["taxi"], FILTER_VALIDATE_BOOLEAN);

            $conn = connectionDB::connect();
            $update = $conn->prepare("UPDATE agendamento SET id_servico = :id_servico, data = :data_agendamento, hora = :hora, taxi = :taxi WHERE id = :id");
            $update->bindParam(":id", $id);
            $update->bindParam(":id_servico", $id_servico);
            $update->bindParam(":data_agendamento",$data_agendamento);
            $update->bindParam(":hora",$hora);
            $update->bindParam(":taxi",$taxi);
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
            $delete = $conn->prepare("DELETE FROM agendamento  WHERE id = :id");
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