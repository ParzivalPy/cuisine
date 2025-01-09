<?php

function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}

function connectToDb(): mysqli
{
    $conn = mysqli_connect("mysql-arthus.alwaysdata.net", "arthus", "!Bulldog44!700", "arthus_profils");

    if (!$conn) {
        die("Echec de la connexion : " . mysqli_connect_error());
    }

    return $conn;
}

function scrapRecipe(int $num, mysqli $conn): array
{
    $sql = "SELECT * FROM `recettes`";
    $result = mysqli_query($conn, $sql);

    $recipes = [];
    $count = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        if ($count >= $num) {
            break;
        }
        $recipes[] = $row;
        $count++;
    }

    return $recipes;
} 

function getRecipeById(int $id, mysqli $conn): array
{
    $sql = "SELECT * FROM `recettes` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function getAuthorById(int $id, mysqli $conn): array
{
    $sql = "SELECT * FROM `profils` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function getRecipeByAuthor(int $id, mysqli $conn): array
{
    $sql = "SELECT * FROM `recettes` WHERE `id_author` = $id";
    $result = mysqli_query($conn, $sql);

    $recipes = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $recipes[] = $row;
    }

    return $recipes;
}

function pushRecipe(array $postData, mysqli $conn): void
{
    $title = $postData['title'];
    $desc = $postData['desc'];
    $prep_time = $postData['prep_time'];
    $baking_time = $postData['baking_time'];
    $people_num = $postData['people_num'];
    $ingredients = $postData['ingredients'];
    $instructions = $postData['instructions'];
    $user_id = $_SESSION["LOGGED_USER"]['user_id'];

    $title = str_replace("'", "\'", $title);
    $desc = str_replace("'", "\'", $desc);
    $ingredients = str_replace("'", "\'", $ingredients);
    $instructions = str_replace("'", "\'", $instructions);

    $sql = "INSERT INTO `recettes`(`id_author`, `title`, `description`, `people_num`, `prep_time`, `baking_time`, `ingredients`, `instructions`) VALUES ('$user_id', '$title', '$desc', '$people_num', '$prep_time', '$baking_time', '$ingredients', '$instructions')";
    if (mysqli_query($conn, $sql)) {
        echo "Recette ajoutée avec succès";
    } else {
        echo ("Erreur : " . $sql . "<br>" . mysqli_error($conn));
    }
}

function modifyRecipe(array $postData, mysqli $conn): void
{
    $id = $postData['id'];
    $title = $postData['title'];
    $desc = $postData['desc'];
    $prep_time = $postData['prep_time'];
    $baking_time = $postData['baking_time'];
    $people_num = $postData['people_num'];
    $ingredients = $postData['ingredients'];
    $instructions = $postData['instructions'];

    $title = str_replace("'", "\'", $title);
    $desc = str_replace("'", "\'", $desc);
    $ingredients = str_replace("'", "\'", $ingredients);
    $instructions = str_replace("'", "\'", $instructions);

    $sql = "UPDATE `recettes` SET `title`='$title',`description`='$desc',`people_num`='$people_num',`prep_time`='$prep_time',`baking_time`='$baking_time',`ingredients`='$ingredients',`instructions`='$instructions' WHERE `id` = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Recette modifiée avec succès";
    } else {
        echo ("Erreur : " . $sql . "<br>" . mysqli_error($conn));
    }
}

function deleteRecipe(int $id, mysqli $conn): void
{
    $sql = "DELETE FROM `recettes` WHERE `id` = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Recette supprimée avec succès";
    } else {
        echo ("Erreur : " . $sql . "<br>" . mysqli_error($conn));
    }
}

function autoConnect(): void{
    if (!isset($_SESSION['LOGGED_USER']) && isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
        $conn = connectToDb();
    
        $email = $_COOKIE['email'];
        $password = $_COOKIE['password'];
    
        $sql = "SELECT * FROM `profils` WHERE `email`='$email'";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
    
                // Vérification du mot de passe
                if ($user['password'] === $password) {
                    $_SESSION['LOGGED_USER'] = [
                        'last_name' => $user['last_name'],
                        'first_name' => $user['first_name'],
                        'pseudo' => $user['pseudo'],
                        'email' => $user['email'],
                        'user_id' => $user['id'],
                    ];
                }
            }
        }
    
        mysqli_close($conn);
    }
}

?>