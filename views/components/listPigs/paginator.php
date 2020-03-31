<?php 
function createPagination($numberPage, $actualPage, $weight, $sex){
    if ($numberPage == $actualPage) {
        $active = "active";
    } else {
        $active = "";
    }
    
    echo 
    '<div class="col col-1">
        <ul class="pagination">
            <li class="page-item">
                <form action="index.php?action=listPigs&page='.$numberPage.'" method="post">
                    <input type="hidden" name="selectWeight" value="'.$weight.'" />
                    <input type="hidden" name="selectSex" value="'.$sex.'" />
                    <button type="submit" class="btn btn-primary mb-2 '.$active.'">'.$numberPage.'</button>
                </form>
            </li>
        </ul>
    </div>';
};
function createDisabledPagination(){
    echo
    '<div class="col col-1">
        <ul class="pagination">
            <li class="page-item">
                <form action="" method="post">
                    <button type="submit" class="btn btn-primary mb-2" disabled>...</button>
                </form>
            </li>
        </ul>
    </div>';
}
?>

<div class="row justify-content-center">
    <div class="col col-10">
        <div class="row justify-content-center">
            <div class="col col-2">
                <ul class="pagination">
                    <?php if ($numpage != 1) { ?>
                        <li class="page-item">
                            <form action="index.php?action=listPigs&page=<?php echo ($numpage - 1); ?>" method="post">
                                <input type="hidden" name="selectWeight" value="<?= $weight ?>" />
                                <input type="hidden" name="selectSex" value="<?= $sex ?>" />
                                <button type="submit" class="btn btn-primary mb-2">&laquo; Précédent</button>
                            </form>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <?php
            if (ceil($pageLimite) > 5) {
                createPagination(1, $numpage, $weight, $sex); 
                if ($numpage == 1) { 
                    createPagination(2, $numpage, $weight, $sex);
                    createPagination(3, $numpage, $weight, $sex);
                    createDisabledPagination();
                }
                elseif ($numpage == 2) {
                    createPagination(2, $numpage, $weight, $sex);
                    createPagination(3, $numpage, $weight, $sex);
                    createDisabledPagination();
                }
                elseif ($numpage == 3) {
                    createPagination(2, $numpage, $weight, $sex);
                    createPagination(3, $numpage, $weight, $sex);
                    createPagination(4, $numpage, $weight, $sex);
                    createDisabledPagination();
                }
                elseif ($numpage == ceil($pageLimite) - 2) {
                    createDisabledPagination();
                    createPagination(ceil($pageLimite)-3, $numpage, $weight, $sex);
                    createPagination(ceil($pageLimite)-2, $numpage, $weight, $sex);
                    createPagination(ceil($pageLimite)-1, $numpage, $weight, $sex);
                } 
                elseif ($numpage == ceil($pageLimite) - 1) {
                    createDisabledPagination();
                    createPagination(ceil($pageLimite)-2, $numpage, $weight, $sex);
                    createPagination(ceil($pageLimite)-1, $numpage, $weight, $sex);
                }   
                elseif ($numpage == ceil($pageLimite)) {
                    createDisabledPagination();
                    createPagination(ceil($pageLimite)-2, $numpage, $weight, $sex);
                    createPagination(ceil($pageLimite)-1, $numpage, $weight, $sex);
                } 
                elseif (ceil($pageLimite) > 3) {
                    createDisabledPagination();
                    createPagination($numpage - 1, $numpage, $weight, $sex);
                    createPagination($numpage, $numpage, $weight, $sex);
                    createPagination($numpage + 1, $numpage, $weight, $sex);
                    createDisabledPagination(); 
                }
                if (ceil($pageLimite) != 1) { 
                createPagination(ceil($pageLimite), $numpage, $weight, $sex); 
                }
            } else {
                for ($i=1; $i <= ceil($pageLimite); $i++) { 
                    createPagination($i, $numpage, $weight, $sex);
                }
            }
            
 ?>
            <div class="col col-2">
                <ul class="pagination">
                    <?php if ($numpage < $pageLimite) { ?>
                        <li class="page-item">
                            <form action="index.php?action=listPigs&page=<?php echo ($numpage + 1); ?>" method="post">
                                <input type="hidden" name="selectWeight" value="<?= $weight ?>" />
                                <input type="hidden" name="selectSex" value="<?= $sex ?>" />
                                <button type="submit" class="btn btn-primary mb-2" id="">Suivant &raquo;</button>
                            </form>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>