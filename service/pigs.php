<?php

require_once('../models/Manager.php');
require_once('../models/PigManager.php');

$pigManager = new PigManager;

$request = $pigManager->getPigs();
$response = $request->fetchAll();
$count = $request->rowCount();

for ($ipig=0; $ipig < $count ; $ipig++) { 
    //array_push($array, $res[$iville]['nom_ville']);
    $pig['name'] = utf8_encode($response[$ipig]['name_pig']);
    $pig['label'] = utf8_encode($response[$ipig]['name_pig']);
    $pig['poids'] = utf8_encode($response[$ipig]['weight_pig']);
    $matches[] = $pig;
}

echo json_encode($matches);