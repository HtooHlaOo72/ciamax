<?php
namespace Ciamax;
class Ciamax implements \Util\Website{
    private ?\Util\DatabaseTable $userTable;
    private ?\Util\DatabaseTable $storeTable;
    private ?\Util\DatabaseTable $dishTable;
    private ?\Util\DatabaseTable $membershipTable;
    private ?\Util\Authentication $authentication;

    public function __construct(){
        $pdo = new \PDO('mysql:host=localhost;dbname=ciamax2','root','rootcms');
        // $sql='SELECT * FROM user';
        // $stmt=$pdo->query($sql);
        // $results=$stmt->fetchall();
        $this->userTable = new \Util\DatabaseTable($pdo,'user','id','\Ciamax\Entity\User');
        $this->storeTable = new \Util\DatabaseTable($pdo,'store','id','\Ciamax\Entity\Store',[&$this->userTable]);
        $this->authentication = new \Util\Authentication($this->userTable,'email','password');
    }
    public function getLayoutVariables(): array {
        
        return [
            'loggedIn' => $this->authentication->isLoggedIn(),
            'profile'=>$this->authentication->getUser(),
            'role'=>$this->authentication->getRoleName(),
        ];
    }

    public function getDefaultRoute(): string {
        return '/login/login';
    }

    public function getController(string $controllerName): ?object {
      $controllers = [
       "user"=>new \Ciamax\Controllers\User($this->userTable,$this->storeTable,$this->authentication),
       "login"=>new \Ciamax\Controllers\Login($this->authentication),
       "store"=>new \Ciamax\Controllers\Store($this->storeTable,$this->authentication),
      ];
      
      return $controllers[$controllerName] ?? null;
    }
    public function checkLogin(string $uri):string {
        $restrictedPages = [
            'user/list'
        ];
        if(in_array($uri,$restrictedPages)){
            if(!$this->authentication->isLoggedIn()){
                header('Location:/ciamax/public/login/login');
            }
        }
        return $uri;
    }
}