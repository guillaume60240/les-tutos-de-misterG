<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleHeaderFooter.css">
    <link rel="stylesheet" href="../style/defaultStyle.css">
    <title><?= $title ?></title>
</head>

    <?php headerFooterContent('header'); ?>


<!-- Ce fichier sert de template pour les contenus de page avec header body et footer ainsi que les styles utilisés -->



    <?= $content ?>



    <?php headerFooterContent('footer'); ?>


    <script src="../../js/script.js"></script>
</html>