<?php $title = 'Un cochon'; ?>

<?php ob_start(); ?>
<div class="container text-center">
    <h1>Qu'il est beau ce cochon</h1>
</div>
<div class="container newpig">
    <div class="row">
        <div class="col-4 align-self-center">
            <img src="./public/images/photos/<?= $pig['name_photo'] ?>" alt="" width="400px" class="img-fluid">
        </div>
        <div class="col-8 align-self-center">
            <div class="row">
                <h4>
                    Cochon <?= $pig['id_pig'] ?> : <?= htmlspecialchars($pig['name_pig']) ?>
                </h4>
            </div>
            <div class="row">
                <p><em>né le <?= $pig['birthdate_pig'] ?></em></p>
            </div>
            <div class="row">
                <h5>
                    <p>Durée de vie : <?php echo ($pig['deathtime_pig']) . " jours" ?></p>
                    <p>Sexe : <?php echo ($pig['type_sex']) ?></p>
                    <p>Poids : <?php echo ($pig['weight_pig']) ?> Kg</p>
                </h5>
            </div>
            <div class="row">
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio est quisquam sed dolore nesciunt adipisci repellendus! Modi deserunt laudantium neque,
                        temporibus alias quidem dolor fugit, repellendus maxime eaque commodi excepturi.</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <img>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>