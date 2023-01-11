<?php
namespace \Ciamax\Entity;
class Student {
    public $id;
    public $username;
    public $email;
    public $password;
    public $role;
    public function __construct(private \Util\DatabaseTable $userTable){

    }

    public function getHistory(){
        
    }
   
}