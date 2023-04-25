<?php
    

    include './utils/connectBdd.php';

    //utilisation de session_start(pour gérer la connexion au serveur)
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //routeur
    switch ($path) {
        case '/tp_yoann/':
            include './home.php';
            break;
        case '/tp_yoann/createUser':
            include './controller/add_user.php';
            break;
            case '/tp_yoann/connexion':
                include './controller/connexion.php';
                break; 
        case '/tp_yoann/createPerso':
            include './controller/add_personnage.php';
            break;
        case '/tp_yoann/test':
            include './test.php';
            break;
        case '/tp_yoann/show':
            include './controller/affichagePerso.php';
            break;
        case '/tp_yoann/deconexion':
            include './controller/deconexion.php';
            break; 
        default:
            include './error.php';
            break;
    }
?>
