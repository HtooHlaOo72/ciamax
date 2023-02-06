<?php
use Util\DatabaseTable;
class History{
    public $id;
    public $memberId;

    public $menuId;

    public $date;

    public function __construct(DatabaseTable $memberTable,DatabaseTable $menutable){

    }

}