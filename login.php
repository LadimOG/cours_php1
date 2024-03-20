<?php if(!isset($_SESSION['AUTH'])) :?>
<form  action="submit_login.php" method="POST" class="container-form">
<?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
<div >
<?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
</div>
<?php endif; ?>
    <div class="champ-email">
        <label for="email">Votre email</label>
        <input type="email" name="email" id="email" placeholder="exemple@mail.com">
    </div>
    <div class="champ-password">
        <label for="mdp">Votre mot de passe</label>
        <input type="password" name="mdp" id="mdp">
    </div>
    <div class="btn-submit">
        <button type="submit" name="submit">Valider</button> 
    </div>  
</form>
<a href="singin.php">Créer un nouveau compte.</a>
<?php else : ?>
<h2>
    Bienvenue <?php echo "<span class='full-name'>{$_SESSION['FULL_NAME']}</span>" ;?> sur le site de recette.
</h2>
<?php endif; ?>
