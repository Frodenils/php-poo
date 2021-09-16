<?php
class PersonnagesManager
{
    private $_db;

    public function setDb($db){
        $this->_db = $db;
    }
    public function __construct($db){
        $this->setDb($db);
    }
    public function add(Personnage $perso){
        
    }
    public function delete(Personnage $perso){
        
    }
    public function getOne(int $id){
        
    }
    public function update(Personnage $perso){
        
    }
    public function getList(){
        
    }
}