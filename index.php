<?php
require('controllers/frontoffice.php');

try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPigs') {
            listPigs();
        }
        else if ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                pig();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
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
