<?php
require('./func/fonctions.php');

@$postId = (int)$_POST['id'];
@$postTitle = strip_tags($_POST['title']);
@$postRecipe = strip_tags($_POST['recipe']);
@$postSubmit = $_POST['submit'];


if(!trim($postTitle)==''|| !trim($postRecipe) =='' ||
    !empty($postTitle) || !empty($postRecipe)){

    $updateQuery = 'UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id';
    $updapteStatement = $pdo->prepare($updateQuery);
    $updapteStatement->execute([
        "title" => $postTitle,
        "recipe" => $postRecipe,
        "id" => $postId
    ]);
    redirectToUrl('index.php');
}else{
    $_SESSION["MSG_ERROR"] = "Veuillez remplir tout les champs !";
   
}
?>

