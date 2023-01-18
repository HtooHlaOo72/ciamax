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
    
}