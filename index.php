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
  <script src="script.js"></script>
</body>

</html>