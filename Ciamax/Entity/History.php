<?php
namespace Ciamax\Entity;

use Util\DatabaseTable;
class History{
    public $id;
    public $memberId;

    public $menuId;

    public $date;

    public $status;
    public $type;
    public function __construct(private DatabaseTable $memberTable,private DatabaseTable $menuTable){

    }
    public function getMenu(){
        $menus = $this->menuTable->find("id",$this->menuId);
        if(count($menus)==0){
            return null;
        }else{
            return $menus[0];
        }
    }
    public function toArray():array {
        return [
            "id"=>$this->id,
            "memberId"=>$this->memberId,
            "menuId"=>$this->menuId,
            "date"=>$this->date,
            "status"=>$this->status,
            "type"=>$this->type,
        ];
    }
}