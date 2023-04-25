<?php
include './model/personnages.php';
include './model/joueur.php';
include './utils/functions.php';
include './view/view_navbar.php';
include './view/view_add_perso.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$connexion = new Connexion();
$bdd = $connexion->connexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if (!empty($_POST['nom_personnage']) && !empty($_POST['classe_personnage']) && !empty($_POST['pv_personnage']) && !empty($_POST['attaque_personnage']) && !empty($_POST['defense_personnage'])) {
        $nom = cleanInput($_POST['nom_personnage']);
        $classe = cleanInput($_POST['classe_personnage']);
        $pv = cleanInput($_POST['pv_personnage']);
        $attaque = cleanInput($_POST['attaque_personnage']);
        $defense = cleanInput($_POST['defense_personnage']);
        
        if (isset($_SESSION['id'])) {
            $idJoueur = $_SESSION['id'];
        } else {
            echo "<h1>Erreur : Impossible de récupérer l'identifiant du joueur connecté</h1>";
            exit;
        }

        $personnage = new Personnage($nom, $classe, $pv, $attaque, $defense, $idJoueur);

        if ($personnage->insertPersonnage($bdd)) {
            echo "<h1>Le personnage $nom a été ajouté en BDD</h1>";
        } else {
            echo "<h1>Une erreur est survenue lors de l'ajout du personnage.</h1>";
        }
    } else {
        echo "<h1>Veuillez remplir tous les champs du formulaire</h1>";
    }
}
