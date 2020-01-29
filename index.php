<?php
require('controllers/frontoffice.php');

try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPigs') {
            listPigs();
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
                throw new Exception('Aucun identifiant de cochon envoyé');
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
