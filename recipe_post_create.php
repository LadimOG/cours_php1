<?php
session_start();
require("isConnect.php");
require('config/dbConnect.php');
require('CRUD/create_recipe.php');
?>

<?php
$title = "création recette" ;
include('includes/head.php')
?>
<body>
<?php include_once('includes/header.php')?>
<h1>Ajouter une recette</h1>
<main>

    <form action="" method="post">  
        
        <?php if(isset($msgError)) : ?>
        <p><?php echo  $msgError;?></p><br>
        <?php endif; ?>
        
        <div class="title-champ">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" placeholder="Titre">
        </div>
        <div class="recipe-champ">
            <label for="recipe">Recette</label>
            <textarea name="recipe" id="recipe" placeholder="entrer la recette"></textarea>
        </div>
        
        <div class="submit-btn">
            <button type="submit" name="submit">Valider</button>
        </div>
    </form>
   
</main>
<?php include_once('includes/footer.php');?>
</body>
</html>