<?php

session_start();
require_once('../functions.php');

$postData = $_POST;
$conn = connectToDb();
pushRecipe($postData, $conn);
redirectToUrl('../index.php');