<?php
namespace Ciamax\Controllers;
use Util\Authentication;
use \Util\DatabaseTable;
class Store {
    public function __construct(private DatabaseTable $storeTable,private Authentication $authentication){

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
    public function register(){
        // $img = $_FILES['img'];
        return [
            "template"=>"storeregister.html.php",
            "title"=>"Register Store",
        ];
    }
    public function registerSubmit(){
        $errors = [];
        $user = $this->authentication->getUser();
        if(isset($_FILES['img']) and isset($_FILES['qr_img'])){
            $name = $_POST['name'];
            $img = $_FILES["img"];
            $qr_img = $_FILES['qr_img'];
            $qr_img["ext"] = pathinfo($qr_img['name'], PATHINFO_EXTENSION);
            $img["ext"] = pathinfo($img['name'], PATHINFO_EXTENSION);
            $extensions= array("jpeg","jpg","png");
            echo " File Exist";
        if(!in_array($img['ext'],$extensions) or !in_array($qr_img['ext'],$extensions)){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($img['size'] > 5000000 or $qr_img['size']>5000000){
            $errors[]='File size must be less than 5 MB';
        }
        if(strlen($name)<4){
            $errors[] = "Store name must be 3 or more characters";
        }
        if(empty($errors)){

            $uploaded = move_uploaded_file($img['tmp_name'], "uploads/store/profile/".$user->id."_".$name);
            if($uploaded){
                $uploaded=move_uploaded_file($qr_img['tmp_name'], "uploads/store/" .$user->id."_".$name);
            }
            if(!$uploaded){
                $errors[] = "File Upload Error";
            }else{
                header('Location: /ciamax/public/store/registersuccess');
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
    public function update(){
        $errors = [];
        return [
            'template' => "storeupdate.html.php",
            'title' => 'Update Store'
        ];
    }
    
}