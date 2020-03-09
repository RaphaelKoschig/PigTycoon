<?php

require_once('../models/Manager.php');

$db = new PDO('mysql:host=localhost;dbname=pigtycoon;charset=utf8', 'root');

if ($_POST['weight'] != 15) {
    $req = "SELECT 
        id_pig, name_pig, sex_pig, weight_pig
        FROM pig
        WHERE sex_pig = " . $_POST['sex'] . " AND weight_pig BETWEEN " . $_POST['weight'] . " AND " . ($_POST['weight'] + 5) . " ORDER BY name_pig ASC";
} else {
    $req = "SELECT 
        id_pig, name_pig, sex_pig, weight_pig
        FROM pig
        WHERE sex_pig = " . $_POST['sex'] . " AND weight_pig >= " . $_POST['weight'] . " ORDER BY name_pig ASC";
}



$request = $db->query($req);
$response = $request->fetchAll();
$count = $request->rowCount();
?>

<table class="table table-hover table-striped text-center">
    <thead class="table-primary">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Poids</th>
            <th scope="col">Détails</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($ipig = 0; $ipig < $count; $ipig++) { ?>
            <tr>
                <td><?= $response[$ipig]['name_pig'] ?></td>
                <td><?= $response[$ipig]['weight_pig'] ?> kg</td>
                <td><a href="<?php echo("index.php?action=pig&id=".$response[$ipig]['id_pig']) ?>" class="btn btn-primary">Détails</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>