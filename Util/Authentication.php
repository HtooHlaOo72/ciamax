<?php
namespace Util;
class Authentication {

    public function __construct(private DatabaseTable $users, private string $usernameColumn, private string $passwordColumn) {
        session_start();
    }

    public function login(string $username, string $password): bool {
        $user = $this->users->find($this->usernameColumn, strtolower($username));

        if (!empty($user) && password_verify($password, $user[0]->{$this->passwordColumn})) {
            session_regenerate_id();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $user[0]->{$this->passwordColumn};
            return true;
        } else {
            return false;
        }
    }

    public function isLoggedIn(): bool {
        if (empty($_SESSION['username'])) {
            return false;
        }

        $user = $this->users->find($this->usernameColumn, strtolower($_SESSION['username']));
        
        if (!empty($user) && $user[0]->{$this->passwordColumn} === $_SESSION['password']) {
            $user[0]->checkMembership();//check member ship 
            return true;
        } else {
            return false;
        }
    }
    

    public function logout() {
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        session_regenerate_id();
    }
    public function isAdmin():bool{
        if(!$this->isLoggedIn()){
            return false;
        }
        return $this->getUser()->getRole()==3;
    }
    public function getUser(): ?object {
	  if ($this->isLoggedIn()) {
	    return $this->users->find($this->usernameColumn, strtolower($_SESSION['username']))[0];
	  }
	  else {
	    return null;
	  }
	}
    public function getRole(): ?int {
        if ($this->isLoggedIn()) {
          return $this->users->find($this->usernameColumn, strtolower($_SESSION['username']))[0]->role;
        }
        else {
          return null;
        }
      }
    public static function describeRole($rn):string{ #rn ->role number
        $roles = [
            1 => 'Student',
            2 => 'Store Owner',
            3 => 'Admin'
        ];
        
        if(array_key_exists($rn,$roles)){
            return $roles[$rn];
        }else{
            return "Unregistered";
        }
       
    }
    public function getRoleName():?string{
        if($this->isLoggedIn()){
            return $this->describeRole($this->getRole());
        }
       return null;
    }
}