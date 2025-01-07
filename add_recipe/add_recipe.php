<?php session_start(); ?>
<?php
if (!isset($_SESSION['LOGGED_USER']) && isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    header('Location: autoconnect.php?page=' . $_SERVER['REQUEST_URI']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_add_recipe.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php require_once("../header.php"); ?>
    <div class="page">
        <form action="submit_add_recipe.php" method="POST">
            <div>
                <label for="title">Titre :</label>
                <input type="text" id="title" name="title" autofocus required>
            </div>
            <div>
                <label for="desc">Description :</label>
                <textarea wrap="soft" id="desc" name="desc" required></textarea>
            </div>
            <div>
                <label for="prep_time">Temps de préparation :</label>
                <input type="number" min="0" id="prep_time" name="prep_time" required>
            </div>
            <div>
                <label for="baking_time">Temps de cuisson :</label>
                <input type="number" min="0" id="baking_time" name="baking_time" required>
            </div>
            <div>
                <label for="people_num">Nombre de personnes :</label>
                <input type="number" min="0" id="people_num" name="people_num" required>
            </div>
            <div>
                <label for="ingredients">Ingredients :</label><br>
                <textarea wrap="soft" id="ingredients" name="ingredients" required></textarea>
            </div>
            <div>
                <label for="instructions">Instructions :</label><br>
                <textarea wrap="soft" id="instructions" name="instructions" required></textarea>
            </div>
            <input type="submit" id="submit" value="Ajouter la recette"></input>
        </form>
    </div>
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