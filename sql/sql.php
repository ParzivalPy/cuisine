<?php
function linkToSql($email)
{
    $servername = "mysql-arthus.alwaysdata.net";
    $database = "arthus_profils";
    $username = "arthus_profils";
    $password = "!Bulldog44!700";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Echec de la connexion : " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `profils` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "Mot de passe : " . $row["password"];
    } else {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close( $conn );
}

// linkToSql("gaelcharlotte@free.fr");