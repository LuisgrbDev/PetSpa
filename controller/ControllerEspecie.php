<?php

class ControllerEspecie{

    public function save($data){
        try{
            $modelEspecie = new modelEspecie();
            return $modelEspecie->save($data);
        }catch(PDOException $e){
            return false;
        }
    }

    public function listAll(){
        try{
            $modelEspecie = new modelEspecie();
            return $modelEspecie->listAll();
        }catch(PDOException $e){
            return false;
        }
    }

    public function searchById($id){
        try{
            $modelEspecie = new modelEspecie();
            return $modelEspecie->searchById($id);

        }catch(PDOException $e){
            return false;
        }
    }

    public function update($id, $data){
        try{
            $modelEspecie = new modelEspecie();
            return $modelEspecie->update($id, $data);
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id) {
        try {

            $modelEspecie = new  modelEspecie();
            return $modelEspecie->delete($id);

        } catch (PDOException $e) {
            return false;
        }
    }
}




?>