<?php $title = 'Tuer un cochon'; ?>

<?php ob_start(); ?>

<div class="container containerPig bg-primary text-center">
    <div class="row justify-content-md-center">
        <div class="col-md-auto text-center">
            <h2>Etes-vous sûr de vouloir tuer ce cochon <br /><?php echo $pig['name_pig'] . ' n°' . $pig['id_pig']; ?> ?</h2>
            <h6>(Sa date de mort sera mise à jour)</h6>
            <br>
            <form action="services/killPig.php" method="POST">
                <div class="row justify-content-md-center">
                    <div class="form col-justify-content-md-center">
                        <input type="hidden" name="idform" value="<?php echo $pig['id_pig'] ?>">
                        <button type="submit" class="btn btn-danger btn-lg" value="delete">Oui, tuons ce cochon !</button>
                        <a class="btn btn-primary btn-lg" href="index.php?action=adminListPigs">Non ! C'est trop cruel.</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/frontoffice/template.php'); ?>