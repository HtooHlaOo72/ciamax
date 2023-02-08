<?php
namespace Ciamax\Controllers;
use Util\Authentication;
use Util\DatabaseTable;
class Member{
    public function __construct(private DatabaseTable $userTable,private DatabaseTable $storeTable,private DatabaseTable $memberTable,private Authentication $authentication){

    }
    public function list($storeId=null){
        $members = [];
        if($storeId){
            $members = $this->memberTable->find("storeId", $storeId);
        }else{
            $members = $this->memberTable->findAll();
        }
        return [
            'template'=>"memberlist.html.php",
            'title'=>'Member List',
            'variables'=>[
                "members"=>$members,
            ]
        ];
    }
    public function request(){
        $stores = $this->storeTable->findAll();
        return [
            "template" => "memberreq.html.php",
            "title" => "Membership Form",
            "variables" => [
                "stores"=>$stores,
            ],
        ];
    }
    public function requestSubmit(){

    }
}