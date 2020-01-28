<?php $title = 'Erreur !'; ?>

<?php ob_start(); ?>
<h1>PigTycoon</h1>
<p><a href="index.php">Revenir à l'accueil</a></p>

<div>
    <h3>Une erreur est survenue, pas de bol !</h3>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>