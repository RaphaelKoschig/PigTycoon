<?php require_once('views/components/admin/genealogyTree.php'); ?>
<?php $title = 'Généalogie d\'un cochon'; ?>

<?php ob_start(); ?>

<div class="container genealogyTree text-center bg-primary containerPig">
    <h4>Arbre généalogique de <?= $pig['name_pig'] ?></h4>
    <?php if ($pig['mother_pig'] != null && $pig['father_pig'] != null) { ?>
        <div class="row justify-content-center">
            <div class="col col-6 text-center">
                <?php $pigmother = getTreeBranch($pig['mother_pig']) ?>
            </div>
            <div class="col col-6 text-center">
                <?php $pigfather = getTreeBranch($pig['father_pig']) ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-4 text-center genCase">
                <a href="index.php?action=genealogyPig&id=<?= $pig['mother_pig']; ?>">
                    <?= $pig['mother_name'] ?>
                </a>
                |
                <a href="index.php?action=pig&id=<?= $pig['mother_pig']; ?>">
                    <small class="text-muted">détails</small>
                </a>
            </div>
            <div class="col col-1"></div>
            <div class="col col-4 text-center genCase">
                <a href="index.php?action=genealogyPig&id=<?= $pig['father_pig']; ?>">
                    <?= $pig['father_name'] ?>
                </a>
                |
                <a href="index.php?action=pig&id=<?= $pig['father_pig']; ?>">
                    <small class="text-muted">détails</small>
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-4 text-right motherLink align-items-center">
                Mère
            </div>
            <div class="col col-2"></div>
            <div class="col col-4 text-left fatherLink">
                Père
            </div>
        </div>
    <?php } ?>
    <div class="row justify-content-center">
        <div class="col col-4 text-center genCase">
            <?= $pig['name_pig'] ?>
            |
            <a href="index.php?action=pig&id=<?= $pig['id_pig']; ?>">
                <small class="text-muted">détails</small>
            </a>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/frontoffice/template.php'); ?>