<?php
require('controllers/frontoffice.php');
require('controllers/backoffice.php');

try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPigs') {
            listPigs();
        }
        else if ($_GET['action'] == 'adminListPigs') {
            adminListPigs();
        }
        else if ($_GET['action'] == 'newPig') {
            newPig();
        }
        else if ($_GET['action'] == 'generatePigs') {
            generatePigs();
        }
        else if ($_GET['action'] == 'reproducePigs') {
            reproducePigs();
        }
        else if ($_GET['action'] == 'society') {
            society();
        }
        else if ($_GET['action'] == 'contact') {
            contact();
        }
        else if ($_GET['action'] == 'pig') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                pig();
            }
            else {
                error();
            }
        }
        else if ($_GET['action'] == 'updatePig') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatePig();
            }
            else {
                error();
            }
        }
        else if ($_GET['action'] == 'deletePig') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePig();
            }
            else {
                error();
            }
        }
        else if ($_GET['action'] == 'killPig') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                killPig();
            }
            else {
                error();
            }
        }
        else if ($_GET['action'] == 'genealogyPig') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                genealogyPig();
            }
            else {
                error();
            }
        }
    }
    else {
        home();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
