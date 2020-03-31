<?php
session_start();
require('../models/Manager.php');
require('../models/PigManager.php');
require('ListName.php');
$pigManager = new PigManager;

$randChildren = rand(1, 8);

for ($incrRandPig = 0; $incrRandPig < $randChildren; $incrRandPig++) {
    $randName = rand(0, (count($listName) - 1));

    $pigManager->createRandomPigWithParents($listName[$randName], $_POST['selectFemale'], $_POST['selectMale']);
    $idNewPig = ($pigManager->getLastPig())[0]['id_pig'];

    $randPhoto1 = rand(1, 18);
    $pigManager->linkPhoto($idNewPig, $randPhoto1);
    do {
        $randPhoto2 = rand(1, 18);
    } while ($randPhoto2 == $randPhoto1);
    $pigManager->linkPhoto($idNewPig, $randPhoto2);
    do {
        $randPhoto3 = rand(1, 18);
    } while ($randPhoto3 == $randPhoto2 || $randPhoto3 == $randPhoto1);
    $pigManager->linkPhoto($idNewPig, $randPhoto3);
}

$_SESSION["message"]= 'reproduce';
$_SESSION["randChildren"] = $randChildren;

header('Location: ../index.php?action=adminListPigs');