<?php
namespace Ciamax\Entity;

use Util\Authentication;
use Util\DatabaseTable;

class User {
    public $id;
    public $name;
    public $email;
    public $password;
    public $img;
    public $role;
    public function __construct(private ?DatabaseTable $memberTable){

    }
    public function getRole(){
        return $this->role;
    }
    public function getRoleName(){
        return Authentication::describeRole($this->role);
    }

    public function changeInfo($key,$value){

    }
    public function isMember(){
        $members = $this->memberTable->find('userId',$this->id);
        if(count($members)==0){
            return false;
        }else{
            return true;
        }
    }
    public function getMember(){
        $members = $this->memberTable->find('userId',$this->id);
        if(count($members)==0){
            return null;
        }else{
            return $members[0];
        }
    }
    
}