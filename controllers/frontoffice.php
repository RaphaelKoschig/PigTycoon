<?php

require_once('models/Manager.php');
require_once('models/PigManager.php');

function pig()
{
    $pigManager = new PigManager;
    $pig = $pigManager->getPig(2);

    require('views/frontoffice/pig.php');
}

function listPigs()
{
    $pigManager = new PigManager;
    $pigs = $pigManager->getPigs();

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