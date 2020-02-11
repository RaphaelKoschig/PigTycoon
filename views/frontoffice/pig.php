<?php $title = 'Un cochon'; ?>

<?php ob_start(); ?>
<h1>PigTycoon</h1>
<p>Voici un beau cochon</p>

<div class="container">
    <h3>
        <?= htmlspecialchars($pig['name_pig']) ?>
        <em>né le <?= $pig['birthdate_pig'] ?></em>
    </h3>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>