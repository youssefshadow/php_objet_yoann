<?php
include './model/personnages.php';
include './model/joueur.php';
include './view/view_navbar.php';
//connexion à la bdd
$connexion = new Connexion();
$bdd = $connexion->connexion();


// Utiliser la méthode statique "selectAll" pour récupérer tous les joueurs
$mesJoueurs = Personnage::selectAll($bdd);

// Afficher les personnages
include './view/view_showJoueur.php'

?>