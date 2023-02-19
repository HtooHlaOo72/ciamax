<?php
namespace Ciamax\Controllers;

use Ciamax\Ciamax;
use Util\Authentication;
use \Util\DatabaseTable;
class User {
    public function __construct(private DatabaseTable $userTable,private DatabaseTable $storeTable,private DatabaseTable $menuTable,private Authentication $authentication){

    }
    public function list(){
        #this fun is not route (to use in route pubilic function such as dashboard)
        $users = $this->userTable->findAll();
        $errors=[];
        
        return [
            'template'=>'userlist.html.php',
            'title'=>'User List',
            'profile'=>$this->authentication->getUser(),
            'variables'=>[
                'users'=>$users,
                'errors'=>$errors,
                'role'=>$this->authentication->isLoggedIn()?$this->authentication->getRole():"",
            ]
        ];
    }
    public function home(){
        $stores = $this->storeTable->findAll();
        $menus = $this->menuTable->findAll();
        if(count($menus)>6){
            $menus=array_slice($menus,0,6);
        }
        return [
            "template"=>'home.html.php',
            "title"=>"Home",
            "variables"=>[
                "today"=>Ciamax::today(),
                "stores"=>$stores,
                "menus"=>$menus,
                "isLoggedIn"=>$this->authentication->isLoggedIn(),
            ]
        ];
    }
    public function dashboard(){
        $users = $this->userTable->findAll();
        $stores = $this->storeTable->findAll();
        return [
            'template' => 'dashboard.html.php',
            'title' => 'Admin Dashboard',
            'variables' => [
                'users' => $users,
                'stores' => $stores,
                'role'  =>$this->authentication->getRole(),
            ]
        ];
        
    }
    public function registrationForm() {
        return [
          'template' => 'register.html.php',
            'title' => 'Register an account'
        ];
    }

    public function success() {  
       
        return [
            'template' => 'registersuccess.html.php',
            'title' => 'Registration Successful',
        ];
    }

    public function registrationFormSubmit() {
        $user = $_POST['user'];
        // Start with an empty array
        $errors = [];

        // But if any of the fields have been left blank, write an error to the array
        if (empty($user['name'])) {
            $errors[] = 'Name cannot be blank';
        }

        if (empty($user['email'])) {
            $errors[] = 'Email cannot be blank';
        } else if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = 'Invalid email address';
        } else { // If the email is not blank and valid:
            // convert the email to lowercase
            $user['email'] = strtolower($user['email']);

            // Search for the lowercase version of $user['email']
            if (count($this->userTable->find('email', $user['email'])) > 0) {
                $errors[] = 'That email address is already registered';
            }
        }

        if (empty($user['password'])) {
            $errors[] = 'Password cannot be blank';
        }

        // If there are no errors, proceed with saving the record in the database
        if (count($errors) === 0) {
            // Hash the password before saving it in the database
            $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

            // When submitted, the $user variable now contains a lowercase value for email
            // and a hashed password
            $this->userTable->save($user);

            header('Location: /ciamax/public/user/success');
        } else {
            // If the data is not valid, show the form again
            return ['template' => 'register.html.php',
        'title' => 'Register an account',
        'variables' => [
            'errors' => $errors,
            'user' => $user
        ]
      ];
        }
    }
    public function removeSubmit(){
        $id = $_POST['id'];
        if(!is_null($id)){
            $store=$this->storeTable->find("userId", $id)[0];
            if($store and isset($store->id)){
                $storeId = $store->id;
                $this->menuTable->delete("storeId", $storeId);
                $this->storeTable->delete("id", $storeId);
            }
            
            $this->userTable->delete("id",$id);
        }
        header("Location: /ciamax/public/user/dashboard");
    }
    public function changeInfo($id=null){
        if(is_null($id)){
            $id = $this->authentication->getUser()->id;
        }
        $user = $this->userTable->find("id", $id)[0];
        return [
            "title"=>"Update User",
            "template"=>"register.html.php",
            "variables"=>[
                "user"=>$user,
                "is_update"=>true,
                "is_admin"=>($this->authentication->getRole()==3),
            ],
        ];
    }
    public function changeInfoSubmit(){
        $user = $_POST['user'];
        $errors = [];
        if (empty($user['name'])) {
            $errors[] = 'Name cannot be blank';
        }
        if(empty($user['id'])){
            $errors[] = "User's id is empty";
        }

        if (empty($user['email'])) {
            $errors[] = 'Email cannot be blank';
        } else if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = 'Invalid email address';
        } else { // If the email is not blank and valid:
            // convert the email to lowercase
            $user['email'] = strtolower($user['email']);
        }
       
        if($this->authentication->getRole()!=3){
           
            if (empty($user['password'])) {
                $errors[] = 'Password cannot be blank';
            }
            if(!$this->authentication->login($user['email'],$user['password'])){
                $errors[] = 'Incorrect email or password';
            }
        }
        
        if(empty($user['new_password'])){
            $errors[]="New password cannot be blank";
        }
        if (count($errors) === 0) {
            $user['password'] = password_hash($user['new_password'], PASSWORD_DEFAULT);
            if(isset($_FILES['img']) and $_FILES['img']['size']>0){
                $url = "uploads/user/" . rand(1,10000000) . "_profile_" . $user['id'];
                $upload_errs = \Ciamax\Ciamax::uploadAndStore('img', $url);
                if(!empty($upload_errs)){
                    $errors = [...$errors, ...$upload_errs];
                }
                $user['img'] = $url;
            }
            unset($user['new_password']);
            $this->userTable->save($user);
            header('Location: /ciamax/public/user/dashboard');
        } else {
            // If the data is not valid, show the form again
            return [
                'template' => 'register.html.php',
                'title' => 'Register an account',
                'variables' => [
                    'errors' => $errors,
                    'user' => $user
                ]
            ];
    }}
    private function update($id,$key,$value){
        
    }
    
    public function profile($id=null){
        if(is_null($id)){
            $id = $this->authentication->getUser()->id;
        }
        $user = null;
        $users = $this->userTable->find('id',$id);
        $logUser = $this->authentication->getUser();
        if(count($users)>0){
            $user = $users[0];
        }
        return [
            "template"=>"userprofile.html.php",
            "title"=>$user->name."'s Profile",
            "variables"=>[
                "user"=>$user,
                "logUser"=>$logUser,
                // "member"=>$user->isMember()?$user->getMember():null,
            ]
        ];
    }
    public function promoteToOwnerSubmit(){
        $userId = $_POST["userId"];
        if($userId){
            $user = $this->userTable->find("id",$userId)[0];
            $user->role = 2;//promote role to store owner which is eq to '2'
            $user = $user->toArrray();
            $this->userTable->save($user);
        }
        header("Location: /ciamax/public/user/dashboard");
    }
    
}