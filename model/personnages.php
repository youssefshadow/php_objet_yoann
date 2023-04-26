<?php
class Personnage {
    private $id;
    private $nom;
    private $classe;
    private $pv;
    private $attaque;
    private $defense;
    private $idJoueur;

    public function __construct() {
        $this->nom = $nom;
        $this->classe = $classe;
        $this->pv = $pv;
        $this->attaque = $attaque;
        $this->defense = $defense;
        $this->idJoueur = $idJoueur;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getClasse() {
        return $this->classe;
    }

    public function getPv() {
        return $this->pv;
    }

    public function getAttaque() {
        return $this->attaque;
    }

    public function getDefense() {
        return $this->defense;
    }

    public function getIdJoueur() {
        return $this->idJoueur;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setClasse($classe) {
        $this->classe = $classe;
    }

    public function setPv($pv) {
        $this->pv = $pv;
    }

    public function setAttaque($attaque) {
        $this->attaque = $attaque;
    }

    public function setDefense($defense) {
        $this->defense = $defense;
    }

    public function setIdJoueur($idJoueur) {
        $this->idJoueur = $idJoueur;
    }

    // Méthode pour insérer un personnage dans la base de données
    public function insertPersonnage($bdd) {
        try {
            $nom = $this->getNom();
            $classe = $this->getClasse();
            $pv = $this->getPv();
            $attaque = $this->getAttaque();
            $defense = $this->getDefense();
            $idJoueur = $this->getIdJoueur();
            $req = $bdd->prepare("INSERT INTO personnage(nom_perso, classe_personnage, pv_personnage, attaque_personnage, defense_personnage, id_joueeur) VALUES(?, ?, ?, ?, ?, ?)");
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $classe, PDO::PARAM_STR);
            $req->bindParam(3, $pv, PDO::PARAM_INT);
            $req->bindParam(4, $attaque, PDO::PARAM_INT);
            $req->bindParam(5, $defense, PDO::PARAM_INT);
            $req->bindParam(6, $idJoueur, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
    // méthode pour sélectionner tous les joueurs
    public static function selectAll($bdd) {
        $query = 'SELECT * FROM personnage';
        $stmt = $bdd->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        // Méthode pour récupérer tous les personnage d'un joueur
        public static function getpersonnageJoueur($bdd, $idJoueur) {
            try {
                $req = $bdd->prepare("SELECT * FROM personnage WHERE id_joueur = ?");
                $req->bindParam(1, $idJoueur, PDO::PARAM_INT);
                $req->execute();
                $result = $req->fetchAll(PDO::FETCH_ASSOC);
                $personnage = array();
                foreach ($result as $row) {
                    $personnage = new Personnage($row['nom_perso'], $row['classe_personnage'], $row['pv_personnage'], $row['attaque_personnage'], $row['defense_personnage'], $row['id_joueur']);
                    $personnage->setId($row['id_personnage']);
                    array_push($personnage, $personnage);
                }
                return $personnage;
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }
        
        // Méthode pour récupérer un personnage à partir de son ID
        public static function getPersonnageById($bdd, $idPersonnage) {
            try {
                $req = $bdd->prepare("SELECT * FROM personnage WHERE id_personnage = ?");
                $req->bindParam(1, $idPersonnage, PDO::PARAM_INT);
                $req->execute();
                $result = $req->fetch(PDO::FETCH_ASSOC);
        
                $personnage = new Personnage($result['nom_personnage'], $result['classe_personnage'], $result['pv_personnage'], $result['attaque_personnage'], $result['defense_personnage'], $result['id_joueur']);
                $personnage->setId($result['id_personnage']);
                return $personnage;
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }
        
        // Méthode pour mettre à jour un personnage dans la base de données
        public function updatePersonnage($bdd) {
            try {
                $id = $this->getId();
                $nom = $this->getNom();
                $classe = $this->getClasse();
                $pv = $this->getPv();
                $attaque = $this->getAttaque();
                $defense = $this->getDefense();
                $idJoueur = $this->getIdJoueur();
                $req = $bdd->prepare("UPDATE personnage SET nom_personnage = ?, classe_personnage = ?, pv_personnage = ?, attaque_personnage = ?, defense_personnage = ?, id_joueur = ? WHERE id_personnage = ?");
                $req->bindParam(1, $nom, PDO::PARAM_STR);
                $req->bindParam(2, $classe, PDO::PARAM_STR);
                $req->bindParam(3, $pv, PDO::PARAM_INT);
                $req->bindParam(4, $attaque, PDO::PARAM_INT);
                $req->bindParam(5, $defense, PDO::PARAM_INT);
                $req->bindParam(6, $idJoueur, PDO::PARAM_INT);
                $req->bindParam(7, $id, PDO::PARAM_INT);
                $req->execute();
                return true;
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }
        
        // Méthode pour supprimer un personnage de la base de données
        public static function deletePersonnage($bdd, $idPersonnage) {
            try {
                $req = $bdd->prepare("DELETE FROM personnage WHERE id_personnage = ?");
                $req->bindParam(1, $idPersonnage, PDO::PARAM_INT);
                $req->execute();
                return true;
            } catch (Exception $e) {
                die('Erreur : '.$e
                ->getMessage());
    }
    }
    
    
    
    // Méthode pour récupérer tous les personnage dans la base de données
    public static function getpersonnage($bdd) {
    try {
    $req = $bdd->prepare("SELECT * FROM personnage");
    $req->execute();
    $personnage = array();
    while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
    $personnage = new Personnage($donnees['nom_personnage'], $donnees['classe_personnage'], $donnees['pv_personnage'], $donnees['attaque_personnage'], $donnees['defense_personnage'], $donnees['id_joueur']);
    $personnage->setId($donnees['id_personnage']);
    array_push($personnage, $personnage);
    }
    return $personnage;
    } catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
    }
    }
    public static function selectByName($bdd, $nom) {
        $query = 'SELECT * FROM personnage WHERE nom = :nom';
        $stmt = $bdd->prepare($query);
        $stmt->execute(['nom' => $nom]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    


}    
