<?php
namespace Ciamax\Entity;
use Util\DatabaseTable;
class Menu {
    public $id;
    public $name;
    public $description;
    public $price;
    public $img;
    public $storeId;
    public function __construct(private DatabaseTable $storeTable){

    }
   public function getStore(){
        return $this->storeTable->find('id', $this->storeId)[0];
   }
}