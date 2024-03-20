<?php
if(!isset($_SESSION['LOGGED_USER'])){
    echo "Vous devez etre authentifié pour cette action !";
    exit();
}