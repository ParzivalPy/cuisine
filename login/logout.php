<?php

session_start(); // Démarrez la session si ce n'est pas déjà fait

require_once('../functions.php');

setcookie("user_id", "", time() - 3600);
setcookie("password", "", time() - 3600);

// Détruire la session
session_unset();
session_destroy();

// Rediriger l'utilisateur vers la page d'accueil
redirectToUrl('../login/login.php');