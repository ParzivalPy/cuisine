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

    $sql = "INSERT INTO `recettes`(`id_author`, `title`, `description`, `people_num`, `prep_time`, `baking_time`, `ingredients`, `instructions`) VALUES ('$user_id', '$title', '$desc', '$people_num', '$prep_time', '$baking_time', '$ingredients', '$instructions')";
    if (mysqli_query($conn, $sql)) {
        echo "Recette ajoutée avec succès";
    } else {
        echo ("Erreur : " . $sql . "<br>" . mysqli_error($conn));
    }
}

?>