<?php 
require('../submit_contact.php');
$title = 'Contact';
include('../includes/head.php')
?>
<body>
    <?php include("../includes/header.php"); ?>
    <main>
        <h1>page de contact</h1>
        <?php if(isset($msgSucces)){echo "<h3>{$msgSucces}</h3>"; }?>
        <form action=""  method="POST" enctype="multipart/form-data">
            <?php if(isset($msgError)){echo "<p>{$msgError}</p>"; }?>
            <div class="input-mail">
                <label for="email">Adresse Mail</label>
                <input type="email" id="email" name="email" placeholder="adresse mail">
            </div>
            <div class="input-file">
                <label for="img">Image</label>
                <input type="file" id="img" name="img" >
            </div>
            <div class="text-area">
                <label for="message">message</label>
                <textarea name="message" id="message"  placeholder="votre message"></textarea>
            </div>
            <div class="input-phone">
                <button type="submit" name="valider">Envoyer</button>
            </div>
      
        </form>
    </main>
 <?php require_once("../includes/footer.php"); ?>
</body>
</html>