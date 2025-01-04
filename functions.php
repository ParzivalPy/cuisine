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

?>