<?php session_start();?>
<!----------------- DATA ----------------->
<?php include_once("data/variables.php"); ?>

<!----------------- FUNCTIONS ----------------->
<?php include("func/fonctions.php"); ?>

<!----------------- HEAD ----------------->
<?php 
$title = "Site de recettes";
require('includes/head.php')
?>
<body>

<!----------------- HEADER ----------------->
<?php include_once("includes/header.php");?>
    <main>
        
        <h1>site de recettes</h1>
        <?php require('login.php')?> 
            
                <?php foreach(getRecipe($recipes) as $recipe):?>
                <section>
                    <h3><a href="recipe_post_detail.php?id=<?php echo $recipe['recipe_id']?>"><?= $recipe['title'];?></a></h3>
                    <p><?= $recipe['recipe'];?></p>
                    <p>
                        <?= displayAuthor($recipe['author'], $users);?>
                    </p>
                    <?php if(isset($_SESSION['LOGGED_USER'])&& $_SESSION['LOGGED_USER']['email'] === $recipe['author'] ): ?>
                    <ul>
                        <li>
                            <a href="recipe_post_update.php?id=<?= $recipe['recipe_id']; ?>">Editer la recette
                            </a>
                        </li>
                        <li>
                            <a href="recipe_post_delete.php?id=<?=$recipe['recipe_id']; ?>">supprimer la recette</a>
                        </li>
                    </ul>    
                    <?php endif; ?>
                </section>
                <?php endforeach; ?>
                
    </main>
            
            <?php include("includes/footer.php");?>
</body>
</html>