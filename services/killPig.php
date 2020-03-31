<?php
session_start();
require('../models/Manager.php');
require('../models/PigManager.php');
$pigManager = new PigManager;

$pigManager->killPig($_POST['idform']);

$_SESSION["message"]='kill';

header('Location: ../index.php?action=adminListPigs');