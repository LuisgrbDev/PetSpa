<?php

class controllerAgendamento{

    public function save($data){
        try{
            $modelAgendamento = new modelAgendamento();
            return $modelAgendamento->save($data);
        }catch(PDOException $e){
            return false;
        }
    }

    public function listAll(){
        try{
            $modelAgendamento = new modelAgendamento();
            return $modelAgendamento->listAll();
        }catch(PDOException $e){
            return false;
        }
    }

    public function searchById($id){
        try{
            $modelAgendamento = new modelAgendamento();
            return $modelAgendamento->searchById($id);

        }catch(PDOException $e){
            return false;
        }
    }

    public function update($id, $data){
        try{
            $modelAgendamento = new modelAgendamento();
            return $modelAgendamento->update($id, $data);
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id) {
        try {

            $modelAgendamento = new  modelAgendamento();
            return $modelAgendamento->delete($id);

        } catch (PDOException $e) {
            return false;
        }
    }
}




?>