<?php
session_start();
require('config/dbConnect.php');
require('isConnect.php');


if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    $msgError = "la recette n'as pas été trouvé!";
}else{
    require('CRUD/read_recipe.php');
}

require('CRUD/update_recipe.php');

var_dump($recipe);
?>

<?php
$title = "Modification de recette" ; 
include('includes/head.php')
?>
<body>
    <?php include_once('includes/header.php') ?>
    <main>
        <h1>Modifier votre recette ?</h1>
        <form action="" method="POST">
            <input type="hidden" name="id" id="id" value="<?= $_GET['id']?>">
            <div class="title-champ">
                <label for="">Titre</label>
                <input type="text" id="title" name="title" value="<?= $recipe['title'] ?>">
            </div>
            <div class="recipe-champ">
                <label for="recipe">recette</label>
                <textarea name="recipe" id="recipe" ><?= $recipe['recipe']?></textarea>
            </div>
            <div class="submit-btn">
                <button type="submit" name="submit">Valider</button>
            </div>
        </form>
    </main>
    
</body>
</html>