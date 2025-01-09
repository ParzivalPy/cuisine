<?php

session_start();

require_once('../functions.php');

setcookie("email", "", time() - 3600);
setcookie("password", "", time() - 3600);

session_unset();
session_destroy();

redirectToUrl('../login/login.php');

?>