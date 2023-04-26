<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des personnages</title>
    <link rel="stylesheet" href="./asset/style/style.css">
</head>
<body>


    <div class="container">
        <form action="#" method="get" class="search-form">
            <input type="text" name="search" placeholder="Rechercher par nom...">
            <button type="submit">Rechercher</button>
            <?php if (isset($_GET['search']) && !empty($_GET['search'])) { ?>
                <a class="btn_annul" href="./show" class="cancel-search">Annuler </a>
            <?php } ?>
        </form>

        <?php if (!empty($message)) { ?>
            <p class="message"><?php echo $message; ?></p>
        <?php } ?>

        <section class="card_container">
            <?php if (!empty($mesJoueurs)) {
                foreach ($mesJoueurs as $joueur) { ?>
                    <div class="card">
                        <img src="./asset/images/téléchargement.png" alt="<?php echo $joueur['nom_perso']; ?>">
                        <div class="card-content">
                            <h3><?php echo $joueur['nom_perso']; ?></h3>
                            <p>Type : <?php echo $joueur['classe_personnage']; ?></p>
                            <ul>
                                <li>Attaque : <span><?php echo $joueur['attaque_personnage']; ?></span></li>
                                <li>Défense : <span><?php echo $joueur['defense_personnage']; ?></span></li>
                            </ul>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <!-- <p>Aucun personnage à afficher.</p> -->
            <?php } ?>
        </section>
    </div>
</body>
</html>
