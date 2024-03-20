<?php
require('config/dbConnect.php');

if(isset($_POST['submit'])){
    if(empty($_POST['comment'])|| !isset($_POST['comment']) || empty($_POST['rating'])){
        $msgError = "Veuillez completer tout les champs!";
    }else{
        $sqlQuery = 'INSERT INTO comments(user_id, recipe_id, comment, rating) VALUE(:user_id, :recipe_id, :comment, :rating)';

        $addCommentStatement = $pdo -> prepare($sqlQuery);
        $addCommentStatement -> execute([
            'user_id'=>  $_SESSION['LOGGED_USER']['user_id'],
            'recipe_id' => $_GET['id'] ,
            'comment' => strip_tags($_POST['comment']),
            'rating' =>  (int) $_POST['rating']
        ]);
        $msgSucces = "Commentaire enregistré avec succès!";
    }
}