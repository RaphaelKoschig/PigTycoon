<?php
session_start();
require('../models/Manager.php');
require('../models/PigManager.php');
$pigManager = new PigManager;

$fullbirthdate =  $_POST['birthdateform']." ".$_POST['birthhourform'];
$fulldeathdate =  $_POST['deathdateform']." ".$_POST['deathhourform'];

if ($_POST['idform'] != "") {
    $pigManager->updatePig($_POST['idform'],
        $_POST['nameform'], $_POST['sexform'], $_POST['weightform'], 
        $fullbirthdate, $fulldeathdate, $_POST['thumbnailform']
    );

    $pigManager->deleteLinkedPhotos($_POST['idform']);

    foreach ($_POST['photosform'] as $photoId)
    $pigManager->linkPhoto($_POST['idform'], $photoId);

    $_SESSION["message"]='update';

    header('Location: ../index.php?action=adminListPigs');
} 
else {
    $pigManager->createPig(
        $_POST['nameform'], $_POST['sexform'], $_POST['weightform'], 
        $fullbirthdate, $fulldeathdate, $_POST['thumbnailform']
    );
    
    $idNewPig = ($pigManager->getLastPig())[0]['id_pig'];
    
    foreach ($_POST['photosform'] as $photoId)
        $pigManager->linkPhoto($idNewPig, $photoId);

    $_SESSION["message"]='create';    

    header('Location: ../index.php?action=adminListPigs');
}




