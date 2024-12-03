<?php

include_once("../services/connectionDB.php");

class modelUsers {

    public function save($data) {
        try {
            // Sanitizando os dados de entrada
            $nome_completo = htmlspecialchars($data["nome_completo"], ENT_NOQUOTES);
            $email = htmlspecialchars($data["email"], ENT_NOQUOTES);
            $telefone = htmlspecialchars($data["telefone"], ENT_NOQUOTES);
            $senha = htmlspecialchars($data["senha"], ENT_NOQUOTES);

            // Conectando ao banco de dados
            $conn = connectionDB::connect();

            // Preparando a consulta SQL
            $save = $conn->prepare("INSERT INTO user (nome_completo, email, telefone, senha) 
                                    VALUES (:nome_completo, :email, :telefone, :senha)");
            $save->bindParam(":nome_completo", $nome_completo);
            $save->bindParam(":email", $email);
            $save->bindParam(":telefone", $telefone);
            $save->bindParam(":senha", $senha);
            $save->execute();

            return true;

        } catch (PDOException $e) {
            return false;
        }
    }


    public function listAll() {
        try {

            $conn = connectionDB::connect();

            $list = $conn->query("SELECT * FROM user");
            $result = $list->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function searchById($id) {
        try {
            // Sanitizando a entrada
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    
            // Conectando ao banco de dados
            $conn = connectionDB::connect();
            
            // Preparando e executando a consulta
            $search = $conn->prepare("SELECT * FROM user WHERE id = :id");
            $search->bindParam(":id", $id);
            $search->execute();
            
            // Buscando o resultado
            $result = $search->fetch(PDO::FETCH_ASSOC);
    
            // Retornando o resultado
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id) {
        try {
          
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

            $conn = connectionDB::connect();
            $delete = $conn->prepare("DELETE FROM user WHERE id = :id");
            $delete->bindParam(":id", $id);
            $delete->execute();

            return true;

        } catch (PDOException $e) {
            return false;
        }
    }

    public function update($id, $data) {
        try {
            // Sanitizando os dados de entrada
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
            $nome_completo = htmlspecialchars($data["nome_completo"], ENT_NOQUOTES);
            $email = htmlspecialchars($data["email"], ENT_NOQUOTES);
            $telefone = htmlspecialchars($data["telefone"], ENT_NOQUOTES);
            $senha = htmlspecialchars($data["senha"], ENT_NOQUOTES);
    
            // Conectando ao banco de dados
            $conn = connectionDB::connect();
    
            // Preparando a consulta SQL para atualizar os dados
            $update = $conn->prepare("UPDATE user SET nome_completo = :nome_completo, email = :email, telefone = :telefone, senha = :senha WHERE id = :id");
            $update->bindParam(':nome_completo', $nome_completo);
            $update->bindParam(':email', $email);
            $update->bindParam(':telefone', $telefone);
            $update->bindParam(':senha', $senha);
            $update->bindParam(':id', $id);  // Corrigido: estava faltando o bind do ID
            $update->execute();
    
            return true; // Retorna true se a atualização for bem-sucedida
    
        } catch (PDOException $e) {
            echo $e;
            return false; // Retorna false se houver erro
        }
    }    

}