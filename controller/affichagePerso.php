<?php
include './model/personnages.php';
include './model/joueur.php';
include './view/view_navbar.php';

//connexion à la bdd
$connexion = new Connexion();
$bdd = $connexion->connexion();

$message = '';

// Vérifier si un terme de recherche est présent dans l'URL
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $mesJoueurs = Personnage::selectByName($bdd, $searchTerm);
    if (empty($mesJoueurs)) {
        $message = '<h1>Aucun personnage ne correspond à votre recherche.</h1>';
    }
} else {
    $mesJoueurs = Personnage::selectAll($bdd);
}

// Afficher les personnages
include './view/view_showJoueur.php';
?>
