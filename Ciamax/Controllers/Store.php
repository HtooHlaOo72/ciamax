<?php
namespace Ciamax\Controllers;
use ErrorException;
use Util\Authentication;
use \Util\DatabaseTable;
class Store {
    public function __construct(private Authentication $authentication,private DatabaseTable $storeTable,private DatabaseTable $memberTable,private DatabaseTable $menuTable){

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
    public function registerSubmit(){
        $errors = [];
        $user = $this->authentication->getUser();
        if(isset($_FILES['img']) and isset($_FILES['qr_img'])){
            $name = $_POST['name'];
            $ph_no = $_POST['ph_no'];
            $img = $_FILES["img"];
            $qr_img = $_FILES['qr_img'];
            $qr_img["ext"] = pathinfo($qr_img['name'], PATHINFO_EXTENSION);
            $img["ext"] = pathinfo($img['name'], PATHINFO_EXTENSION);
            $extensions= array("jpeg","jpg","png");
        if(!in_array($img['ext'],$extensions) or !in_array($qr_img['ext'],$extensions)){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($img['size'] > 5000000 or $qr_img['size']>5000000){#check file larger than 5mb
            $errors[]='File size must be less than 5 MB';
        }
        if(strlen($name)<4){#check store name length less than 4 chars
            $errors[] = "Store name must be 3 or more characters";
        }
        if(empty($ph_no)){
            $errors[] = "Phone number is empty";
        }
        if(empty($errors)){#check if errors are empty and then start upload and store registration
            $img['url']="uploads/store/profile/".$user->id."_".$name;
            $qr_img['url']="uploads/store/" .$user->id."_".$name;
            $uploaded = move_uploaded_file($img['tmp_name'],$img['url'] );
            if($uploaded){
                $uploaded=move_uploaded_file($qr_img['tmp_name'],$qr_img['url'] );
            }
            if(!$uploaded){
                $errors[] = "File Upload Error";
            }else{
                $store=[
                    "name"=>$name,
                    "img"=>$img['url'],
                    "qr_img"=>$qr_img['url'],
                    'userId'=>$user->id,
                ];

                $this->storeTable->save($store);#add store to db
                header('Location: /ciamax/public/user/dashboard');
            }
        }
        
        }else{
            $errors[] = "Incomplete Information";
        }
        return [
            "template"=>"storeregister.html.php",
            "title"=>"Register Store",
            'variables'=>[
                "errors"=>$errors,
            ]
        ];
        
        
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
    

    public function profile(){
        // if(!$this->authentication->isLoggedIn()){
        //     header('Location : /ciamax/public/store/list');
        // }
        // $id = $_GET["id"];
        // echo $id . " IS ID";
        $errors=[];
        $store = $this->storeTable->find('userId',$this->authentication->getUser()->id)[0];
        $menus = $this->menuTable->find('storeId', $store->id);
        return [
            'template' => "storewall.html.php",
            'title' => 'Store',
            'variables'=>[
                "store"=>$store,
                "menus"=>$menus,
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