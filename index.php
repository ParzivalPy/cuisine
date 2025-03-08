<?php
require_once(__DIR__ . '/functions.php');
session_start();
autoConnect();
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
        <h2>Recettes</h2>
      </div>
      <div class="page-content">
        <div class="filters">
          <b>Filtres</b>
          <div class="filter-title">
            <label for="titre">Titre</label><br>
            <input type="text" id="titre" name="titre" placeholder="Rechercher par titre" />
          </div>
          <div class="filter-type">
            <label for="filtre">Type de recette</label><br>
            <select name="filtre" id="filtre">
              <option value="all">Tout</option>
              <option value="entree">Entrée</option>
              <option value="plat">Plat</option>
              <option value="accompagnement">Accompagnement</option>
              <option value="sauce">Sauce</option>
              <option value="dessert">Dessert</option>
            </select>
          </div>
          <div class="filter-time">
            <label for="temps">Temps de préparation</label><br>
            <input type="number" id="temps" name="temps" placeholder="Temps de préparation" />
          </div>
          <div class="filter-person">
            <label for="personnes">Nombre de personnes</label><br>
            <input type="number" id="personnes" name="personnes" placeholder="Nombre de personnes" />
          </div>
          <button id="filter">Filtrer</button>
        </div>
        <div class="recettes">
          <?php
          $conn = connectToDb();
          $recipes = scrapRecipe(6, $conn);
          foreach ($recipes as $recipe):
            ?>
            <div class="recette">
              <a href="recipe/recipe.php?id=<?= $recipe['id'] ?>" style="gap:30px">
                <div class="recetteInfo">
                  <h3 style="text-transform: capitalize;"><?= $recipe['title'] ?></h3>
                </div>
                <div class="recipe_informations">
                  <div class="recipe_prep_time info">
                    <p><b>Temps de préparation :</b>
                      <br>
                      <?php echo $recipe['prep_time'] ?> minutes
                    </p>
                  </div>
                  <div class="recipe_baking_time info">
                    <p><b>Temps de cuisson :</b>
                      <br>
                      <?php echo $recipe['baking_time'] ?> minutes
                    </p>
                  </div>
                  <div class="recipe_people_num info">
                    <p><b>Nombre de personnes :</b>
                      <br>
                      <?php echo $recipe['people_num'] ?> personnes
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <?php
          endforeach;
          ?>
        </div>
      </div>
    </div>
    <?php if (isset($_SESSION['LOGGED_USER'])): ?>
      <div class="addRecipeContainer">
        <a href="/add_recipe/add_recipe.php">
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