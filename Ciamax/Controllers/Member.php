<?php
namespace Ciamax\Controllers;

use Ciamax\Ciamax;
use Exception;
use Util\Authentication;
use Util\DatabaseTable;
class Member{
    public function __construct(private Authentication $authentication,private DatabaseTable $userTable,private DatabaseTable $storeTable,private DatabaseTable $memberTable,private DatabaseTable $requestTable,private DatabaseTable $historyTable){

    }
    public function list($storeId=null){
        $members = [];
        if($storeId){
            $members = $this->memberTable->find("storeId", $storeId);
        }else{
            $members = $this->memberTable->findAll();
        }
        return [
            'template'=>"memberlist.html.php",
            'title'=>'Member List',
            'variables'=>[
                "members"=>$members,
            ]
        ];
    }
    public function request(){
        $stores = $this->storeTable->findAll();
        $user = $this->authentication->getUser();
        return [
            "template" => "memberreq.html.php",
            "title" => "Membership Form",
            "variables" => [
                "stores"=>$stores,
                "user"=>$user,
            ],
        ];
    }
    public function requestSubmit(){
        $errors=[];
        $request = $_POST['req'];
        $stores = $this->storeTable->findAll();
        $user = $this->authentication->getUser();
        //check request errors
        if(empty($request['roll_no'])){
            $errors[] = "Roll number is empty";
        }
        if(empty($request['days'])){
            $errors[] = "Number of days for membership is empty";
        }
        if(empty($request['storeId'])){
            $errors[] = "Store ID is empty";
        }
        if(empty($request['transaction_id'])){
            $errors[] = "Transaction ID is empty";
        }
        if(empty($request['amount'])){
            $errors[] = 'Amount is empty';
        }
        if(empty($request['userId'])){
            $errors[] = "User ID is empty check if you are logged in!";
        }
        if(!isset($_FILES['kpay_ss']) or $_FILES['kpay_ss']['size']==0){
            $errors[] = "Kpay screenshot is empty";
        }
        if(count($errors)==0){
            $request['roll_no'] = strtolower($request['roll_no']);
            $requestObj = $this->requestTable->save($request);
            if(!empty($requestObj)){
                try {
                    $url = "uploads/request/" . $requestObj->id . "_req_" . rand(1, 100000);
                    $uploadErrs = Ciamax::uploadAndStore('kpay_ss', $url);
                    if (count($uploadErrs) != 0) {
                        $errors = [...$errors, ...$uploadErrs];
                    } else {
                        $request["kpay_ss"] = $url;
                        $request['id'] = $requestObj->id;
                        $this->requestTable->save($request);
                        header("Location:/ciamax/public/store/list");
                    }
                }catch(Exception){
                    $errors[] = "Upload Failed";
                }
            }
        }
        return [
            "template" => "memberreq.html.php",
            "title" => "Membership Form",
            "variables" => [
                "errors" => $errors,
                "stores"=>$stores,
                "user"=>$user,
            ]
        ];
    }
    public function validateMeal($id=null){
        
        $member = null;
        if(is_null($id)){
            if($this->authentication->isLoggedIn()){
                $userId = $this->authentication->getUser()->id;
                $members = $this->memberTable->find("userId",$userId);//find member array by logged in user's id
                if(count($members)!=0){
                    $member = $members[0];
                }
            }
        }
        if(!$member){
            header("Location : /ciamax/public/login/login");
        }
        $histories = $this->historyTable->find("memberId",$member->id);
        return [
            "template"=>"validatemeal.html.php",
            "title"=>"Validate Meal",
            "variables"=>[
                "histories"=>$histories,
                
            ]
        ];

    }
    public function validateMealSubmit(){
        $errors = [];
        $id= $_POST['id'];
        $status=$_POST["status"]??"pending";
        $memberId=null;
        if(empty($id)){
            $errors[]='History ID is empty to validate meal';
        }
        if(empty($status)){
            $errors[]="Status is empty to validate meal";
        }
        if(count($errors)==0){
            $histories = $this->historyTable->find("id",$id);
            $history=null;
            if(count($histories)==0){
                $errors[]="No history with id $id found!";
            }else{
                $history=$histories[0];
                $history->status = $status;
                // $history = json_decode(json_encode($history));//convert history obj to array cuz save function work only with array;
                $history = $history->toArray();
                $history = $this->historyTable->save($history);
                $memberId = $history->memberId;//assign memberId from history obj;
                if(is_null($history)){
                    $errors[]="Error in updating history object";
                }
            }

            
        }
        $histories = $this->historyTable->find("memberId",$memberId);
        return [
            "template"=>"validatemeal.html.php",
            "title"=>"Validate Meal",
            "variables"=>[
                "histories"=>$histories,
            ]
        ];
        
        
    }
    public function notMember(){
        return [
            "template"=>'notmember.html.php',
            "title"=>"Not A Member",
        ];
    }
    public function historyDetail($id){
        $histories = $this->historyTable->find('id',$id);
        $history = null;
        if(count($histories)==0){
            $history=null;
        }else{
            $history = $histories[0];
        }
        return [
            "template"=>"historydetail.html.php",
            "title"=>"History Detail",
            "variables"=>[
                "history"=>$history,
            ]
        ];
    }
}