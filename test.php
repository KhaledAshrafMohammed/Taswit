<?php
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('taswit-9fb26-firebase-adminsdk-7adww-f99bc54816.json')
    ->withDatabaseUri('https://taswit-9fb26-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$ref_table = "contactx";
$fetchdata = $database->getReference($ref_table)->getValue();
print_r($fetchdata); 
// die(print_r($database));

?>