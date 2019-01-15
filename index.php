<?php
require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/secret/scmdb-b68fe-5d15494d4aae.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

$database = $firebase->getDatabase();
die(print_r($database));
?>