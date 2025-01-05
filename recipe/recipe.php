<?php
session_start();
require_once(__DIR__ . '/../functions.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recette</title>
    <link href="../style.css" rel="stylesheet" type="text/css" />
    <link href="style_recipe.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php require_once(__DIR__ . '/../header.php') ?>
    <?php
    $conn = connectToDb();
    $recipe = getRecipeById($_GET['id'], $conn);
    $author = getAuthorById($recipe['id_author'], $conn);
    ?>
    <div class="corps">
        <div class="container">
            <div class="title">
                <h2><?= $recipe['title'] ?></h2>
                <h6>Auteur: <?= $author['pseudo']?></h6>
            </div>
            <div class="caracteristiques">
                <div class="caracteristique">
                    <h3>Description</h3>
                    <p><?= $recipe['description'] ?></p>
                </div>
                <div class="caracteristique">
                    <h3>Temps de préparation</h3>
                    <p><?= $recipe['prep_time'] ?> minutes</p>
                </div>
                <div class="caracteristique">
                    <h3>Temps de cuisson</h3>
                    <p><?= $recipe['baking_time'] ?> minutes</p>
                </div>
                <div class="caracteristique">
                    <h3>Nombre de personnes</h3>
                    <p><?= $recipe['people_num'] ?> personnes</p>
                </div>
            </div>
            <div class="recette">
                <div class="recetteInfo">
                    <h3>Ingrédients</h3>
                    <p><?= nl2br($recipe['ingredients']) ?></p>
                </div>
                <div class="recetteInfo">
                    <h3>Préparation</h3>
                    <p><?= nl2br($recipe['instructions']) ?></p>
                </div>
            </div>
        </div>
    </div>
    <script src="../script.js"></script>
</body>

</html>