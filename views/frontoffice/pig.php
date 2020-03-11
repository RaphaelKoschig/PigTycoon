<?php $title = 'Un cochon'; ?>

<?php ob_start(); ?>
<div class="container newpig bg-primary">
    <div class="row">
        <div class="col-6 align-self-center text-center">
            <div class="row justify-content-center">
                <a class="gallery" href="./public/images/photos/<?= $pig['name_photo'] ?>">
                    <img src="./public/images/photos/<?= $pig['name_photo'] ?>" alt="" width="400px" class="img-fluid">
                </a>
            </div>
            <div class="row justify-content-center">
                <?php
                while ($photo = $photos->fetch()) {
                ?>
                    <a class="gallery" href="./public/images/photos/<?= $photo['name_photo'] ?>">
                        <img src="./public/images/photos/<?= $photo['name_photo'] ?>" alt="" width="100px" class="img-fluid">
                    </a>
                <?php
                }
                $photos->closeCursor();
                ?>
            </div>
        </div>
        <div class="col-6 align-self-center">
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
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 align-self-center">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio est quisquam sed dolore nesciunt adipisci repellendus! Modi deserunt laudantium neque,
                temporibus alias quidem dolor fugit, repellendus maxime eaque commodi excepturi.</p>
        </div>
    </div>
</div>
<div class="container">

</div>

<script>
    jQuery(document).ready(function() {
        jQuery('a.gallery').colorbox({
            opacity: 0.5,
            rel: 'group1'
        });
    });
</script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>