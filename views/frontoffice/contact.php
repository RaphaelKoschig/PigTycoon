<?php $title = 'Nous contacter'; ?>

<?php ob_start(); ?>
<div class="container text-center">
    <h1>Formulaire de contact</h1>
</div>
<div class="container contact-form">
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
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>