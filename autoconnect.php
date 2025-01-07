<?php 
require_once('functions.php');
autoConnect();
header('Location: ../'.$_SESSION['page']);
exit;
?>