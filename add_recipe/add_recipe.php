<?php
require_once("../functions.php");
session_start();
autoConnect();
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
    <?php if (!isset($_SESSION["LOGGED_USER"])): ?>
        <div class="alert-container" style="width: 50%; margin: 50px 25%;">
            <div class="alert dialog-box">
                <p>Vous n'avez pas la permission d'être ici<br>Vous serez redirigés dans 3 secondes...</p>
            </div>
        </div>
        <script>
            setTimeout(() => {
                window.location.href = "../login/login.php";
            }, 3000);
        </script>
    <?php else: ?>
    <div class="page">
        <form action="submit_add_recipe.php" method="POST">
            <div>
                <label for="title">Titre :</label>
                <input type="text" id="title" name="title" autofocus required>
            </div>
            <div>
                <label for="category">Catégorie :</label>
                <select id="category" name="category" required>
                    <option value="" disabled selected>Choisissez une catégorie</option>
                    <option value="Entrée">Entrée</option>
                    <option value="Plat">Plat</option>
                    <option value="Accompagnement">Accompagnement</option>
                    <option value="Sauce">Sauce</option>
                    <option value="Dessert">Dessert</option>
                </select>
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