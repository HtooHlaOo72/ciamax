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
    
    public function __construct(private DatabaseTable $memberTable,private Authentication $authentication){

    }
    
    public function acceptRequest():bool {
        $req = $this->memberTable->find('id', $this->id);
        if(!empty($req)){
            $req = $req[0];
        }
        $req->is_accepted = true;
        $successReq=$this->memberTable->save($req);
        if($successReq){
            return true;
        }
        return false;
    }
}