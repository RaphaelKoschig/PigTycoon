<?php $title = 'Erreur !'; ?>

<?php ob_start(); ?>

<div class="container containerPig bg-primary">
    <div class="row">
        <div class="col text-center">
            <h3>Cet identifiant ne correspond à aucun cochon !</h3>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>