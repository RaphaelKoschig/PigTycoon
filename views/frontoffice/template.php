<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="public/css/knacss.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $title ?></title>
</head>

<header>
    <?php require('views/components/header.php'); ?>
</header>

<body>
    <?= $content ?>
</body>

</html>