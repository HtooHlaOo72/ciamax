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
    public function __construct(private ?DatabaseTable $memberTable,private ?DatabaseTable $historyTable,private ?DatabaseTable $requestTable){

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
    public function checkMembership(){
        $member = null;
        $members = $this->memberTable->find("userId",$this->id);
        if(count($members)>0){
            $member = $members[0];
        }else{
            return false;
        }
        if($member->left_times<=0){
            $this->historyTable->delete("memberId",$member->id);//clear history related to member
            $this->memberTable->delete("id",$member->id);
            return false;
        }
        return true;
    }
    public function toArrray(){
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "email"=>$this->email,
            "password"=>$this->password,
            "role"=>$this->role,
            "img"=>$this->img,
        ];
    }
}