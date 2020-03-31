<?php $title = 'Administration des cochons';
session_start();
?>

<?php ob_start(); ?>

<div class="container containerPig bg-primary">
    <div class="row navAdmin justify-content-center">
        <a href="index.php?action=newPig">
            <button type="button" class="btn btn-primary">Ajouter</button>
        </a>
        <a href="index.php?action=generatePigs">
            <button type="button" class="btn btn-primary">Générer plusieurs cochons</button>
        </a>
        <a href="index.php?action=reproducePigs">
            <button type="button" class="btn btn-primary">Reproduire des cochons</button>
        </a>
    </div>
    <?php require('views/components/admin/validationMessage.php'); ?>
    <table id="tableAdminPigs" class="table table-striped table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">Actions</th>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Sexe</th>
                <th scope="col">Poids (kg)</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Père</th>
                <th scope="col">Mère</th>
                <th scope="col">État</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($pig = $pigs->fetch()) {
            ?>
                <tr class="table-primary">
                    <td>
                        <a href="index.php?action=updatePig&id=<?php echo $pig['id_pig']; ?>">
                            <img src="public/images/icons/update.png" alt="Update" title="Update" style="width:20px;height:20px">
                        </a>
                        <a href="index.php?action=deletePig&id=<?php echo $pig['id_pig']; ?>">
                            <img src="public/images/icons/delete.png" alt="Delete" title="Delete" style="width:20px;height:20px">
                        </a>
                        <a href="index.php?action=killPig&id=<?php echo $pig['id_pig']; ?>">
                            <img src="public/images/icons/kill.png" alt="Kill" title="Kill" style="width:20px;height:20px">
                        </a>
                        <a href="index.php?action=genealogyPig&id=<?php echo $pig['id_pig']; ?>">
                            <img src="public/images/icons/tree.png" alt="Genealogy" title="Genealogy" style="width:20px;height:20px">
                        </a>
                    </td>
                    <td><?php echo $pig['id_pig']; ?></td>
                    <td><?php echo $pig['name_pig']; ?></td>
                    <td><?php echo $pig['type_sex']; ?></td>
                    <td><?php echo $pig['weight_pig']; ?></td>
                    <td><?php echo $pig['raw_birthdate_pig']; ?></td>
                    <td>
                        <?php
                        if ($pig['father_pig'] == null) {
                            echo 'Pas de père';
                        } else {
                            echo $pig['father_name'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($pig['mother_pig'] == null) {
                            echo 'Pas de mère';
                        } else {
                            echo $pig['mother_name'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($pig['deathtime_pig'] > 0) {
                            echo 'Vivant';
                        } else {
                            echo 'Mort';
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            $pigs->closeCursor();
            ?>

        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#tableAdminPigs').DataTable({
            "processing": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
            },
            "columns": [{
                    "orderable": false
                },
                null,
                null,
                null,
                {
                    "type": "num-fmt"
                },
                {
                    "type": "date"
                },
                null,
                null,
                null
            ]
        });
    });
</script>

<?php $content = ob_get_clean(); ?>

<?php unset($_SESSION["message"]); ?>

<?php require('views/frontoffice/template.php'); ?>