<?php
namespace Ciamax;
class Ciamax implements \Util\Website{
    private ?\Util\DatabaseTable $userTable;
    private ?\Util\DatabaseTable $shopTable;
    private ?\Util\DatabaseTable $dishTable;
    private ?\Util\DatabaseTable $membershipTable;
    private ?\Util\Authentication $authentication;

    public function __construct(){
        $pdo = new \PDO('mysql:host=localhost;dbname=ciamax','root','rootcms');
        // $sql='SELECT * FROM user';
        // $stmt=$pdo->query($sql);
        // $results=$stmt->fetchall();
        $this->userTable = new \Util\DatabaseTable($pdo,'user','id','\Ciamax\Entity\User');
        $this->authentication = new \Util\Authentication($this->userTable,'email','password');
    }
    public function getLayoutVariables(): array {
        return [
            'loggedIn' => $this->authentication->isLoggedIn()
        ];
    }

    public function getDefaultRoute(): string {
        return '/ciamax/public/';
    }

    public function getController(string $controllerName): ?object {

      $controllers = [
       "user"=>new \Ciamax\Controllers\User($this->userTable),
       "login"=>new \Ciamax\Controllers\Login($this->authentication),
      ];
      
      return $controllers[$controllerName] ?? null;
    }
    public function checkLogin(string $uri): ?string {

        $restrictedPages = [
            
        ];

        if (isset($restrictedPages[$uri])) {
          if (!$this->authentication->isLoggedIn()
             || !$this->authentication->getUser()->hasPermission($restrictedPages[$uri])) {
            header('location: /authentication/login');
            exit();
          }
        }

        return $uri;
    }
}