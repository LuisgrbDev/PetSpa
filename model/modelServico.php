<?php

require_once("../services/connectionDB.php");


class modelServico {
    public function save($data){
        try {
            // Verifique se $data é um array
            if (!is_array($data)) {
                throw new Exception("Os dados fornecidos não são um array.");
            }
        
            $tipo_servico = htmlspecialchars($data["tipo_servico"], ENT_NOQUOTES);
            
            $descricao = htmlspecialchars($data["descricao"], ENT_NOQUOTES);
            $preco = filter_var($data["preco"], FILTER_SANITIZE_NUMBER_FLOAT);
    
            $conn = connectionDB::connect();
            $save = $conn->prepare("INSERT INTO servico(tipo_servico, descricao, preco) VALUES (:tipo_servico, :descricao, :preco)");
            $save->bindParam(":tipo_servico", $tipo_servico);
            $save->bindParam(":descricao", $descricao);
            $save->bindParam(":preco", $preco);
    
            $save->execute();
        
            return true;
        } catch (PDOException $e) {
            return false;
        } catch (Exception $e) {
            // Captura exceções gerais
            return false;
        }

    }



    public function listAll(){
        try{
            $conn = connectionDB::connect();
            $list = $conn->query("SELECT * FROM servico");
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
            $prepare = $conn->prepare("SELECT * FROM servico WHERE id = :id");
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
            $tipo_servico = filter_var($data["tipo_servico"], FILTER_SANITIZE_NUMBER_INT);
            $descricao = htmlspecialchars($data["descricao"], ENT_NOQUOTES);
            $preco = filter_var($data["preco"], FILTER_SANITIZE_NUMBER_FLOAT);

            $conn = connectionDB::connect();
            $update = $conn->prepare("UPDATE servico SET tipo_servico = :tipo_servico, descricao = :descricao, preco = :preco WHERE id = :id");
            $update->bindParam(":id", $id);
            $update->bindParam(":tipo_servico", $tipo_servico);
            $update->bindParam(":descricao",$descricao);
            $update->bindParam(":preco",$preco);
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
            $delete = $conn->prepare("DELETE FROM servico  WHERE id = :id");
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