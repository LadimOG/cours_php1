<?php
session_start();
require('func/fonctions.php');
if(isset($_POST['submit'])){
    $fullName = trim(strip_tags($_POST['full-name']));
    $email = trim(strip_tags($_POST['email']));
    $password = $_POST['password1'];
    $password_verif = $_POST['password2'];
    $age = (int)($_POST['age']);
    
    if(empty($fullName)|| 
    empty($email)|| 
    empty($password)||
    empty($password_verif)||
    empty($age)){
        $msgError = "Veuillez remplir tout les champs!";
    }
    if(!is_numeric($age) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $msgError = "Veuillez remplir tout les champs correctement!";
    }

    if($password !== $password_verif){
        $msgError = "Vos deux mot de passe ne sont pas identique";
    }else{
        $userQuery = 'INSERT INTO users(full_name, email, password, age) VALUE (:full_name, :email, :password, :age)';
        $usersStatement = $pdo->prepare($userQuery);
        $usersStatement->execute([
            "full_name" => $fullName,
            "email" => $email,
            "password" => trim(strip_tags(password_hash($password, PASSWORD_DEFAULT))),
            "age" => $age
        ]);

        $_SESSION['AUTH'] = true;
        $_SESSION['EMAIL'] = $email;
        $_SESSION['FULL_NAME'] = $fullName;
        
        redirectToUrl('index.php');

    }
  
}