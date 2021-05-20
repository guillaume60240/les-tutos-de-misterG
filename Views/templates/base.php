<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site de vidéos liées à la guitare et au chant, cours et tutos de guitare, théorie musicale, théorie harmonie, cours de rythme, reprise de morceaux à la guitare et au chant, acoustiques covers, electriques covers, rock, pop, métal, heavy metal">
    <meta property="og:image" content="les_tutos_de_mister_G.png">
    <meta property="og:type" content="Videos">
    <meta property="og:description" content="Covers en videos, tutos guitare en videos">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:title" content="Les tutos de mister G">
    <link rel="stylesheet" href="../style/styleHeaderFooter.css">
    <link rel="stylesheet" href="../style/defaultStyle.css">
    <title><?= $title ?></title>
</head>


    <?php headerFooterContent('header'); ?>


<!-- Ce fichier sert de template pour les contenus de page avec header body et footer ainsi que les styles utilisés -->

<body>
    
    

        <?= $content ?>

   

</body>


    <?php headerFooterContent('footer'); ?>


    <script src="../../js/script.js"></script>
</html>