<?php 
session_start();
require('isConnect.php');
require('./config/dbConnect.php');
require('CRUD/read_recipe.php');


if(!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])){
    $msgError = "La recette n'a pas été trouvé";
}else{
    require('./CRUD/delete_recipe.php');
    
}

?>
<?php 
$title = "Suppression de recette" ;
include('includes/head.php')
?>
<body>
    <?php include('includes/header.php')?>
    <main>
        <h1>supprimer la recette ?</h1>
        <?php if(isset($msgError)) : ?>
        <p><?php echo  $msgError;?></p><br>
        <?php else : ?>
        <?php if(isset($msgDeleteSucces)): ?>
        <h3><?= $msgDeleteSucces ?></h3>
        <?php else : ?>    
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"  >
            </div>
            <div class="submit-btn">
                <button type="submit" name="submit">Suppression definitive !</button>
            </div>
        </form>
        <div class="info">
            <h3><?= $recipe['title'] ?></h3>
            <p><?= $recipe['recipe'] ?></p>
        </div>
        <?php endif; ?>    
        <?php endif; ?>
    </main>
    
</body>
</html>