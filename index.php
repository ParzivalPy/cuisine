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
        <form action="index.php" method="post" class="filters">
          <h3>Filtres :</h3>
          <div class="filter-titre">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" value="<?php if (isset($_POST['titre'])) {echo $_POST['titre'];} else { echo '';} ?>">
          </div>
          <div class="filter-temps">
            <label for="temps">Temps de Préparation :</label>
            <input type="text" id="temps" name="temps" value="<?php if (isset($_POST['temps'])) {echo $_POST['temps'];} else { echo '';} ?>">
          </div>
          <div class="filter-temps">
            <label for="temps2">Temps de Cuisson:</label>
            <input type="text" id="temps2" name="temps2" value="<?php if (isset($_POST['temps2'])) {echo $_POST['temps2'];} else { echo '';} ?>">
          </div>
          <div class="filter-personnes">
            <label for="personnes">Personnes :</label>
            <input type="text" id="personnes" name="personnes" value="<?php if (isset($_POST['personnes'])) {echo $_POST['personnes'];} else { echo '';} ?>">
          </div>
          <div class="filtre-type">
            <label for="category">Catégorie :</label>
            <select id="category" name="category">
              <option value="" <?php if (!isset($_POST['category']) || $_POST['category'] == '') {echo 'selected';} ?>>Toutes</option>
              <option value="Entrée" <?php if (isset($_POST['category']) && $_POST['category'] == 'Entrée') {echo 'selected';} ?>>Entrée</option>
              <option value="Plat" <?php if (isset($_POST['category']) && $_POST['category'] == 'Plat') {echo 'selected';} ?>>Plat</option>
              <option value="Accompagnement" <?php if (isset($_POST['category']) && $_POST['category'] == 'selected') {echo 'selected';} ?>>Accompagnement</option>
              <option value="Sauce" <?php if (isset($_POST['category']) && $_POST['category'] == 'Sauce') {echo 'selected';} ?>>Sauce</option>
              <option value="Dessert" <?php if (isset($_POST['category']) && $_POST['category'] == 'Dessert') {echo 'selected';} ?>>Dessert</option>
            </select>
          </div>
          <div class="final">
            <input type="reset" value="Réinitialiser">
            <input type="submit" value="Filtrer">
          </div>
        </form>
        <div class="recettes">
          <?php
          $conn = connectToDb();
          $recipes = scrapRecipe(10, $conn);
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
      <div class="addRecipeContainer" id="add_recipe">
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