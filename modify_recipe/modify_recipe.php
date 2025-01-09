<?php session_start();
require_once "../functions.php";
autoConnect();?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_modify_recipe.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php 
    require_once "../header.php";
    $recipe = getRecipeById($_GET['id'], connectToDb());
    ?>
    <?php if (isset($_SESSION['LOGGED_USER']) && $_SESSION['LOGGED_USER']['user_id'] === $recipe['id_author']) : ?>
    <div class="page">
        <form action="submit_modify_recipe.php" method="POST">
            <div>
                <label for="title">Titre :</label>
                <input type="text" id="title" name="title" value="<?php echo $recipe['title']?>" autofocus required>
            </div>
            <div>
                <label for="desc">Description :</label>
                <textarea wrap="soft" id="desc" name="desc" required><?php echo $recipe['description']?></textarea>
            </div>
            <div>
                <label for="prep_time">Temps de préparation :</label>
                <input type="number" min="0" id="prep_time" name="prep_time" value="<?php echo $recipe['prep_time']?>" required>
            </div>
            <div>
                <label for="baking_time">Temps de cuisson :</label>
                <input type="number" min="0" id="baking_time" name="baking_time" value="<?php echo $recipe['baking_time']?>" required>
            </div>
            <div>
                <label for="people_num">Nombre de personnes :</label>
                <input type="number" min="0" id="people_num" name="people_num" value="<?php echo $recipe['people_num']?>" required>
            </div>
            <div>
                <label for="ingredients">Ingredients :</label><br>
                <textarea wrap="soft" id="ingredients" name="ingredients" required><?php echo $recipe['ingredients']?></textarea>
            </div>
            <div>
                <label for="instructions">Instructions :</label><br>
                <textarea wrap="soft" id="instructions" name="instructions" required><?php echo $recipe['instructions']?></textarea>
            </div>
            <input type="hidden" id="id" name="id" value="<?php echo $recipe['id']?>">
            <input type="submit" id="submit" value="Ajouter la recette"></input>
        </form>
    </div>
    <?php else : ?>
        <div class="error-page">
            <h1 class="title">Erreur</h1>
            <p>Vous n'êtes pas autorisé à modifier cette recette.</p>
        </div>
    <?php endif; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var textareas = document.querySelectorAll('textarea');

            textareas.forEach(function (textarea) {
                textarea.style.height = 'auto';
                textarea.style.height = (textarea.scrollHeight) + 'px';

                textarea.addEventListener('input', function () {
                    textarea.style.height = 'auto';
                    textarea.style.height = (textarea.scrollHeight) + 'px';
                });
            });
        });
    </script>
    <script src="../script.js"></script>
</body>

</html>