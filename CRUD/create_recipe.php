<?php
require('./func/fonctions.php');
if(isset($_POST['submit'])){
    $PostTitle = trim(strip_tags($_POST['title']));
    $PostRecipe =trim(strip_tags($_POST['recipe']));
    
    if(empty($PostTitle) || empty($PostRecipe)){
       
        $msgError = "Veuillez remplire les champs vide";
     
    }else{
        $sqlQuery = "INSERT INTO recipes(title, recipe, author,  is_enabled) VALUE (:title, :recipe, :author, :is_enabled)";

        $addRecipeStatement = $pdo->prepare($sqlQuery);
        $addRecipeStatement->execute([
            "title" => ucfirst($PostTitle),
            "recipe" => ucfirst($PostRecipe),
            "author" => $_SESSION['LOGGED_USER']['email'],
            "is_enabled" => 1
        ]);

        redirectToUrl('index.php');
    } 
}
?>
