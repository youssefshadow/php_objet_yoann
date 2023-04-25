<?php
class Personnage {
    private $id;
    private $nom;
    private $classe;
    private $pv;
    private $attaque;
    private $defense;
    private $idJoueur;

    public function __construct($nom, $classe, $pv, $attaque, $defense, $idJoueur) {
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
            $req = $bdd->prepare("INSERT INTO personnages(nom_personnage, classe_personnage, pv_personnage, attaque_personnage, defense_personnage, id_joueur) VALUES(?, ?, ?, ?, ?, ?)");
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

}
?>