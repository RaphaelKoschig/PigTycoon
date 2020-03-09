<?php

require_once('../models/Manager.php');

$db = new PDO('mysql:host=localhost;dbname=pigtycoon;charset=utf8', 'root');

$req = "SELECT name_pig
            FROM pig 
            WHERE name_pig 
            LIKE '" . $_GET['term'] . "%'
            ORDER BY name_pig ASC";

$request = $db->query($req);
$response = $request->fetchAll();
$count = $request->rowCount();

for ($ipig=0; $ipig < $count ; $ipig++) { 
    //array_push($array, $res[$iville]['nom_ville']);
    $pig['name'] = utf8_encode($response[$ipig]['name_pig']);
    $pig['label'] = utf8_encode($response[$ipig]['name_pig']);
    $matches[] = $pig;
}

echo json_encode($matches);