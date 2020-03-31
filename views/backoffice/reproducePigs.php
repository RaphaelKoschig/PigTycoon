<?php $title = 'Reproduction de cochons'; ?>

<?php ob_start();?>

<div class="container containerPig bg-primary text-center">
    <h2>Reproduire des cochons</h2>
    <form action="services/reproducePigs.php" method="post">
        <div class="form-row justify-content-center">
            <div class="form-group col-4">
                <label for="selectMale">Choisissez un cochon mâle</label>
                <select class="form-control" id="selectMale" name="selectMale">
                    <?php
                    while ($malePig = $malePigs->fetch()) {
                    ?>
                        <option value="<?= $malePig['id_pig'] ?>"><?= $malePig['name_pig'].' / poids : '.$malePig['weight_pig'].' kg' ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-4">
                <label for="selectFemale">Choisissez une cochonne femelle</label>
                <select class="form-control" id="selectFemale" name="selectFemale">
                <?php
                    while ($femalePig = $femalePigs->fetch()) {
                    ?>
                        <option value="<?= $femalePig['id_pig'] ?>"><?= $femalePig['name_pig'].' / poids : '.$femalePig['weight_pig'].' kg' ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-4">
                <button type="submit" class="btn btn-lg btn-info" value="Enregistrer" name="validation">Reproduisez-vous, les cochons !</button>
            </div>
            <div class="form-group col-4">
                <a class="btn btn-lg btn-primary" href="index.php?action=adminListPigs">Revenir à la liste des cochons</a>
            </div>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/frontoffice/template.php'); ?>