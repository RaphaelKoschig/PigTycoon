<?php
require_once('models/Manager.php');
require_once('models/PigManager.php');

function getTreeBranch($pig_id)
{
    $pigManager = new PigManager();

    $pig = $pigManager->getPig($pig_id);

    if ($pig['mother_pig'] != null && $pig['father_pig'] != null) { ?>
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
        <div class="row justify-content-center ">
            <div class="col col-4 text-right motherLink">
                Mère
            </div>
            <div class="col col-2"></div>
            <div class="col col-4 text-left fatherLink">
                Père
            </div>
        </div>
<?php }
    return $pig;
}

?>