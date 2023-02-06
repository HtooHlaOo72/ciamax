<?php
use Util\DatabaseTable;
class MenuHistory{
    public $id;
    public $memberId;
    public $date;
    public $menuId;
    public function __construct(DatabaseTable $membershipTable){

    }

    
}