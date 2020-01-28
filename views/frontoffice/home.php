<?php $title = 'Bienvenue à PigTycoon !'; ?>

<?php ob_start(); ?>
<div class="title">
    <h1>PigTycoon, élevage de cochons</h1>
</div>
<p>Slider</p>

<div>
    <h3>Des trucs</h3>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>