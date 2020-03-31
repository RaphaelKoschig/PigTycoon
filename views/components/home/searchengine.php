<div class="container searchengine newpig bg-primary">
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
            <form action="index.php?action=listPigs&page=1" method="post" id="searchForm">
                <div class="form-group row justify-content-center">
                    <div class="col col-4">
                        <select class="form-control" id="selectSex" name="selectSex">
                            <option value="1">Mâle</option>
                            <option value="0">Femelle</option>
                        </select>
                    </div>
                    <div class="col col-4">
                        <select class="form-control" id="selectWeight" name="selectWeight">
                            <option value="0">Entre 0 et 5 kg</option>
                            <option value="5">Entre 5 et 10 kg</option>
                            <option value="10">Entre 10 et 15 kg</option>
                            <option value="15">Au dessus de 15kg</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group">
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">RECHERCHER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-name" role="tabpanel" aria-labelledby="pills-name-tab">
            <form action="index.php?action=listPigs&page=1" method="post" id="nameForm">
                <div class="row justify-content-center">
                    <div class="col col-6 text-center">
                        <div class="form-group">

                            <label for="pigName">Nom du cochon : </label>
                            <input class="form-control" type="text" name="pigName" id="pigName" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group">
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">RECHERCHER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id='resultframe'></div>

<script>
    $("#pigName").autocomplete({
        source: 'ajax/pigs.php',
        minLength: 1,
    });
</script>