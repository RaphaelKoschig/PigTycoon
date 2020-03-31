<?php $title = 'Liste de cochons'; ?>

<?php ob_start(); 

$roundPageLimite = round($pageLimite);
if ($roundPageLimite < $pageLimite) {
    $correctPageMax = $roundPageLimite + 1;
} else {
    $correctPageMax = $roundPageLimite;
}

?>
<div class="container container-basic">
    <?php require('views/components/listPigs/paginator.php'); ?>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 justify-content-center">
        <?php
        while ($pig = $pigs->fetch()) {
        ?>
            <div class="col d-flex justify-content-center">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header text-center">
                        <h4>Cochon N°<?= $pig['id_pig'] ?></h4>
                    </div>
                    <img src="./public/images/photos/<?= $pig['name_photo'] ?>" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h4 class="card-title"><b><?= htmlspecialchars($pig['name_pig']) ?></b></h4>
                        <p class="card-text text-muted">Sexe : <?= $pig['type_sex'] ?></p>
                        <p class="card-text text-muted">Poids : <?= round($pig['weight_pig'], 2) ?> Kg</p>
                        <a href="<?php echo ("index.php?action=pig&id=" . $pig['id_pig']) ?>" class="btn btn-primary">Détails</a>
                    </div>
                </div>
            </div>

        <?php
        }
        $pigs->closeCursor();
        ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>