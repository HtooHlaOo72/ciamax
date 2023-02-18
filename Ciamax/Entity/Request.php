<?php
namespace Ciamax\Entity;
use Util\Authentication;
use Util\DatabaseTable;
class Request {
    public $id;
    public $userId;
    public $roll_no;
    public $storeId;
    public $days;
    public $amount;
    public $kpay_ss;
    public $transaction_id;
    public $date;
    public $is_accepted;
    public $is_rejected;
    
    public function __construct(private DatabaseTable $requestTable,private DatabaseTable $userTable,private DatabaseTable $storeTable,private Authentication $authentication){

    }
    
    public function validate($action):bool {
        $req = $this->requestTable->find('id', $this->id);
        if(count($req)>0){
            $req = $req[0];
        }
        $req->$action = true;
        $req=json_decode(json_encode($req),true);
        // print_r($req);
        $successReq=$this->requestTable->save($req);
        if($successReq){
            return true;
        }
        return false;
    }

    
    public function getUser(){
        $user=$this->userTable->find('id',$this->userId);
       
        if(empty($user)){
            return null;
        }
        return $user[0];
    }
    public function getStore(){
        return $this->storeTable->find("id",$this->storeId)[0];
    }
    
    public function toArray(){
        $temp =[];
        foreach(get_object_vars($this) as $key=>$val){
            $temp[$key]=$val;
        }
        return $temp;
    }
}