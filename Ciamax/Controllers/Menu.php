<?php
use Util\Authentication;
use Util\DatabaseTable;
class Menu{
    public function __construct(private DatabaseTable $menuTable,private DatabaseTable $storeTable,private DatabaseTable $userTable,private Authentication $authentication){

    }

    public function addMenu(){
        return [
            'template'=>'addmenu.html.php',
            'title'=>'Add Menu',
            'variables'=>[
                
            ]
        ];
    }
    public function addMenuSubmit(){
        $errors =[];
        if(!isset($_POST["name"])){
            $errors[] = "Menu name is empty";
        }
        if(!isset($_POST['description'])){
            $errors[] = "Description is empty";
        }
        if(!isset($_POST['price'])){
            $errors[] = "Price is empty";
        }
        if(!isset($_FILES["img"])){
            $errors[] = 'Menu Photo is empty';
        }
        if(empty($errors)){
            $store = $this->storeTable->find('userId',$this->authentication->getUser()->id)[0];
            $menu = [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'storeId'=>$store->id,
            ];
            $newMenu=$this->menuTable->save($menu);
            $url = "uploads/menu/" . $store->id . "_menu_" . $newMenu->id;
            $upload_errs = $this->uploadAndStore('img', $url);
            if(empty($upload_errs)){
                $menu['id'] = $newMenu->id;
                $menu['img'] = $url;
                $this->menuTable->save($menu);
                header("Location: /ciamax/public/user/dashboard");
            }
        }else{
            return [
                'template'=>'addmenu.html.php',
                'title'=>'Add Menu',
                'variables'=>[
                    'errors'=>$errors,
                ]
            ];
        }
    }
}