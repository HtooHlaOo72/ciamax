<?php
namespace Ciamax;

use DateTimeZone;
use Util\DatabaseTable;
class Ciamax implements \Util\Website{
    private ?\Util\DatabaseTable $userTable;
    private ?\Util\DatabaseTable $storeTable;
    private ?\Util\DatabaseTable $menuTable;
    private ?\Util\DatabaseTable $memberTable;
    private ?\Util\DatabaseTable $historyTable;
    private ?DatabaseTable $requestTable;
    private ?\Util\Authentication $authentication;
    private ?string $drop_down_name;
    public function __construct(){
        $pdo = new \PDO('mysql:host=localhost;dbname=ciamax2','root','rootcms');
        $this->userTable = new DatabaseTable($pdo,'user','id','\Ciamax\Entity\User',[&$this->memberTable]);
        $this->menuTable = new DatabaseTable($pdo, "menu", "id", '\Ciamax\Entity\Menu',[&$this->storeTable]);
        $this->memberTable = new DatabaseTable($pdo, 'member', 'id', '\Ciamax\Entity\Member',[&$this->userTable,&$this->storeTable,&$this->historyTable]);
        $this->storeTable = new DatabaseTable($pdo,'store','id','\Ciamax\Entity\Store',[&$this->userTable,&$this->memberTable,&$this->menuTable,&$this->historyTable]);
        $this->requestTable = new DatabaseTable($pdo, 'request', 'id', '\Ciamax\Entity\Request', [&$this->requestTable,&$this->userTable, &$this->authentication]);
        $this->historyTable = new DatabaseTable($pdo,'history','id','\Ciamax\Entity\History',[&$this->memberTable,&$this->menuTable]);
        $this->authentication = new \Util\Authentication($this->userTable,'email','password');
       
    }
    public function getLayoutVariables(): array {
        if($this->authentication->isLoggedIn() and $this->authentication->getRole()!=0){
            $this->drop_down_name=$this->authentication->getUser()->name." (".$this->authentication->getRoleName()." )";
        }
        $urlList = $this->authentication->isLoggedIn()?$this->getNavUrlListByRole($this->authentication->getRole()):$this->getNavUrlListByRole(0);
        return [
            'loggedIn' => $this->authentication->isLoggedIn(),
            'profile'=>$this->authentication->getUser(),
            'role'=>($this->authentication->isLoggedIn())?$this->authentication->getRoleName():"",
            'roleNum'=>($this->authentication->isLoggedIn())?$this->authentication->getRole():"",
            'urlList'=>$urlList,
            'drop_down_name'=>(isset($this->drop_down_name) and !empty($this->drop_down_name))?$this->drop_down_name:"",
        ];
    }
    public function getNavUrlListByRole($role): array {
        $urlList = [
            0=>[
                "Home"=>"user/home",
                "Stores"=>"store/list",
                "Menus"=>"menu/list",
                "Login"=>"login/login",
            ],
            1=>[
                "Home"=>"user/home",
                "Stores"=>"store/list",
                "Menus"=>"menu/list",
                "History"=>"member/validatemeal",
                "DropDown"=>[
                    "sub_url_list"=>[
                        "Profile"=>"user/profile",
                        "Logout"=>"login/logout",
                    ]
                ],
            ],
            2=>[
                "Home"=>"user/home",
                "Stores"=>"store/list",
                "Menus"=>"menu/list",
                "Member Requests"=>"store/validaterequest",
                "Provide Meal"=>"store/providemeal",
                "DropDown"=>[
                    "sub_url_list"=>[
                        "Profile"=>"store/profile",
                        "Logout"=>"login/logout"
                    ]
                ],
               
            ],
            3=>[
                "Home"=>"user/home",
                "Dashboard"=>"user/dashboard",
                "Stores"=>"store/list",
                "Menus"=>"menu/list",
                "Logout"=>"login/logout",
            ],
        ];
        return $urlList[$role];
    }
    public function getDefaultRoute(): string {
        return 'user/home';
    }
    public static function uploadAndStore($upload_name,$location='uploads/'):array{
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
       "store"=>new \Ciamax\Controllers\Store($this->authentication,$this->storeTable,$this->memberTable,$this->menuTable,$this->userTable,$this->requestTable,$this->historyTable),
       "menu"=>new \Ciamax\Controllers\Menu($this->menuTable,$this->storeTable,$this->userTable,$this->authentication),
       "member"=>new \Ciamax\Controllers\Member($this->authentication,$this->userTable,$this->storeTable,$this->memberTable,$this->requestTable,$this->historyTable),
      ];
      
      return $controllers[$controllerName] ?? null;
    }
    public function checkLogin(string $uri):string {
        $restrictedPages = [
            "user/dashboard"
        ];
        
        if(in_array($uri,$restrictedPages)){
            if(!($this->authentication->isLoggedIn() and $this->authentication->getUser()->role ==3)){
                header('Location:/ciamax/public/login/login');
            }
        }
        return $uri;
    }
    public static function today(){
        date_default_timezone_set('Asia/Yangon');
        return date('d-m-Y');
    }
}