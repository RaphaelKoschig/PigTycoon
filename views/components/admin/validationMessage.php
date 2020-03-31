<?php

if (isset($_SESSION["message"])) {
    if ($_SESSION["message"] == 'update') { ?>
        <div class="validationContainer fadeOut">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <h5>Le cochon a bien été mis à jour !</h5>
                </div>
            </div>
        </div>
    <?php } elseif ($_SESSION["message"] == 'create') { ?>
        <div class="validationContainer fadeOut">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <h5>Le cochon a bien été créé !</h5>
                </div>
            </div>
        </div>
    <?php  } elseif ($_SESSION["message"] == 'delete') { ?>
        <div class="validationContainer fadeOut">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <h5>Le cochon a bien été supprimé !</h5>
                </div>
            </div>
        </div>
    <?php } elseif ($_SESSION["message"] == 'generate') { ?>
        <div class="validationContainer fadeOut">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <h5>Les cochons ont bien été générés !</h5>
                </div>
            </div>
        </div>
    <?php } elseif ($_SESSION["message"] == 'kill') { ?>
        <div class="validationContainer fadeOut">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <h5>Le cochon a bien été tué !</h5>
                </div>
            </div>
        </div>
    <?php } elseif ($_SESSION["message"] == 'reproduce') { ?>
        <div class="validationContainer fadeOut">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <h5>Les cochons se sont reproduits ! <?= $_SESSION["randChildren"] ?> petits cochons sont nés !</h5>
                </div>
            </div>
        </div>
    <?php }
} ?>