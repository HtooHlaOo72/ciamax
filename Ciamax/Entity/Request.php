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
    public $start_date;
    public $is_accepted;
    public $is_rejected;
    
    public function __construct(private DatabaseTable $requestTable,private DatabaseTable $userTable,private Authentication $authentication){

    }
    
    public function acceptRequest():bool {
        $req = $this->requestTable->find('id', $this->id);
        if(!empty($req)){
            $req = $req[0];
        }
        $req->is_accepted = true;
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
}