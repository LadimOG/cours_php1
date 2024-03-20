<?php

if(!isset($_GET['id'])|| empty($_GET['id'])|| !is_numeric($_GET['id'])){
    $msgError = "la recette n'a pas été trouvé !";
   

}else{

    $recipeQuery = 'SELECT r.*, u.user_id, u.full_name, c.comment, c.comment_id , DATE_FORMAT(c.created_at, "%d/%m/%Y") AS publish 
    FROM recipes r 
    LEFT JOIN comments c ON r.recipe_id = c.recipe_id 
    LEFT JOIN users u ON u.user_id = c.user_id 
    WHERE r.recipe_id = :id AND r.is_enabled = true 
    ORDER BY publish DESC';
    $recipeStatement = $pdo->prepare($recipeQuery);
    $recipeStatement->execute([
        "id" => (int)$_GET['id']
    ]);
    $recipeAll = $recipeStatement->fetchAll(PDO::FETCH_ASSOC);

     // récupérer la moyenne des commentaires.
     $sqlQuery = 'SELECT ROUND(AVG(c.rating),1) AS rating 
     FROM recipes r 
     LEFT JOIN 
     comments c ON r.recipe_id = c.recipe_id 
     WHERE r.recipe_id = :id' ;
     $commentRating = $pdo->prepare($sqlQuery);
     $commentRating->execute([
         "id" => $_GET['id']
     ]);
     $AverageRating = $commentRating->fetch(PDO::FETCH_ASSOC);

     //Vérifier si la recette a été trouvé.
     if($recipeAll == []){
        $msgError = 'Aucune recette n\'a été trouvé';
        return;
     }

     //Mettre dans un tableau toutes les valeurs pour les affichers
    $recipe = [
        'title' => $recipeAll[0]['title'],
        'recipe' => $recipeAll[0]['recipe'],
        'author' => $recipeAll[0]['author'],
        'rating' => $AverageRating['rating'],
        'comments' => []
    ];

    foreach($recipeAll as $comment){
        if(!is_null($comment['comment_id'])){
            $recipe['comments'][] = [
                'comment_id' => $comment['comment_id'],
                'comment' => $comment['comment'],
                'user_id' => (int) $comment['user_id'],
                'full_name' => $comment['full_name'],
                "publish" => $comment['publish']
            ];
        }
    }
}


