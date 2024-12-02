<?php

class controllerServico{

    public function save($data){
        try{
            $modelServico = new modelServico();
            return $modelServico->save($data);
        }catch(PDOException $e){
            return false;
        }
    }

    public function listAll(){
        try{
            $modelServico = new modelServico();
            return $modelServico->listAll();
        }catch(PDOException $e){
            return false;
        }
    }

    public function searchById($id){
        try{
            $modelServico = new modelServico();
            return $modelServico->searchById($id);

        }catch(PDOException $e){
            return false;
        }
    }

    public function update($id, $data){
        try{
            $modelServico = new modelServico();
            return $modelServico->update($id, $data);
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id) {
        try {

            $modelServico = new  modelServico();
            return $modelServico->delete($id);

        } catch (PDOException $e) {
            return false;
        }
    }
}




?>