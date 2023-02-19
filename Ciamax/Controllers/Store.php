<?php
namespace Ciamax\Controllers;

use Ciamax\Ciamax;
use ErrorException;
use Exception;
use Util\Authentication;
use \Util\DatabaseTable;
class Store {
    public function __construct(private Authentication $authentication,
                                private DatabaseTable $storeTable,
                                private DatabaseTable $memberTable,
                                private DatabaseTable $menuTable,
                                private DatabaseTable $userTable,
                                private DatabaseTable $requestTable,
                                private DatabaseTable $historyTable
                                ){

    }
    
    public function list(){
        $stores = $this->storeTable->findAll();
        $errors=[];
        
        return [
            'template'=>'storelist.html.php',
            'title'=>'Store List',
            'variables'=>[
                'stores'=>$stores,
                'errors'=>$errors,
                'role'=>$this->authentication->isLoggedIn()?$this->authentication->getRole():"",
            ]
        ];
    }
    public function register($id=0){
        if($id){
            $store=$this->storeTable->find('id',$id)[0];
        }
        return [
            "template"=>"storeregister.html.php",
            "title"=>"Register Store",
            "variables"=>[
                "store"=>$store??null,
            ]
        ];
    }
    
    public function registerSubmit(){
        
        $store = null;
        $newStore = $_POST["store"];
        
        $errors =[];
        if(!isset($newStore["name"])){
            $errors[] = "Store name is empty";
        }
        if(!isset($newStore["ph_no"])){
            $errors[] = "Phone number is empty";
        }
        
        if(isset($newStore['id'])){ //check if the user is store owner
            $store = $this->storeTable->find("id", $newStore["id"])[0];
            
            if($store->id != $newStore['id']){
                $errors[] = "Only Store owner and Admin can update";
            }
        }
        
        if(count($errors)==0){
            if(isset($newStore['id'])){
                $newStore["name"] = (isset($newStore['name']) && $newStore['name'] != $store->name) ? $newStore['name'] : $store->name;
                $newStore["ph_no"] = (isset($newStore['ph_no']) && $newStore['ph_no'] != $store->ph_no) ? $newStore['ph_no'] : $store->ph_no;
            }
            $newStore['userId'] = $this->authentication->getUser()->id;
            // print_r($newStore);

            $updatedStore=$this->storeTable->save($newStore);
            $newStore['id'] = $updatedStore->id ?? "";
            if(isset($_FILES['img']) and $_FILES['img']['size']>0){
                $url = "uploads/store/" . $updatedStore->id . "_profile_" . $updatedStore->userId;
                $upload_errs = \Ciamax\Ciamax::uploadAndStore('img', $url);
                if(!empty($upload_errs)){
                    $errors = [...$errors, ...$upload_errs];
                }
                $newStore['img'] = $url;
            }
            if(isset($_FILES['qr_img']) and $_FILES['qr_img']['size']>0){
                
                $url = "uploads/store/" . $newStore->id . "_qr_" . $newStore->userId;
                $upload_errs = \Ciamax\Ciamax::uploadAndStore('qr_img', $url);
                if(!empty($upload_errs)){
                    $errors = [...$errors, ...$upload_errs];
                }
                $newStore['qr_img'] = $url;
            }
            if(count($errors)==0){
                $this->storeTable->save($newStore);
                header("Location:/ciamax/public/store/profile");
            }
            
        }else{
            
            return [
                'template'=>'storeregister.html.php',
                'title'=>'Store Register',
                'variables'=>[
                    'errors'=>$errors,
                ]
            ];
        }
        
        
    }
    private function uploadAndStore($upload_name,$location='uploads/'):array{
        $errors = [];
        try{
            if(isset($_FILES[$upload_name])){
                $file = $_FILES[$upload_name];
                $file['ext'] = pathinfo($file['name'], PATHINFO_EXTENSION);
                $extensions= array("jpeg","jpg","png");
                if(!in_array($file['ext'],$extensions)){
                    $errors[] = "File extension not allowed";
                }
                if($file['size']>5000000){
                    $errors[] = "File size must be less than 5mb";
                }
                if(empty($errors)){
                    $up = move_uploaded_file($file['tmp_name'], $location);
                    if(!$up){
                        $errors[] = "File Upload Failed";
                    }
                }
            }
        }catch(\Exception $e){
            $errors[] = $e->getMessage();
        }
        return $errors;
    }
    
    public function registerSuccess(){
        return [
            'template'=>'registersuccess.html.php',
            'title'=>"Register Success"
        ];
    }
   
    public function removeSubmit(){
        $id = $_POST['id'];
        if(!is_null($id)){
            $this->menuTable->delete('storeId', $id);
            $this->storeTable->delete("id",$id);
        }
        header("Location: /ciamax/public/user/dashboard");
    }
    

    public function profile($id=0){
        // if(!$this->authentication->isLoggedIn()){
        //     header('Location : /ciamax/public/store/list');
        // }
        // $id = $_GET["id"];
        // echo $id . " IS ID";
        $errors=[];
        $store = null;
        if($id){
            $store = $this->storeTable->find('id',$id)[0];
        }else{
            $store = $this->storeTable->find('userId', $this->authentication->getUser()->id)[0];//find logged in user's store
        }
        // $owner =$this->authentication->getUser();
        $owner = $this->userTable->find('id',$store->userId)[0];
        $menus = $this->menuTable->find('storeId', $store->id);
        $histories = $this->historyTable->findAll();//get all histories
        //filter history by store id
        $histories = array_filter($histories,function  ($history) use ($store) {
            return ($history->getMember()[0]->storeId == $store->id);
        });
        return [
            'template' => "storewall.html.php",
            'title' => 'Store',
            'variables'=>[
                "store"=>$store,
                "menus"=>$menus,
                "members"=>$store->getMembers(),
                "owner"=>$owner,
                "histories"=>$histories,
                "errors"=>$errors,
                'role'=>$this->authentication->isLoggedIn()?$this->authentication->getRole():"",
                "user"=>$this->authentication->isLoggedIn()?$this->authentication->getUser():""
            ]
        ];
    }
    public function validateRequest($storeId=null){
        $requests=[];
        if(!$storeId){
            $store = $this->storeTable->find("userId",$this->authentication->getUser()->id)[0];
            $storeId = $store->id;
        }
        $requests = $this->requestTable->find('storeId',$storeId);
        return [
            "template"=>"requestlist.html.php",
            "title"=>"Requests",
            "variables"=>[
                "requests"=>$requests,
            ]
        ];
    }

    public function validateRequestSubmit(){

        $errors=[];
        try{
        $id = $_POST['id'];
        $action =$_POST['action'];
        
        $request= $this->requestTable->find("id",$id);
        if(count($request)!=0){
            $request=$request[0];
        }
        $success=$request->validate($action);
        if(!$success){
            $errors[]="$action action is failed!";
        }
        }catch(Exception $e){
            $errors[]=$e->getMessage();
        }
        $requests = $this->requestTable->findAll();
        return [
            "template"=>"requestlist.html.php",
            "title"=>"Requests",
            "variables"=>[
                'requests'=>$requests,
            ]
        ];
    }
    public function provideMeal($storeId=null){
        // echo Ciamax::today();
        $errors = [];
        $menus=$members=$store=null;
        $types = ["lunch","dinner"];
        if(!$storeId){
            $store = $this->storeTable->find('userId',$this->authentication->getUser()->id)[0];
        }else{
            $store = $this->storeTable->find('id',$storeId)[0];
        }
        if(!is_null($store)){
            $members = $store->getMembers();
        }
        return [
            "template"=>"providemeal.html.php",
            "title"=>"providemeal",
            "variables"=>[
                "errors"=>$errors,
                "menus"=>$store->getMenus(),
                "store"=>$store,
                "members"=>$members,
                "types"=>$types,
            ]
            ];
    }
    
    public function provideMealSubmit(){
        $errors = [];
        $storeId=$_POST['storeId'];
        $menus=$member=$members=$store=$historyObj=$msg=null;
        $types = ["lunch","dinner"];
        $history = $_POST["history"];
        $history['date']=Ciamax::today();
       
        if(!$storeId){
            $errors[]="Store ID not found";
        }
        if(empty($history["roll_no"])){
            $errors[]="Roll number is empty";
        }
        if(empty($history["type"])){
            $errors[]="type is empty";
        }
        if(count($errors)==0){
            $history['roll_no']=strtolower($history['roll_no']);//convert roll number to lower case
            $member = $this->memberTable->find('roll_no',$history['roll_no']);//find member by roll_no
            
            if(count($member)>0){
                $member = $member[0];
                if(!$member->checkTodayMeal($history['type'])){
                    $errors[]="{$history['type']} has already been provided to {$member->roll_no}";
                }
                $history['memberId']=$member->id;
                $history['status']="pending";
                $history["date"]=Ciamax::today();
                unset($history['roll_no']);
                // echo $history['date']." <<--";

            }else{
                $errors[] = "Invalid student ID ('Member not exist')";
            }

            // $historyObj=$this->historyTable->save($history);
        }
        if(count($errors)==0){
            $historyObj=$this->historyTable->save($history);//add history
           
            if(!is_null($historyObj)){
                $msg = "{$history['type']} has been provided to {$member->roll_no}";
            }else{
                $errors[]="Error in providing meal";
            }
        }
        
        $menus = $this->menuTable->find('storeId',$storeId);
        $store = $this->storeTable->find('id',$storeId)[0];
        $members=$store->getMembers();
        
       
        return [
            "template"=>"providemeal.html.php",
            "title"=>"providemeal",
            "variables"=>[
                "errors"=>$errors,
                "menus"=>$menus,
                "store"=>$store,
                "members"=>$members,
                "types"=>$types,
                "msg"=>$msg,
            ],
        ];
    }

    public function requestDetail($id=null){
        $request=$requests=null;
        $store=null;
        $errors = [];
        try{
            $requests = $this->requestTable->find('id',$id);
            if(count($requests)==0){
                $request = null;
            }else{
                $request = $requests[0];
                $store = $this->storeTable->find("userId",$this->authentication->getUser()->id)[0];
            }
        }
        catch(Exception $e){
            $errors[]="Error in finding request";
        }
        
        return [
            "template"=>"requestdetail.html.php",
            "title"=>"Request Detail",
            "variables"=>[
                "request"=>$request,
                "errors"=>$errors,
                "logStore"=>$store,
            ],
        ];
    }
    
}
