<?php

class controllerUserPets{

    public function save($data){
        try{

            $modelUserPets = new modelUserPets();
            return $modelUserPets->save($data);

        } catch(PDOException $e) {
            return false;
        }
    }

    public function listAll(){
        try{

            $modelUserPets = new modelUserPets();
            return $modelUserPets->listAll();

        } catch(PDOException $e) {
            return false;
        }
    }

    public function searchById($id){
        try{

            $modelUserPets = new modelUserPets();
            return $modelUserPets->searchById($id);

        } catch(PDOException $e) {
            return false;
        }
    }

    public function update($id, $data){
        try{

            $modelUserPets = new modelUserPets();
            return $modelUserPets->update($id, $data);

        }catch(PDOException $e) {
            return false;
        }
    }

    public function delete($id) {
        try {
            
            $modelUserPets= new  modelUserPets();
            return $modelUserPets->delete($id);

        } catch (PDOException $e) {
            return false;
        }
    }
}
