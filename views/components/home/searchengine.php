<div class="container searchengine">
    <ul class="nav nav-pills justify-content-around" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-category-tab" data-toggle="pill" href="#pills-category" role="tab" aria-controls="pills-category" aria-selected="true">Recherche par catégories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-name-tab" data-toggle="pill" href="#pills-name" role="tab" aria-controls="pills-name" aria-selected="false">Recherche par nom</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-category" role="tabpanel" aria-labelledby="pills-category-tab">
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <select class="form-control" id="selectSex">
                            <option value="0">Mâle</option>
                            <option value="1">Femelle</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" id="selectWeight">
                            <option>Entre 0 et 5 kg</option>
                            <option>Entre 5 et 10 kg</option>
                            <option>Entre 10 et 15 kg</option>
                            <option>Au dessus de 15kg</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-secondary mb-2">RECHERCHER</button>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-name" role="tabpanel" aria-labelledby="pills-name-tab">
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label for="pigName">Nom du cochon : </label>
                        <input  class="form-control" type="text" name="pigName" id="pigName" autocomplete="off">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-secondary mb-2">RECHERCHER</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
        $("#pigName").autocomplete({
        source: '../../service/pigs.php',
        minLength: 2,
    });
</script>