<?php

class controllerAgendamento_servico{

    public function save($data){
        try{
            $modelAgendamento_servico = new modelAgendamento_servico();
            return $modelAgendamento_servico->save($data);
        }catch(PDOException $e){
            return false;
        }
    }

    public function listAll(){
        try{
            $modelAgendamento_servico= new modelAgendamento_servico();
            return $modelAgendamento_servico->listAll();
        }catch(PDOException $e){
            return false;
        }
    }

    public function searchById($id){
        try{
            $modelAgendamento_servico = new modelAgendamento_servico();
            return $modelAgendamento_servico->searchById($id);

        }catch(PDOException $e){
            return false;
        }
    }

    public function update($id, $data){
        try{
            $modelAgendamento_servico = new modelAgendamento_servico();
            return $modelAgendamento_servico->update($id, $data);
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id) {
        try {

            $modelAgendamento_servico= new  modelAgendamento_servico();
            return $modelAgendamento_servico->delete($id);

        } catch (PDOException $e) {
            return false;
        }
    }
}




?>