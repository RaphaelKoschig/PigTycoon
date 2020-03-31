<?php $title = 'Éditer un cochons'; ?>

<?php ob_start(); ?>

<?php
if (!isset($pig) && !isset($listPhotos)) {
    $pig = null;
    $listPhotos = null;
}
?>

<div id="tableAdh" class="container containerPig bg-primary">
    <div class="form-row justify-content-center">
    <h2>Informations du cochon</h2>
    </div>
    <form action="services/editPig.php" method="POST">
        <input type="hidden" name="idform" value="<?php if (isset($_GET['id'])) echo $_GET['id'] ?>">
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4 text-center">
                <label>Nom</label>
                <input type="text" class="form-control" value="<?php if (isset($pig['name_pig'])) echo $pig['name_pig'] ?>" name="nameform" required>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4 text-center">
                <label>Sexe</label>
                <select class="form-control" name="sexform" required>
                    <option <?php if ($_GET['action'] == "newPig") echo " selected " ?> disabled>Choisir...</option>
                    <option value="0" <?php if (isset($pig['sex_pig']) && $pig['sex_pig'] == 0) echo "selected" ?>>Femelle</option>
                    <option value="1" <?php if (isset($pig['sex_pig']) && $pig['sex_pig'] == 1) echo "selected" ?>>Mâle</option>
                </select>
            </div>
            <div class="form-group col-md-4 text-center">
                <label>Poids (en kg, 100 kg max)</label>
                <input type="number" class="form-control" value="<?php if (isset($pig['weight_pig'])) echo $pig['weight_pig'] ?>" name="weightform" min="0" max="100" required>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4 text-center">
                <label>Date de naissance</label>
                <input type="date" class="form-control" value="<?php if (isset($pig['raw_birthdate_pig'])) echo date('Y-m-d', strtotime($pig['raw_birthdate_pig'])) ?>" name="birthdateform" required>
            </div>
            <div class="form-group col-md-4 text-center">
                <label>Heure de naissance</label>
                <input type="time" class="form-control" value="<?php if (isset($pig['raw_birthdate_pig'])) echo date('H:i', strtotime($pig['raw_birthdate_pig'])) ?>" name="birthhourform" required>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4 text-center">
                <label>Date de mort</label>
                <input type="date" class="form-control" value="<?php if (isset($pig['raw_deathdate_pig'])) echo date('Y-m-d', strtotime($pig['raw_deathdate_pig'])) ?>" name="deathdateform" required>
            </div>
            <div class="form-group col-md-4 text-center">
                <label>Heure de mort</label>
                <input type="time" class="form-control" value="<?php if (isset($pig['raw_deathdate_pig'])) echo date('H:i', strtotime($pig['raw_deathdate_pig'])) ?>" name="deathhourform" required>
            </div>
        </div>
        <div id="image-picker-1-block" class="form-row">
            <div class="form-group col-md-12">
                <label>Miniature principale</label>
                <select id="image-picker-1" class="image-picker show-html" name="thumbnailform" required>
                    <?php for ($incrPigPhoto = 1; $incrPigPhoto <= 18; $incrPigPhoto++) { ?>
                        <option data-img-class="imgPicker" data-img-src="./public/images/photos/<?= $incrPigPhoto ?>.jpg" value="<?= $incrPigPhoto ?>">PigPhoto<?= $incrPigPhoto ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div id="image-picker-2-block" class="form-row">
            <div class="form-group col-md-12">
                <label>Photos secondaires (jusqu'à 3 photos optionnelles)</label>
                <select id="image-picker-2" class="image-picker show-html" data-limit="3" multiple="multiple" name="photosform[]">
                    <?php for ($incrPigPhoto = 1; $incrPigPhoto <= 18; $incrPigPhoto++) { ?>
                        <option class="photoOption" data-img-class="imgPicker" data-img-src="./public/images/photos/<?= $incrPigPhoto ?>.jpg" value="<?= $incrPigPhoto ?>">PigPhoto<?= $incrPigPhoto ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary btn-lg" value="Enregistrer" name="validation">Enregistrer</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {

        $("#image-picker-1").imagepicker();
        $("#image-picker-2").imagepicker({
            limit: 3
        });

        var mainPhoto = <?= json_encode($pig) ?>['name_photo'];
        console.log(mainPhoto);
        $("#image-picker-1-block img").each(function(index, el) {
                var truePathname = $(el).attr('src').split('/');
                if (truePathname[4] == mainPhoto) {
                    $(el).click();
                }
            });

        var listPhotos = <?php echo json_encode($listPhotos) ?>;
        jQuery.each(listPhotos, function(photo, data) {
            $("#image-picker-2-block img").each(function(index, el) {
                var truePathname = $(el).attr('src').split('/');
                if (truePathname[4] == data['name_photo']) {
                    $(el).click();
                }
            });
        });
    });
</script>

<?php $content = ob_get_clean(); ?>

<?php require('views/frontoffice/template.php'); ?>