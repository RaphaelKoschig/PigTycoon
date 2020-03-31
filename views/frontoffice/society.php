<?php $title = 'Notre entreprise'; ?>

<?php ob_start(); ?>
<div class="row justify-content-center">
</div>
<div class="container containerPig bg-primary" id="society-presentation">
    <div class="row justify-content-center">
        <div class="col col-5">
            <img class="img-fluid" src="./public/images/others/oldpigfarm.png" alt="vieille image de la ferme">
        </div>
        <div class="col col-7 align-self-center">
            <p>Entreprise d'élevage de cochons depuis plus de 100 ans, nous disposons du savoir-faire et de la passion du métier pour vous procurer des porcs d'excellente qualité.</p>
        </div>
    </div>
    <div class="row text-center">
        <div class="col text-center">
            <h3>Notre histoire</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam ad corrupti, nisi accusamus quasi vel, ipsam, maiores voluptas reprehenderit magnam voluptatum harum dolore iste porro in esse a. Sed, veniam!</p>
            <p>Sint illo assumenda aspernatur incidunt, doloremque nam iusto unde aliquid eveniet minima quas at maxime ratione dignissimos placeat accusantium blanditiis, a explicabo! At ipsum voluptatem aliquam expedita vel beatae tempora.</p>
            <p>Voluptates dolor vitae incidunt fuga non cum necessitatibus repellat ab asperiores natus dolores ut itaque nihil ipsam, iure tempore dolorem dicta provident? At odio exercitationem accusamus facere ullam ex itaque?</p>
        </div>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>