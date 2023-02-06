<?php
namespace Ciamax;
use Util\DatabaseTable;
class Ciamax implements \Util\Website{
    private ?\Util\DatabaseTable $userTable;
    private ?\Util\DatabaseTable $storeTable;
    private ?\Util\DatabaseTable $menuTable;
    private ?DatabaseTable $menuHistoryTable;
    private ?\Util\DatabaseTable $memberTable;
    private ?\Util\DatabaseTable $historyTable;
    private ?\Util\Authentication $authentication;

    public function __construct(){
        $pdo = new \PDO('mysql:host=localhost;dbname=ciamax2','root','rootcms');
       
        $this->userTable = new \Util\DatabaseTable($pdo,'user','id','\Ciamax\Entity\User');
        $this->menuTable = new \Util\DatabaseTable($pdo, "menu", "id", '\Ciamax\Entity\Menu');
        $this->memberTable = new \Util\DatabaseTable($pdo, 'member', 'id', '\Ciamax\Entity\Member',[&$this->storeTable]);
        $this->menuHistoryTable = new DatabaseTable($pdo, "MenuHistory", 'id', '\Ciamax\Entity\MenuHistory',[&$this->memberTable]);
        $this->storeTable = new \Util\DatabaseTable($pdo,'store','id','\Ciamax\Entity\Store',[&$this->userTable,&$this->memberTable,&$this->menuTable,&$this->menu]);
        $this->authentication = new \Util\Authentication($this->userTable,'email','password');
    }
    public function getLayoutVariables(): array {
        return [
            'loggedIn' => $this->authentication->isLoggedIn(),
            'profile'=>$this->authentication->getUser(),
            'role'=>($this->authentication->getUser())?$this->authentication->getRoleName():"",
        ];
    }

    public function getDefaultRoute(): string {
        return '/ciamax/public/user/list';
    }
    public function uploadAndStore($upload_name,$location='uploads/'):array{
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

    public function getController(string $controllerName): ?object {
      $controllers = [
       "user"=>new \Ciamax\Controllers\User($this->userTable,$this->storeTable,$this->menuTable,$this->authentication),
       "login"=>new \Ciamax\Controllers\Login($this->authentication),
       "store"=>new \Ciamax\Controllers\Store($this->authentication,$this->storeTable,$this->memberTable,$this->menuTable),
      ];
      
      return $controllers[$controllerName] ?? null;
    }
    public function checkLogin(string $uri):string {
        $restrictedPages = [
            // 'user/list'
        
        ];
        $adminPages = [
            // 'store/register'
        ];
        $storePages = [

        ];
        if(in_array($uri,$restrictedPages)){
            if(!($this->authentication->isLoggedIn() and $this->authentication->getUser()->role ==3)){
                header('Location:/ciamax/public/user/list');
            }
        }
        return $uri;
    }
}