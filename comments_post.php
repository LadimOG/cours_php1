<?php require('comments_valid.php') ?>
<form action="" method="post">
    <?php if(isset($msgError)): ?>
    <h2><?= $msgError ?></h2>
    <?php endif; ?>    
    <?php if(isset($msgSucces)): ?>
    <h2><?= $msgSucces ?></h2>
    <?php endif; ?>  
      
    <input type="hidden" name="recipe_id" value="<?php $_GET['id']?>" >
    <label for="comment">commentaire</label>
    <textarea name="comment" id="comment"></textarea> 
    <select name="rating" >
        <option value="">Donner une note</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <button name="submit">Envoyer</button>
</form>