<?php
namespace Ciamax\Entity;
class User {
    public $id;
    public $name;
    public $email;
    public $password;
    public $role;
    public function __construct(){

    }
    public function getRole(){
        return $this->role;
    }

    
}