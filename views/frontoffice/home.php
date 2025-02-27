<?php $title = 'Bienvenue à PigTycoon !'; ?>

<?php ob_start(); ?>
<div class="container container-home">
    <div class="row justify-content-center">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./public/images/photos/<?= $lastPigs[0]['name_photo'] ?>" class="d-block img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <p><?= htmlspecialchars($lastPigs[0]['name_pig']) ?></p>
                        <a href=<?php echo("index.php?action=pig&id=".$lastPigs[0]['id_pig']) ?> ><button type="button" class="btn btn-primary">Détails</button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./public/images/photos/<?= $lastPigs[1]['name_photo'] ?>" class="d-block img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <p><?= htmlspecialchars($lastPigs[1]['name_pig']) ?></p>
                        <a href=<?php echo("index.php?action=pig&id=".$lastPigs[1]['id_pig']) ?>><button type="button" class="btn btn-primary">Détails</button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./public/images/photos/<?= $lastPigs[2]['name_photo'] ?>" class="d-block img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <p><?= htmlspecialchars($lastPigs[2]['name_pig']) ?></p>
                        <a href=<?php echo("index.php?action=pig&id=".$lastPigs[2]['id_pig']) ?>><button type="button" class="btn btn-primary">Détails</button></a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <?php require('views/components/home/searchengine.php'); ?>
    <?php require('views/components/home/newpigs.php'); ?>

</div>
<script type="text/javascript">
    $('.carousel').carousel({
        interval: 5000
    })
</script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>