<?php $title = 'Suppression d\'un cochon'; ?>

<?php ob_start(); ?>

<div class="container containerPig bg-primary">
    <div class="row justify-content-md-center">
        <div class="col-md-auto text-center">
            <h2>Etes-vous sûr de vouloir supprimer le cochon <br /><?php echo $pig['name_pig'] . ' n°' . $pig['id_pig']; ?> ?</h2>
            <br>
            <form action="services/deletePig.php" method="POST">
                <div class="row justify-content-md-center">
                    <div class="form col-justify-content-md-center">
                        <input type="hidden" name="idform" value="<?php echo $pig['id_pig'] ?>">
                        <button type="submit" class="btn btn-danger btn-lg" value="delete">Oui supprimer !</button>
                        <a class="btn btn-primary btn-lg" href="index.php?action=adminListPigs">Non. Revenir à la liste.</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/frontoffice/template.php'); ?>