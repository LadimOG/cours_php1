<?php
require('./func/fonctions.php');
if(isset($_POST['submit'])){
   $postId = (int)$_POST['id'];

   $deleteRecipeQuery = 'DELETE FROM recipes WHERE recipe_id = :id';
   $deleteRecipeStatement = $pdo->prepare($deleteRecipeQuery);
   $deleteRecipeStatement->execute([
    'id' => $postId
   ]);

 
   $msgDeleteSucces = "Votre recette a bien été supprimé";

   // redirectToUrl('index.php');


}

?>



