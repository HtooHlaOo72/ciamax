<?php
namespace \Ciamax\Entity;
class Admin {
    public $id;
    public $username;
    public $email;
    public $password;
    public $role;
    public function __construct(private \Util\DatabaseTable $userTable,private \Util\DatabaseTable $dishTable,private \Util\DatabaseTable $packageTable,){

    }

    public function getUsers(){
        return $this->userTable->findAll();
    }
   
}