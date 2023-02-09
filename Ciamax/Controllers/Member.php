<?php
namespace Ciamax\Controllers;

use Ciamax\Ciamax;
use Exception;
use Util\Authentication;
use Util\DatabaseTable;
class Member{
    public function __construct(private Authentication $authentication,private DatabaseTable $userTable,private DatabaseTable $storeTable,private DatabaseTable $memberTable,private DatabaseTable $requestTable){

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
}