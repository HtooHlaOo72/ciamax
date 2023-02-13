<?php
namespace Ciamax\Entity;

use Ciamax\Ciamax;
use Exception;
use Util\DatabaseTable;

class Member extends User {
    public $id;
    public $left_times;
    public $is_paid;
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
    public function checkTodayMeal($type="lunch"){
        // function check($typ) {
        //     return function ($history) use ($typ) {
        //       return ($history->date == Ciamax::today() and $history->type == $typ);
        //     };
        //   }
        try{
        $histories=$this->historyTable->find('memberId',$this->id);
        if(count($histories)>0 ){
            // $result = array_filter($histories,function ($history) use ($type){
            //     // global $type;
            //     echo ($type == $history->type)?"T":"F";
            //     return ($history->date == Ciamax::today() and $history->type==$type);
            // });
            // print_r($result);
            // if(count($result)>0){
            //     return false;
            // }
           
            foreach($histories as $history) {
                echo Ciamax::today();
                echo ($history->date == Ciamax::today())?"T":"F";
                if(($history->date == Ciamax::today()) and ($history->type == $type)){
                    echo "False";
                    return false;
                }
            }
        }else{
            return true;
        }}catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }
    
}