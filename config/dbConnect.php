<?php

include_once('mysql.php');

try {
    $pdo = new PDO(
        "mysql:host={$host};dbname={$dbName};charset=utf8",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
} catch (PDOException $e) {
    die("Erreur : ".$e->getMessage());
    
}
?>