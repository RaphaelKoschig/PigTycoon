<?php $title = 'Génération aléatoire de cochons'; ?>

<?php ob_start(); ?>

<div class="container containerPig bg-primary text-center">
    <form action="services/generatePigs.php" method="post">
        <div class="form-row justify-content-center">
            <div class="form-group col-6">
                <h2>Génération aléatoire de cochons</h2>
                <label for="numberPigsGenerated">Combien de cochons voulez-vous générer ? (max 100)</label>
                <input type="number" class="form-control text-center" name="numberPigs" id="numberPigsGenerated" min="0" max="100" required>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-3">
                <button type="submit" class="btn btn-lg btn-info" value="Enregistrer" name="validation">Générer !</button>
            </div>
            <div class="form-group col-4">
                <a class="btn btn-lg btn-primary" href="index.php?action=adminListPigs">Revenir à la liste des cochons</a>
            </div>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/frontoffice/template.php'); ?>