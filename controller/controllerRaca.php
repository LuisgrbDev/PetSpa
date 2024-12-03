<?php

class ControllerRaca{

    public function save($data){
        try{
            $modelRaca = new modelRaca();
            return $modelRaca->save($data);
        }catch(PDOException $e){
            return false;
        }
    }

    public function listAll(){
        try{
            $modelRaca = new modelRaca();
            return $modelRaca->listAll();
        }catch(PDOException $e){
            return false;
        }
    }

    public function searchById($id){
        try{
            $modelRaca = new modelRaca();
            return $modelRaca->searchById($id);

        }catch(PDOException $e){
            return false;
        }
    }

    public function update($id, $data){
        try{
            $modelRaca = new modelRaca();
            return $modelRaca->update($id, $data);
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id) {
        try {

            $modelRaca = new  modelRaca();
            return $modelRaca->delete($id);

        } catch (PDOException $e) {
            return false;
        }
    }
}




?>