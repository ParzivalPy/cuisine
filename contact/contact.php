<?php
require_once('../functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cuisine - Contact</title>
  <link href="style_contact.css" rel="stylesheet" type="text/css">
  <link href="../style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php require_once('../header.php') ?>
  <form method="POST" class="page flou" action="contact.php">
    <label for="mail">Email :</label>
    <br>
    <input type="email" id="mail" name="mail" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" placeholder="Email"
      required>
    <br>
    <label for="mail">Sujet :</label>
    <br>
    <input type="text" id="subject" placeholder="Sujet" name="subject" required>
    <br>
    <label for="message">Message :</label>
    <br>
    <textarea id="message" name="message" placeholder="Décrivez votre problème..." required></textarea>
    <br>
    <input type="submit" id="submit" hidden>
    <input type="button" value="Envoyer" id="WrongSubmit" onclick="confirmMessage()">
  </form>
  <div class="PopupParent" id="popupParent">
    <div class="page popup" id="popup">
      <h2>Vérification</h2>
      <p>Email: </p><input type="text" id="afficheMail" readOnly></input>
      <p>Sujet: </p><input type="text" id="afficheSubject" readOnly></input>
      <p>Message: </p><textarea type="text" id="afficheMessage" readOnly></textarea></input>
      <label for="submit"><a href="../index.php">Envoyer !</a></label>
    </div>
  </div>
  <script src="../script.js"></script>
</body>

</html>