<?php
require('config/dbConnect.php');
require('singin_users.php')
?>

<?php 
$title = "inscription" ;
include('includes/head.php')
?>
<body>
    <?php include_once('includes/header.php') ?>
    <main>
        <form action="" method="post">
            <?php if(isset($msgError)){echo "<p>$msgError</p></br> ";} ?>

            <div class="full-name-user">
                <label for="full-name">Nom - prénom</label>
                <input type="text" name="full-name" id="full-name">
            </div>
            <div class="email-user">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="password-user">
                <label for="password1">Mot de passe</label>
                <input type="password" name="password1" id="password1">
            </div>
            <div class="confirme-password-user">
                <label for="password2">confirmer mot de passe</label>
                <input type="password" name="password2" id="password2">
            </div>
            <div class="age-user">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" min="18" >
            </div>
            <div class="btn-submit">
                <button type="submit" name="submit">Inscription</button>
            </div>
        </form>
    </main>
    
</body>
</html>