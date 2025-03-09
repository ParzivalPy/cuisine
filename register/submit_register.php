<?php

session_start();
require_once('../functions.php');

$postData = $_POST;

if (isset($postData['email']) && isset($postData['password']) && isset($postData['last_name']) && isset($postData['first_name']) && isset($postData['pseudo']) && $postData['email'] && $postData['password'] && $postData['last_name'] && $postData['first_name'] && $postData['pseudo']) {
    $email = $postData['email'];
    $password = $postData['password'];
    $last_name = $postData['last_name'];
    $first_name = $postData['first_name'];
    $pseudo = $postData['pseudo'];

    // Connexion à la base de données
    $conn = connectToDb();

    if (!$conn) {
        die("Echec de la connexion : " . mysqli_connect_error());
    }

    // Vérification si l'email existe déjà
    $sql = "SELECT `email` FROM `profils` WHERE `email`='$email'";
    $result_mail = mysqli_query($conn, $sql);

    $sql = "SELECT `pseudo` FROM `profils` WHERE `pseudo`='$pseudo'";
    $result_pseudo = mysqli_query($conn, $sql);

    if ($result_mail && mysqli_num_rows($result_mail) > 0) {
        $_SESSION['REGISTER_ERROR_MESSAGE'] = 'Un utilisateur avec cet email existe déjà.';
        header('Location: ../register/register.php');
        exit;
    } else if ($result_pseudo && mysqli_num_rows($result_pseudo) > 0) {
        $_SESSION['REGISTER_ERROR_MESSAGE'] = 'Ce pseudo est déjà utilisé.';
        header('Location: ../register/register.php');
        exit;
    } else {
        // Hashage du mot de passe
        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
        // Insertion du nouvel utilisateur
        $sql = "INSERT INTO `profils`(`last_name`, `first_name`, `pseudo`, `email`, `password`) VALUES ('$last_name','$first_name','$pseudo','$email','$password')";

        if (mysqli_query($conn, $sql)) {
            echo "Nouveau enregistrement créé avec succès";
        } else {
            $err = "Erreur : " . $sql . "<br>" . mysqli_error($conn);
            $_SESSION['REGISTER_ERROR_MESSAGE'] = $err;
            header('Location: ../register/register.php');
            exit;
        }
    }

    mysqli_close($conn);
    header('Location: ../login/login.php');
    exit;
} else {
    $_SESSION['REGISTER_ERROR_MESSAGE'] = 'Veuillez remplir tous les champs du formulaire.';
    echo '<script>alert("Veuillez remplir tous les champs du formulaire.")</script>';
        header('Location: ../register/register.php');
        exit;
}
?>