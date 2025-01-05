<?php

session_start();
require_once('../functions.php');

$postData = $_POST;
// Check if all required fields are filled
if (isset($postData['title'], $postData['ingredients'], $postData['instructions'])) {
    $conn = connectToDb();
    modifyRecipe($postData, $conn);
} else {
    echo "All fields are required.";
}

redirectToUrl('../index.php');