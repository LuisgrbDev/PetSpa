<?php

include_once("../services/connectionDB.php");

class modelPets {

    public function save($data) {
        try {
            // Sanitizando os dados de entrada
            $nome = htmlspecialchars($data["nome"], ENT_NOQUOTES);
            $sexo = htmlspecialchars($data["sexo"], ENT_NOQUOTES);
            $nascimento = htmlspecialchars($data["nascimento"], ENT_NOQUOTES);
            $castrado = htmlspecialchars($data["castrado"], ENT_NOQUOTES);

            // Conectando ao banco de dados
            $conn = connectionDB::connect();

            // Preparando a consulta SQL
            $save = $conn->prepare("INSERT INTO pets (nome, sexo, nascimento, castrado) 
                                    VALUES (:nome, :sexo, :nascimento, :castrado)");
            $save->bindParam(":nome", $nome);
            $save->bindParam(":sexo", $sexo);
            $save->bindParam(":nascimento", $nascimento);
            $save->bindParam(":castrado", $castrado);
            $save->execute();

            return true;

        } catch (PDOException $e) {
            return false;
        }
    }


    public function listAll() {
        try{

            $conn = connectionDB::connect();

            $list = $conn->query("SELECT* FROM pets");
            $result = $list->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function searchById($id) {
        try {
            // Validando o ID como inteiro
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id === false) {
                return false; // Retorna falso se o ID não for um número inteiro válido
            }
    
            // Conectando ao banco de dados
            $conn = connectionDB::connect();
            
            // Preparando e executando a consulta
            $search = $conn->prepare("SELECT * FROM user WHERE id = :id");
            $search->bindParam(":id", $id, PDO::PARAM_INT); // Garantir o tipo do parâmetro
            $search->execute();
            
            // Buscando o resultado
            $result = $search->fetch(PDO::FETCH_ASSOC);
    
            return $result ? $result : false; // Retorna o resultado ou falso se não encontrado
        } catch (PDOException $e) {
            return false; // Retorna falso em caso de erro no banco de dados
        }
    }
    

    public function delete($id) {
        try {
            // Conectar ao banco de dados
            $conn = connectionDB::connect();
            
            // Preparar SQL
            $delete = $conn->prepare("DELETE FROM pets WHERE id = :id");
            $delete->bindParam(":id", $id, PDO::PARAM_INT); // Parametro explicitamente como inteiro
            $delete->execute();
    
            return true;
    
        } catch (PDOException $e) {
            // Log do erro
            error_log($e->getMessage());
            return false;
        }
    }
    

    public function update($id, $data) {
        try {
            // Sanitizando os dados de entrada
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
            $nome_completo = htmlspecialchars($data["nome"], ENT_NOQUOTES);
            $sexo = htmlspecialchars($data["sexo"], ENT_NOQUOTES);
            $nascimento = htmlspecialchars($data["nascimento"], ENT_NOQUOTES);
            $castrado = htmlspecialchars($data["castrado"], ENT_NOQUOTES);
            
            // Conectando ao banco de dados
            $conn = connectionDB::connect();
            
            // Preparando a consulta SQL para atualizar os dados
            $update = $conn->prepare("UPDATE pets SET nome = :nome, sexo = :sexo, nascimento = :nascimento, castrado = :castrado WHERE id = :id");
            
            // Usando a variável correta no bindParam
            $update->bindParam(':nome', $nome_completo);
            $update->bindParam(':sexo', $sexo);
            $update->bindParam(':nascimento', $nascimento);
            $update->bindParam(':castrado', $castrado);
            $update->bindParam(':id', $id, PDO::PARAM_INT); // Definindo explicitamente o tipo de dado como inteiro
            
            $update->execute();
            
            return true; // Retorna true se a atualização for bem-sucedida
        } catch (PDOException $e) {
            // Exibindo o erro para depuração
            echo $e;
            return false; // Retorna false se houver erro
        }
    }

}
