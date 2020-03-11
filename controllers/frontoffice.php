<?php

require_once('models/Manager.php');
require_once('models/PigManager.php');

function pig()
{
    $pigManager = new PigManager;
    $pig = $pigManager->getPig($_GET['id']);
    $photos = $pigManager->getPigPhotos($_GET['id']);

    require('views/frontoffice/pig.php');
}

function listPigs()
{
    $numpage = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 6;
    $debut = ($numpage - 1) * $limite;
    $pigManager = new PigManager;
    $pigs = $pigManager->getPageOf6Pigs($debut, $limite);
    $pageLimite = (($pigManager->getNumberOfAlivePigs())['total_alive_pigs'] / $limite);
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
    $pigManager = new PigManager;

    $lastPigs = $pigManager->get3LastPig();

    $maxPigs = $pigManager->getCountPig();
    $randomId1 = random_int(1, $maxPigs);
    do {
        $randomId2 = random_int(1, $maxPigs);
    } while ($randomId1 == $randomId2);
    $randomPig1 = $pigManager->getPig($randomId1);
    $randomPig2 = $pigManager->getPig($randomId2);

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
