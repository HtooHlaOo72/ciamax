<?php
namespace Ciamax;
class Ciamax implements \Util\Website{
    private ?\Util\DatabaseTable $studentTable;
    private ?\Util\DatabaseTable $shopTable;
    private ?\Util\DatabaseTable $dishTable;
    private ?\Util\DatabaseTable $packageTable;
    private ?\Util\Authentication $authentication;

    public function __construct(){
        $pdo = new \PDO('mysql:host=localhost;dbname=ciamax','root','rootcms');
        $this->userTable = new \Util\DatabaseTable($pdo,'user','id','\Ciamax\Entity\User',[&$this->dishTable,&$this->packageTable,&$this->shopTable] );
        $this->authentication = new \Util\Authentication($this->userTable,'email','password');
    }
    public function getLayoutVariables(): array {
        return [
            'loggedIn' => $this->authentication->isLoggedIn()
        ];
    }

    public function getDefaultRoute(): string {
        return '/';
    }

    public function getController(string $controllerName): ?object {

      $controllers = [
       ""
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