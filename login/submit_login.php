<?php

session_start();
require_once('../functions.php');

$postData = $_POST;

// Validation du formulaire
if (isset($postData['email']) && isset($postData['password'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut un email valide pour soumettre le formulaire.';
    } else {
        $email = $postData['email'];
        $password = $postData['password'];

        // Connexion a la base de données et récupération du mot de passe
        $conn = connectToDb();

        if (!$conn) {
            die("Echec de la connexion : " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `profils` WHERE `email`='$email'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);

                // Vérification du mot de passe
                if (password_verify($password, $user['password']) == true) {
                    $_SESSION['LOGGED_USER'] = [
                        'last_name' => $user['last_name'],
                        'first_name' => $user['first_name'],
                        'pseudo' => $user['pseudo'],
                        'email' => $user['email'],
                        'user_id' => $user['id'],
                    ];
                    setcookie("email", $user['email'], time() + 3600 * 24 * 7, "/", "", true, true);
                    setcookie("password", $user['password'], time() + 3600 * 24 * 7, "/", "", true, true);
                } else {
                    $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Mot de passe incorrect.';
                }
            } else {
                $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Aucun utilisateur trouvé avec cet email.';
            }
        } else {
            $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Erreur lors de la requête SQL : ' . mysqli_error($conn);
        }

        mysqli_close($conn);

        if (!isset($_SESSION['LOGGED_USER'])) {
            $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                'Les informations envoyées ne permettent pas de vous identifier',
            );
        }
    }
} else {
    $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Veuillez remplir tous les champs du formulaire.';
}

header('Location: login.php');
exit();
?>