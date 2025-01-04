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
    <div class="entree">
      <h2 class="nomPartie">ENTREES</h2>
      <div class="entreeChild">
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
      </div>
    </div>
    <div class="entree">
      <h2 class="nomPartie">PLATS</h2>
      <div class="entreeChild">
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
      </div>
    </div>
    <div class="entree">
      <h2 class="nomPartie">DESSERTS</h2>
      <div class="entreeChild">
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
        <div class="element"></div>
      </div>
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