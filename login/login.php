<?php session_start(); 
require_once("../functions.php");
autoConnect();?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuisine - Profil</title>
    <link href="../style.css" rel="stylesheet" type="text/css" />
    <link href="style_login.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php require_once("../header.php"); ?>
    <div class="page">
        <?php if (!isset($_SESSION['LOGGED_USER'])): ?>
            <form action="submit_login.php" method="POST">
                <!-- si message d'erreur on l'affiche -->
                <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                        unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help"
                        placeholder="you@exemple.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" required class="form-control" id="password" name="password">
                </div>
                <p>
                    Pas de compte ?
                    <br>
                    <a href="../register/register.php" class="disabled">Inscrivez-vous...</a>
                    <br>
                    <b>Les inscriptions sont désactivées pour le moment.</b>
                </p>
                <input type="submit" id="submit">
            </form>
        <?php else: ?>
            <div class="corps">
                <div class="information">
                    <h3>INFORMATIONS</h3>
                    <div class="container informations">
                        Nom : <?php echo $_SESSION['LOGGED_USER']['last_name']; ?>
                        <?php echo $_SESSION['LOGGED_USER']['first_name'] ?>
                        <br />
                        Email : <?php echo $_SESSION['LOGGED_USER']['email']; ?>
                        <br />
                        Pseudo : <?php echo $_SESSION['LOGGED_USER']['pseudo']; ?>
                        <br />
                        <a href="logout.php">Déconnexion</a>
                    </div>
                </div>
                <div class="recettes">
                    <h3>RECETTES</h3>
                    <div class="container recettes">
                        <?php
                        require_once("../functions.php");
                        $conn = connectToDb();
                        $recipes = getRecipeByAuthor($_SESSION['LOGGED_USER']['user_id'], $conn);
                        foreach ($recipes as $recipe): ?>
                            <div class="recette">
                                <div class="description">
                                    <h4 style="text-transform: uppercase;">
                                        <a href="../recipe/recipe.php?id=<?php echo $recipe['id']; ?>">
                                            <?php echo $recipe['title']; ?>
                                        </a>
                                    </h4>
                                    <div class="recipe_informations">
                                        <div class="recipe_prep_time">
                                            <p><b>Temps de préparation :</b>
                                                <br>
                                                <?php echo $recipe['prep_time'] ?> minutes
                                            </p>
                                        </div>
                                        <div class="recipe_baking_time">
                                            <p><b>Temps de cuisson :</b>
                                                <br>
                                                <?php echo $recipe['baking_time'] ?> minutes
                                            </p>
                                        </div>
                                        <div class="recipe_people_num">
                                            <p><b>Nombre de personnes :</b>
                                                <br>
                                                <?php echo $recipe['people_num'] ?> personnes
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="actions">
                                    <a href="../modify_recipe/modify_recipe.php?id=<?php echo $recipe['id']; ?>">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" color="#000000">
                                            <path
                                                d="M14.3632 5.65156L15.8431 4.17157C16.6242 3.39052 17.8905 3.39052 18.6716 4.17157L20.0858 5.58579C20.8668 6.36683 20.8668 7.63316 20.0858 8.41421L18.6058 9.8942M14.3632 5.65156L4.74749 15.2672C4.41542 15.5993 4.21079 16.0376 4.16947 16.5054L3.92738 19.2459C3.87261 19.8659 4.39148 20.3848 5.0115 20.33L7.75191 20.0879C8.21972 20.0466 8.65806 19.8419 8.99013 19.5099L18.6058 9.8942M14.3632 5.65156L18.6058 9.8942"
                                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <a href="../delete_recipe/delete_recipe.php?id=<?php echo $recipe['id']; ?>">
                                        <svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" color="#000000">
                                            <path
                                                d="M19.2616 17.0378L20.9383 4.46293C20.9746 4.19069 20.8214 3.92855 20.5664 3.82655L16 2H10.5L9.81818 3.5L5 2L3.20966 3.79034C3.07751 3.92249 3.01449 4.10866 3.03919 4.2939L4.73838 17.0378C4.90325 18.2744 5.6356 19.3632 6.71873 19.9821L7.03861 20.1649C10.1129 21.9217 13.8871 21.9217 16.9614 20.1649L17.2813 19.9821C18.3644 19.3632 19.0968 18.2744 19.2616 17.0378Z"
                                                stroke="#000000" stroke-width="1.5"></path>
                                            <path d="M16 2L14 7" stroke="#000000" stroke-width="1.5"></path>
                                            <path d="M9 6.5L9.81818 3.5" stroke="#000000" stroke-width="1.5"></path>
                                            <path d="M3 5.00002C5.57143 7.66668 18.4286 7.66664 21 5.00002" stroke="#000000"
                                                stroke-width="1.5"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <script src="../script.js"></script>
</body>

</html>