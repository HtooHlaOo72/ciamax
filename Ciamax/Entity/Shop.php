<?php
namespace \Ciamax\Entity;
class Shop {
    public $id;
    public $username;
    public $email;
    public $password;
    public $role;
    public function __construct(private \Util\DatabaseTable $dishTable,private \Util\DatabaseTable $packageTable){

    }

    public function getDishes(){
        return $this->dishTable->findAll();
    }
   
}