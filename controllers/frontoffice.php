<?php

require_once('models/Manager.php');
require_once('models/PigManager.php');

function pig()
{
    $pigManager = new PigManager;
    $pig = $pigManager->getPig($_GET['id']);
    if ($pig != null) {
        $photos = $pigManager->getPigPhotos($_GET['id']);

        require('views/frontoffice/pig.php');
    }
    else{
        require('views/frontoffice/error.php');
    }

}

function listPigs()
{
    $numpage = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 6;
    $debut = ($numpage - 1) * $limite;
    $pigManager = new PigManager;

    if (isset($_POST['selectSex']) && isset($_POST['selectWeight']) && $_POST['selectSex'] != null && $_POST['selectWeight'] != null) {
        $sex = $_POST['selectSex'];
        $weight = $_POST['selectWeight'];

        $pigs = $pigManager->getPageOf6PigsSorted($_POST['selectSex'], $_POST['selectWeight'], $debut, $limite);
        $pigtest = ($pigManager->getNumberOfPigsSorted($_POST['selectSex'], $_POST['selectWeight']))['total_alive_pigs'];
        $pageLimite = (($pigManager->getNumberOfPigsSorted($_POST['selectSex'], $_POST['selectWeight']))['total_alive_pigs'] / $limite);
    } else {
        $sex = null;
        $weight = null;
        $pigs = $pigManager->getPageOf6Pigs($debut, $limite);
        $pageLimite = (($pigManager->getNumberOfPigs())['total_alive_pigs'] / $limite);
    }

    if (($_GET['page'] > ($pageLimite + 1)) || ($_GET['page'] < 0) || !(is_numeric($_GET['page']))) {
        header("location:index.php?action=listPigs&page=1");
    };

    require('views/frontoffice/listPigs.php');
}

function error()
{
    require('views/frontoffice/error.php');
}

function home()
{
    require('services/ListName.php');
    $pigManager = new PigManager;

    $numberOfAlivePigs = $pigManager->getNumberOfAlivePigs();

    if ($numberOfAlivePigs['total_alive_pigs'] < 10) {
        for ($incrRandPig = 0; $incrRandPig < 10; $incrRandPig++) {
            $randName = rand(0, (count($listName) - 1));
        
            $pigManager->createRandomPig($listName[$randName]);
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
    }

    $lastPigs = $pigManager->get3LastPig();

    $limitIdPigs = $pigManager->getMinAndMaxIdPig();

    do {
        $randomId1 = random_int($limitIdPigs['min_id_pig'], $limitIdPigs['max_id_pig']);
        $randomPig1 = $pigManager->getPig($randomId1);
    } while ($randomPig1 == null);
    
    do {
        $randomId2 = random_int($limitIdPigs['min_id_pig'], $limitIdPigs['max_id_pig']);
        $randomPig2 = $pigManager->getPig($randomId2);
    } while ($randomId1 == $randomId2 || $randomPig2 == null);
    require('views/frontoffice/home.php');
}

function society()
{
    require('views/frontoffice/society.php');
}

function contact()
{
    require('views/frontoffice/contact.php');
}
