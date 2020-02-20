<?php $title = 'Liste de cochons'; ?>

<?php ob_start(); ?>
<h1>PigTycoon</h1>
<p>Liste de cochons</p>

<div class="container">
    <div class="row justify-content-center">
        <nav aria-label="Page navigation article">
            <ul class="pagination">
                <?php if ($numpage != 1) { ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?action=listPigs&page=<?php echo ($numpage - 1); ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo; Précédent</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($numpage < $pageLimite) { ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?action=listPigs&page=<?php echo ($numpage + 1); ?>" aria-label="Next">
                            <span aria-hidden="true">Suivant &raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="card-group">
            <div class="row row-cols-3 row-cols-md-3 row-cols-sm-1">
                <?php
                while ($pig = $pigs->fetch()) {
                ?>
                    <div class="col d-flex justify-content-center">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Cochon N°<?= $pig['id_pig'] ?></div>
                            <img src="./public/images/photos/<?= $pig['name_photo'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($pig['name_pig']) ?></h5>
                                <p class="card-text">Sexe : <?= $pig['type_sex'] ?></p>
                                <p class="card-text">Né le : <?= $pig['birthdate_pig'] ?></p>
                                <p class="card-text">Poids : <?= $pig['weight_pig'] ?> Kg</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <a href="#" class="btn btn-primary">Détails</a>
                            </div>
                        </div>
                    </div>

                <?php
                }
                $pigs->closeCursor();
                ?>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>