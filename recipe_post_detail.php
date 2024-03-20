<?php
session_start();
require('config/dbConnect.php');
require('CRUD/read_recipe.php');
$title = "détail recette" ;
?>

<?php include('includes/head.php');?>
<body>
    
    <?php include_once('includes/header.php') ?>
    <main>
        <h1>Detail de la recette</h1>
        <section>
            <?php if(isset($msgError)): ?>
            <?= $msgError ?> 
            <?php else: ?> 

            <h2><?= $recipe['title']?> </h2>
            <p><?= $recipe['recipe']?></p>
            <p><?= $recipe['author']?></p>
            <p>note: <span><?= $recipe['rating'] ?></span></p></br>
            
            <div class="comments-box">
                <h3>commentaires</h3>
                <?php foreach($recipe['comments'] as $comment):?>
                    <p> <?= $comment['comment'] ?></p>
                    <p> <?= $comment['full_name'] ?></p>
                    <p>Publié le: <?= $comment['publish']?></p></br>
                <?php endforeach; ?>
            </div>

            <?php if(isset($_SESSION['AUTH'])) :?>
            <?php include_once("comments_post.php"); ?>
            <?php endif; ?> 
            <?php endif; ?>  
        </section>
        
    </main>
    <?php include_once('includes/footer.php') ?>
</body>
</html>