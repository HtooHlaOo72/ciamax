<?php
namespace Ciamax\Controllers;
use ErrorException;
use Util\Authentication;
use \Util\DatabaseTable;
class Store {
    public function __construct(private Authentication $authentication,private DatabaseTable $storeTable,private DatabaseTable $memberTable,private DatabaseTable $menuTable,private DatabaseTable $userTable){

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
                echo "IMG";
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
                header("Location:/ciamax/public/user/dashboard");
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
    public function updateSubmit(){
        return [];
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
            $store = $this->storeTable->find('userId', $this->authentication->getUser()->id)[0];
        }
        $owner = $this->userTable->find('id',$store->userId)[0];
        $menus = $this->menuTable->find('storeId', $store->id);
        return [
            'template' => "storewall.html.php",
            'title' => 'Store',
            'variables'=>[
                "store"=>$store,
                "menus"=>$menus,
                "owner"=>$owner,
                "errors"=>$errors,
            ]
        ];
    }
    public function validatePayment($id){

    }

    public function validatePaymentSubmit(){

    }
    public function provideMeal(){

    }
    public function provideMealSubmit(){
        
    }
    
}