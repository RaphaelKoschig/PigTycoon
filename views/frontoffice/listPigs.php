<?php $title = 'Liste de cochons'; ?>

<?php ob_start(); ?>
<h1>PigTycoon</h1>
<p>Liste de cochons</p>

<?php
while ($pig = $pigs->fetch()) {
?>
    <div class="container">
        <h3>
            <?= htmlspecialchars($pig['name_pig']) ?>
            <em>né le <?= $pig['birthdate_pig'] ?></em>
        </h3>
    </div>
<?php
}
$pigs->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>