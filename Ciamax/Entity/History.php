<?php
namespace Ciamax\Entity;

use Util\DatabaseTable;
class History{
    public $id;
    public $memberId;

    public $menuId;

    public $date;

    public $status;
    public $type;
    public function __construct(DatabaseTable $memberTable,DatabaseTable $menutable){

    }
    
}