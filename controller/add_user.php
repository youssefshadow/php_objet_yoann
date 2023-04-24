<?php

include './model/joueur.php';
include './utils/functions.php';
include './view/view_navbar.php';
include './view/view_add_user.php';

$connexion = new Connexion();
$bdd = $connexion->connexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if (!empty($_POST['pseudo_joueur']) && !empty($_POST['mail_joueur']) && !empty($_POST['password_joueur'])) {
        $pseudo = cleanInput($_POST['pseudo_joueur']);
        $mail = cleanInput($_POST['mail_joueur']);
        $password = password_hash(cleanInput($_POST['password_joueur']), PASSWORD_DEFAULT);

        $joueur = new Joueurs($pseudo, $mail, $password);

        $exist = $joueur->getUserByMail($bdd, $mail);
        if (empty($exist)) {
            if ($joueur->insertUser($bdd)) {
                echo "<h1>Le compte $pseudo a été ajouté en BDD</h1>";
            } else {
                echo "<h1>Une erreur est survenue lors de l'ajout du joueur.</h1>";
            }
        } else {
            echo "<h1>L'utilisateur existe déjà dans la base de données.</h1>";
        }
    } else {
        echo "<h1>Veuillez remplir tous les champs du formulaire</h1>";
    }
}
?>
