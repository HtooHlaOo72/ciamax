<?php
namespace Ciamax\Entity;

use Ciamax\Ciamax;
use Exception;
use Util\DatabaseTable;

class Member extends User {
    public $id;
    public $left_times;
    public $start_date;
    public $roll_no;
    public $userId;
    public $storeId;

    public function __construct(private DatabaseTable $userTable,private DatabaseTable $storeTable,private DatabaseTable $historyTable){

    }
    
    public function getHistory(){
        return $this->historyTable->find('memberId',$this->id);
    }
    public function getStore(){
        return $this->storeTable->find('id',$this->storeId)[0];
    }
    public function getUser(){
        return $this->userTable->find("id", $this->userId)[0];
    }
    public function checkTodayMeal($type="lunch"): bool {
       
        try{
        $histories=$this->historyTable->find('memberId',$this->id);
        if(count($histories)>0 ){
            foreach($histories as $history) {
                
                if(($history->date == Ciamax::today()) and ($history->type == $type)){
                    echo "$type False";
                    return false;
                }
            }
            return true;
        }else{
            return true;
        }
        }catch(Exception $e){
            echo "Failed";
            return false;
        }
    }
    public function canAccceptMeal(){
        return $this->left_times>0;
    }
    public function toArray(){
        return [
            "id"=>$this->id,
            "left_times"=>$this->left_times,
            "start_date"=>$this->start_date,
            "roll_no"=>$this->roll_no,
            "userId"=>$this->userId,
            "storeId"=>$this->storeId,
        ];
    }
    
}