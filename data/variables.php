<?php
require('config/dbConnect.php');



//récupérer tout les utilisateurs.
$sqlQuery = 'SELECT * FROM users';
$usersStatemant = $pdo -> prepare($sqlQuery);
$usersStatemant->execute();
$users = $usersStatemant->fetchAll();

// récupérer toutes les recettes qui sont active.
$sqlQuery2 = 'SELECT * FROM recipes WHERE is_enabled = TRUE';
$recipesStatemant = $pdo->prepare($sqlQuery2);
$recipesStatemant->execute();
$recipes = $recipesStatemant->fetchAll();

