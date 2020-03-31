<?php
session_start();
require('../models/Manager.php');
require('../models/PigManager.php');
$pigManager = new PigManager;

$pigManager->deletePig($_POST['idform']);

$_SESSION["message"]='delete';

header('Location: ../index.php?action=adminListPigs');