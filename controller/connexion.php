<?php
 include './model/joueur.php';
 include './utils/functions.php';
 

    


 $connexion = new Connexion();
 $bdd = $connexion->connexion();

    // Si le formulaire est soumis
    if (isset($_POST['connexion'])) {
        $mail = CleanInput( $_POST['mail_joueur']);
        $password = CleanInput($_POST['password_joueur']);

        // Récupération de l'joueur correspondant au mail
        $user = new Joueurs('', $mail, $password);

        $result = $user->getUserByMail($bdd, $mail);

        if (count($result) == 1) { 
            
            $db_password = $result[0]['password_joueur'];
            if (password_verify($password, $db_password)) { 

                // Enregistrement des données joueur dans la session
                $_SESSION['connected'] = true;
                $_SESSION['id'] = $result[0]['id_joueur'];
                $_SESSION['pseudo'] = $result[0]['pseudo_joueur'];
                $_SESSION['mail'] = $result[0]['mail_joueur'];

                // Redirection vers la page d'accueil
                header('Location: ./');
               
            } else {
                echo '<h1>Mot de passe incorrect.</h1>';
                //version sécurisé:
                //echo '<h1>mot de passe ou idientifiant incorrect .</h1>';
            }
        } else {
            echo '<h1>Aucun joueur trouvé pour ce mail.</h1>';
            //version sécurisé:
            //echo '<h1>mot de passe ou idientifiant incorrect .</h1>';
            
        }
    }

    $message ="";
   
    include './view/view_navbar.php';
    include './view/view_connexion.php';
   
?>
