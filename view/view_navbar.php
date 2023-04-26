<header>
    <nav>
        <a class="logo" href="./">
            <img src="<?php echo isset($_SESSION['connected']) ? 'https://img.icons8.com/bubbles/50/null/joy-con.png' : 'https://img.icons8.com/bubbles/50/null/controller.png'; ?>"/>
        </a>
        <span><a href="./">Accueil</a></span>

        <?php if (isset($_SESSION['connected'])): ?>
            <span><a href="./show">Personages</a></span>
            <span><a href="./createPerso">Ajouter Un Personnage</a></span>
            <span><a href="./deconexion">Déconnexion</a></span>
        <?php else: ?>
            <span><a href="./createUser">Ajouter utilisateur</a></span>
            <span><a href="./connexion">Connexion</a></span>
        <?php endif; ?>
    </nav>
</header>
<style>
    <?php 
        include './asset/style/style.css'; 
    ?>
</style>
