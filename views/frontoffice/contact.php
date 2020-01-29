<?php $title = 'Nous contacter'; ?>

<?php ob_start(); ?>
<h1>PigTycoon</h1>
<p>Formulaire de contact</p>

<div>
    <h3>Des trucs</h3>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>