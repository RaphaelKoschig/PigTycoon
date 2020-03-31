<?php

require_once('models/Manager.php');
require_once('models/PigManager.php');

function adminListPigs()
{
    $pigManager = new PigManager;
    $pigs = $pigManager->getPigs();

    require('views/backoffice/adminListPigs.php');
};

function updatePig()
{
    $pigManager = new PigManager;
    $pig = $pigManager->getPig($_GET['id']);
    if ($pig != null) {
        $photos = $pigManager->getPigPhotos($_GET['id']);
        $listPhotos = $photos->fetchAll(PDO::FETCH_ASSOC);
        require('views/backoffice/updatePig.php');
    } else {
        require('views/frontoffice/error.php');
    }
};

function deletePig()
{
    $pigManager = new PigManager;
    $pig = $pigManager->getPig($_GET['id']);
    if ($pig != null) {
        require('views/backoffice/deletePig.php');
    } else {
        require('views/frontoffice/error.php');
    }
}

function killPig()
{
    $pigManager = new PigManager;
    $pig = $pigManager->getPig($_GET['id']);
    if ($pig != null) {
        require('views/backoffice/killPig.php');
    } else {
        require('views/frontoffice/error.php');
    }
}

function newPig()
{
    require('views/backoffice/updatePig.php');
};

function generatePigs()
{
    require('views/backoffice/generatePigs.php');
};

function reproducePigs()
{
    $pigManager= new PigManager;
    $malePigs = $pigManager->getMalePigs();
    $femalePigs = $pigManager->getFemalePigs();
    require('views/backoffice/reproducePigs.php');
};

function genealogyPig()
{
    $pigManager = new PigManager;
    $pig = $pigManager->getPig($_GET['id']);
    if ($pig != null) {
        require('views/backoffice/genealogyPig.php');
    } else {
        require('views/frontoffice/error.php');
    }
};