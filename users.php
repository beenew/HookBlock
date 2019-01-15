<?php
require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class Users{

    protected $database;
    protected $dbname ='rawProduct';
    protected $supplierid='6rCzU75g6aUDkd9da6XX1jYdi6N2';

    public function __construct() {    
    
        $acc = ServiceAccount::fromJsonFile(__DIR__.'/secret/scmdb-b68fe-5d15494d4aae.json');
        $firebase=(new Factory)->withServiceAccount($acc)->create();
        $this->database = $firebase->getDatabase();


}

public function getitem(string $userID = Null){
    if (empty($userID) || !isset($userID)) { return FALSE; }
    if ($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userID)){
        return $this->database->getReference($this->dbname)->getChild($userID)->getValue();
    } else {
        return FALSE;
    }
}

public function insert(array $data) {
    if (empty($data) || !isset($data)) { return FALSE; }
    foreach ($data as $key => $value){
        $lot=76;
        $this->database->getReference()->getChild($this->dbname)->getChild($this->supplierid)->getchild($lot)->getchild($key)->set($value);
    }
    return TRUE;
}


}

$users =new Users();

// var_dump($users->getitem("-LWBHie1duoshokJParj"));

var_dump($users->insert([
    'catchDate' => '16/0/2019',
    'catchLocation' => 'Pakistan',
    'lotId' => '76',
    'name'=>'notfishy',
    'weight'=>'900'
]));

// $myArr = array();
// $myArr=$users->getitem("-LWBHie1duoshokJParj");

// echo $myArr['price'];


?>