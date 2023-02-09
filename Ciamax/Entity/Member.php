<?php
namespace Ciamax\Entity;

use Util\DatabaseTable;

class Member extends User {
    public $id;
    public $left_times;
    public $is_paid;
    public $start_date;

    public $roll_no;
    public $userId;
    public $storeId;

    public function __construct(private DatabaseTable $userTable){

    }
    
    public function getHistory(){

    }

    public function getRemainingDays(){

    }
    
    public function getStore(){

    }
    public function getUser(){
        return $this->userTable->find("id", $this->userId)[0];
    }
}