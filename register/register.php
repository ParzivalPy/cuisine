<?php session_start();
require_once("../functions.php"); 
autoConnect();?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuisine - Inscription</title>
    <link href="../style.css" rel="stylesheet" type="text/css" />
    <link href="style_register.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php require_once("../header.php"); ?>
    <div class="page">
        <form method="POST" action="submit_register.php">
            <?php if (isset($_SESSION['REGISTER_ERROR_MESSAGE'])): ?>
                <div class="alert alert-danger alert-box" role="alert">
                    <?php echo $_SESSION['REGISTER_ERROR_MESSAGE'];
                    unset($_SESSION['REGISTER_ERROR_MESSAGE']); ?>
                </div>
            <?php endif; ?>
            <div class="noms">
                <div class="mb-3" style="width: 45%;">
                    <label for="last_name" class="form-label">Nom</label>
                    <input required type="text" class="form-control" id="last_name" name="last_name"
                        aria-describedby="last_name-help">
                </div>
                <div class="mb-3" style="width: 45%;">
                    <label for="first_name" class="form-label">Prénom</label>
                    <input required type="text" class="form-control" id="first_name" name="first_name"
                        aria-describedby="first_name-help">
                </div>
            </div>
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input required type="text" class="form-control" id="pseudo" name="pseudo"
                    aria-describedby="pseudo-help">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" placeholder="you@exemple.com" class="form-control" id="email" name="email"
                    aria-describedby="email-help">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input required type="password" class="form-control" id="password" name="password">
            </div>
            <input type="submit" id="submit" value="S'inscrire">
        </form>
        <script src="../script.js"></script>
    </div>
</body>

</html>