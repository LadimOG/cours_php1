<?php
session_start();

require('data/variables.php');
require('func/fonctions.php');

$postEmail = $_POST['email'];
$postPassword = $_POST['mdp'];
$postSubmit = $_POST['submit'];


if(isset($postSubmit)){

    

    if(!filter_var($postEmail, FILTER_VALIDATE_EMAIL)){
        $_SESSION['LOGIN_ERROR_MESSAGE'] = "veulliez saisir un email valide pour vous connecter!";
    }else{
        foreach($users as $user){
            if($user['email'] == $postEmail && password_verify($postPassword,$user['password'])){
                $_SESSION['AUTH'] = true;
                $_SESSION['LOGGED_USER'] = 
                [
                    "user_id" => $user['user_id'],
                    "email" => $user['email']
                    
                ];
                $_SESSION['FULL_NAME'] = $user['full_name'];
                $_SESSION['EMAIL'] = $user['email'];
            }
        }
        if(!isset($_SESSION['LOGGED_USER'])){
            $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf("Les information que vous avez entré ne vous permet pas de vous identifiez : (%s,%s)", $postEmail, strip_tags($postPassword));
    
        }
    }

redirectToUrl('index.php');
}

?>
