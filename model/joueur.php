<?php
class Joueurs {
    private $id;
    private $pseudo;
    private $mail;
    private $password;

    public function __construct($pseudo, $mail, $password) {
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->password = $password;
    }

    // les fameux  Getters  

    public function getId() {
        return $this->id;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPassword() {
        return $this->password;
    }

    //  les fameux Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    // classe pour récupérer un joueur à partir d'un mail
    public function getPlayerBymail(PDO $pdo) {
        try {
            $mail = $this->getMail();

            $req = $pdo->prepare("SELECT * FROM joueurs WHERE mail_joueur = ?");
            $req->bindParam(1, $mail, PDO::PARAM_STR);
            $req->execute();

            $data = $req->fetchAll();
            return $data;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    // méthode pour ajouter un joueur à la bdd
    public function insertUser($bdd) {
        try {
            $pseudo = $this->getPseudo();
            $mail = $this->getMail();
            $password = $this->getPassword();
            $req = $bdd->prepare("INSERT INTO joueurs(pseudo_joueur, mail_joueur, password_joueur) VALUES(?, ?, ?)");
            $req->bindParam(1, $pseudo, PDO::PARAM_STR);
            $req->bindParam(2, $mail, PDO::PARAM_STR);
            $req->bindParam(3, $password, PDO::PARAM_STR);
            $req->execute();
            return true;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    // méthode pour sélectionner tous les joueurs
    public static function selectAll($bdd) {
        $query = 'SELECT * FROM joueurs';
        $stmt = $bdd->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // classe pour récuperer utilisateur à partir d'un mail
public function getUserByMail(PDO $pdo) {
    try {
        $mail = $this->getMail();

        $req = $pdo->prepare("SELECT * FROM joueurs WHERE mail_joueur = ?");
        $req->bindParam(1, $mail, PDO::PARAM_STR);
        $req->execute();

        $data = $req->fetchAll();
        return $data;
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
}


?>