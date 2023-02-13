<?php
namespace Ciamax\Entity;
use Util\DatabaseTable;
class Store {
    public $id;
    public $name;
    public $ph_no;
    public $img;
    public $qr_img;
    public $userId;
    
    public function __construct(private DatabaseTable $userTable,private ?DatabaseTable $memberTable,private ?DatabaseTable $menutable,private ?DatabaseTable $historyTable){

    }

    public function getOwner(){
        return $this->userTable->find("id", $this->userId)[0];
    }
    public function getMembers(){
        return $this->memberTable->find('storeId', $this->id);
    }
    public function getMenus(){
        return $this->menutable->find('storeId',$this->id);
    }
    public function getMemberHistory($id){
        return $this->historyTable->find('memberId',$id);
    }
    
    public function TotalMembers():int {
        return count($this->memberTable->find('storeId', $this->id));
    }
    
}