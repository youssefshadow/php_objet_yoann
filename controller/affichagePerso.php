<?php
include './model/personnages.php';
include './model/joueur.php';
include './view/view_navbar.php';

$connexion = new Connexion();
$bdd = $connexion->connexion();


// Utiliser la méthode statique "selectAll" pour récupérer tous les joueurs
$mesJoueurs = Personnage::selectAll($bdd);

// Afficher les personnages
echo "Liste des personnages : <br>";

foreach ($mesJoueurs as $joueur) {
    echo "Blaze : " . $joueur['nom_perso'] . "<br>";
    echo "Type : " . $joueur['classe_personnage'] . "<br>";
    echo "Attaque : " . $joueur['attaque_personnage'] . "<br>";
    echo "defense : " . $joueur['defense_personnage'] . "<br>";
    echo "---------------<br>";
}


?>