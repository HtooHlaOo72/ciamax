<?php
namespace Ciamax\Entity;
class User {
    public $id;
    public $username;
    public $email;
    public $password;
    public $role;
    public function __construct(private \Util\DatabaseTable $dishTable,private \Util\DatabaseTable $packageTable,private \Util\DatabaseTable $shopTable){

    }

   
}