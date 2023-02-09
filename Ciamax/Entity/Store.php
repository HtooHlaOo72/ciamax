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
    
    public function __construct(private DatabaseTable $userTable,private ?DatabaseTable $memberTable,private ?DatabaseTable $menutable){

    }

    public function getOwner(){
        return $this->userTable->find("id", $this->userId)[0];
    }
    public function getMembers(){
        return $this->memberTable->find('storeId', $this->id);
    }
    public function getMenus(){

    }
    public function findMemberHistory($id){

    }
    public function addMenu(){

    }
    public function deleteMenu($id){

    }
    public function updateMenu(){

    }
    public function TotalMembers():int {
        return count($this->memberTable->find('storeId', $this->id));
    }
    
}