<?php
namespace Ciamax\Entity;
class Store {
    public $id;
    public $name;
    public $description;
    public $price;
    public $userId;
    public $no_of_day;
    public function __construct(private \Util\DatabaseTable $userTable){

    }

    public function getOwner(){
        return $this->userTable->find("id", $this->userId)[0];
    }
   
}