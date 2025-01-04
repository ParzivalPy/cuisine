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
                <h1><?= $recipe['title'] ?></h1>
                <h6>Auteur: <?= $author['pseudo']?></h6>
            </div>
            <div class="recette">
                <div class="recetteInfo">
                    <h2>Ingrédients</h2>
                    <p><?= nl2br($recipe['ingredients']) ?></p>
                </div>
                <div class="recetteInfo">
                    <h2>Préparation</h2>
                    <p><?= nl2br($recipe['instructions']) ?></p>
                </div>
            </div>
        </div>
    </div>
    <script src="../script.js"></script>
</body>

</html>