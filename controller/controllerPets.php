<?php

include_once("../model/modelPets.php");

class controllerPets {

    public function save($data) {
        try {         
            $modelPets = new modelPets();
            return $modelPets->save($data);
        } catch (PDOException $e) {
            return false;
        }
    }


    public function listAll() {
        try {

            $modelPets = new modelPets();
            return $modelPets->listAll();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function searchById($id) {
        try {
            
            $modelPets = new modelPets();
            return $modelPets->searchById($id);

        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id) {
        try {
            // Validando se o id é um número inteiro
            if (!is_numeric($id) || $id <= 0) {
                throw new Exception("Invalid ID");
            }
    
            $modelPets = new modelPets();
            return $modelPets->delete($id);
    
        } catch (Exception $e) {
            // Log de erro
            error_log($e->getMessage());
            return false;
        }
    }
    

    public function update($id, $data) {
        try {
            
            $modelPets = new modelPets();
            return $modelPets->update($id, $data);

        } catch (PDOException $e) {
            return false;
        }
    }
       

}