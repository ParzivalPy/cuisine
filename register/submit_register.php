<?php

session_start();
require_once('../functions.php');
require_once('../sql/sql.php');

$postData = $_POST;

// Validation du formulaire
if (isset($postData['email']) && isset($postData['password']) && isset($postData['last_name']) && isset($postData['first_name'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut un email valide pour soumettre le formulaire.';
    } else {
        $email = $postData['email'];
        $password = $postData['password'];
        $last_name = $postData['last_name'];
        $first_name = $postData['first_name'];
        $pseudo = $postData['pseudo'];

        // Connexion a la base de données et récupération du mot de passe
        $conn = mysqli_connect("mysql-arthus.alwaysdata.net", "arthus", "!Bulldog44!700", "arthus_profils");

        if (!$conn) {
            die("Echec de la connexion : " . mysqli_connect_error());
        }
        $sql = "SELECT `password` FROM `profils` WHERE `email`='$email'";
        if ($sql != "") {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        } else {
            $sql = "INSERT INTO `profils`(`id`, `last_name`, `first_name`, `pseudo`, `email`, `password`) VALUES ('','$last_name','$first_name','$pseudo','$email','$password')";

            if (mysqli_query($conn, $sql)) {
                echo "Nouveau enregistrement créé avec succès";
            } else {
                echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
} else {
    $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Veuillez remplir tous les champs du formulaire.';
}

header('Location: ../login/login.php');
exit();
?>