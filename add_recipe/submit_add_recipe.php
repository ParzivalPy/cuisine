<?php

session_start();
require_once('../functions.php');

$postData = $_POST;
// Check if all required fields are filled
if (isset($postData['title'], $postData['category'], $postData['desc'], $postData['prep_time'], $postData['baking_time'], $postData['people_num'], $postData['ingredients'], $postData['instructions'])) {
    $title = $postData['title'];
    $category = $postData['category'];
    $desc = $postData['desc'];
    $prep_time = $postData['prep_time'];
    $baking_time = $postData['baking_time'];
    $people_num = $postData['people_num'];
    $ingredients = $postData['ingredients'];
    $instructions = $postData['instructions'];
    $user_id = $_SESSION["LOGGED_USER"]['user_id'];

    
    $conn = connectToDb();
    pushRecipe($postData, $conn);
} else {
    echo "All fields are required.";
}

redirectToUrl('../index.php');