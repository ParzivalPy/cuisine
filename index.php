<?php
require_once(__DIR__ . '/functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cuisine</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="style_index.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php require_once(__DIR__ . '/header.php') ?>
  <div class="corps">
    <div class="container">
      <div class="title">
        <h1>Recettes</h1>
      </div>
      <div class="recettes">
        <?php
        $conn = connectToDb();
        $recipes = scrapRecipe(6, $conn);
        foreach ($recipes as $recipe):
          ?>
          <div class="recette">
            <a href="recette.php?id=<?= $recipe['id'] ?>">
              <div class="recetteInfo">
                <h2><?= $recipe['title'] ?></h2>
              </div>
            </a>
          </div>
          <?php
        endforeach;
        ?>
      </div>
    </div>
    <?php if (isset($_SESSION['LOGGED_USER'])): ?>
      <div class="addRecipeContainer">
        <a href="add_Recipe/add_Recipe.php">
          <div class="addRecipe">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
              <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
            </svg>
          </div>
        </a>
      </div>
    <?php endif; ?>
    <script src="script.js"></script>
</body>

</html>