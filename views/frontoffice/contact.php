<?php $title = 'Nous contacter'; ?>

<?php ob_start(); ?>
<div class="container contact-form containerPig bg-primary">
    <form>
        <div class="form-group row justify-content-center">
            <label for="inputLastname" class="sr-only">Nom</label>
            <div class="col col-4">
                <input class="form-control" id="inputLastname" placeholder="Nom">
            </div>
            <label for="inputName" class="sr-only">Prénom</label>
            <div class="col col-4">
                <input class="form-control" id="inputName" placeholder="Prénom">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="inputEmail" class="sr-only">Email</label>
            <div class="col col-4">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <label for="inputPhone" class="sr-only">Téléphone</label>
            <div class="col col-4">
                <input class="form-control" id="inputPhone" placeholder="Téléphone">
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row justify-content-center align-items-center">
                <legend class="col col-form-label col-3">Votre message concerne : </legend>
                <div class="col col-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="contactRadios" id="radioCochon" value="option1" checked>
                        <label class="form-check-label" for="radioCochon">
                            Commande de cochons
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="contactRadios" id="radioInfo" value="option2">
                        <label class="form-check-label" for="radioInfo">
                            Informations société
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="contactRadios" id="radioRdv" value="option3">
                        <label class="form-check-label" for="radioRdv">
                            Prise de RDV
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="contactRadios" id="radioReclam" value="option4">
                        <label class="form-check-label" for="radioReclam">
                            Réclamation
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row justify-content-center">
            <div class="col col-8 text-center">
            <label for="contactMessage">Message</label>
            <textarea class="form-control" id="contactMessage" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <div class="col col-2 text-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
    </form>
    <div class="row justify-content-end">
        <div class="col col-5 text-center">
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=5.940535068511963%2C48.251726585444175%2C5.954697132110597%2C48.258077112843694&amp;layer=mapnik&amp;marker=48.25490194773941%2C5.947616100311279" style="border: 1px solid black"></iframe>
            <br/><small><a href="https://www.openstreetmap.org/?mlat=48.25490&amp;mlon=5.94762#map=17/48.25490/5.94762">Afficher une carte plus grande</a></small>
        </div>
        <div class="col col-5 align-self-center">
            <ul class="listContact">
                <li>Ferme PigTycoon, Rue du Gras, <br>Parey-sous-Montfort, 88800</li>
                <li>+33 X XX XX XX XX</li>
                <li>contact@pigtycoon.com</li>
                <li>SIRET XXX XXX XXX XXXXX</li>
            </ul>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>