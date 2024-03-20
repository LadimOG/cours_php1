<header>
    <div class="logo">
        <p><a href="/index.php">Ladim<span>Recettes</span></a></p>
    </div>
    <nav>
        <ul>
            <li><a href="/index.php">Home</a></li>
            <li><a href="/pages/contact.php">Contact</a></li>
            <li><a href="/pages/aPropos.php">A propos</a></li>
            <?php if(isset($_SESSION['AUTH'])):?>
            <li><a href="recipe_post_create.php">Ajouter une recette</a></li>
            <li><a href="logout.php">Deconnexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>