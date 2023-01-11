<?php
namespace \Ciamax\Controllers;
use \Util\DatabaseTable;
class User {
    public function __construct(private $userTable){

    }
    public function list(){
        $users = $this->userTable->findAll();
        return $users;
    }
}