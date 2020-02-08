<?php $title = 'Notre entreprise'; ?>

<?php ob_start(); ?>

<div class="container" id="society-presentation">
    <div class="row justify-content-center">
        <h1>PigTycoon</h1>
    </div>
    <div class="row text-center">
        <div class="col">
            <img src="./public/images/others/oldpigfarm.png" alt="">
        </div>
        <div class="col center-block">
            <p>Entreprise d'élevage de cochons depuis plus de 100 ans, nous disposons du savoir-faire et de la passion du métier pour vous procurer des porcs d'excellente qualité.</p>
        </div>
    </div>
    <div class="row text-center">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur laudantium repudiandae incidunt commodi nam aspernatur est quis itaque, saepe, explicabo ipsam labore facilis vero. Tenetur sunt perferendis animi reprehenderit. Voluptatem?</p>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>