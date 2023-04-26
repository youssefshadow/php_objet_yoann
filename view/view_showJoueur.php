
<style>
    <?php 
        include './asset/style/style.css'; 
    ?>
</style>
<section class="card_container">
<?php foreach ($mesJoueurs as $joueur) { ?>

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
<?php } ?>

</section>
