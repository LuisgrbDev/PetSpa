<?php

class controllerUsers {

    public function save($data) {
        try {         
           
            $modelUsers = new modelUsers();
            return $modelUsers->save($data);

        } catch (PDOException $e) {
            return false;
        }
    }

}