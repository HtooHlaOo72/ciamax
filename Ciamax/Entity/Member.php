<?php
namespace Ciamax\Entity;
class Member extends User {
    public $id;
    public $left_times;
    public $is_paid;
    public $start_date;

    public $roll_no;
    public $userId;
    public $storeId;

    public function __construct(){

    }
    
    public function getHistory(){

    }

    public function getRemainingDays(){

    }
    
    public function getStore(){

    }
}