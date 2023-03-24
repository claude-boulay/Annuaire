<?php
require_once("personne.php");
require_once("models/model.php");

class Etudiant extends Personne
{

    private string $promo;
    private int $travail;
    private $id;

    public function __construct($id, string $nom, string $prenom, string $telephone, string $mail, string $promo, int $travail)
    {
        $this->id = $id;
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setTelephone($telephone);
        $this->setMail($mail);
        $this->setPromo($promo);
        $this->travail = $travail;
    }
    //setter
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function setPromo($promo)
    {
        $this->promo = $promo;
    }
    //getter

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getMatiere()
    {
        return $this->promo;
    }

    //autres méthode

    public function enregistrer()
    {
        $cnx = connexionBDD();
        $requete = $cnx->prepare("INSERT INTO AncienEtudiant(etudiant_id,etudiant_nom,etudiant_prenom,
            etudiant_telephone,etudiant_mail,etudiant_promo,etudiant_travail) 
            VALUES (:id,:nom,:prenom,:telephone,:mail,:promo,:travail)");
        $requete->bindValue(':id', $this->id);
        $requete->bindvalue(':nom', $this->nom);
        $requete->bindvalue(':prenom', $this->prenom);
        $requete->bindvalue(':telephone', $this->telephone);
        $requete->bindvalue('mail', $this->mail);
        $requete->bindvalue(':promo', $this->promo);
        $requete->bindvalue(':travail', $this->travail);
        $result = $requete->execute();

        return $result;
    }

    public static function afficher()
    {
        $ligne = getEtudiants();



        foreach ($ligne as $valeur) {
            echo "<tr>";
            echo "<td>$valeur[1]</td>";
            echo "<td>$valeur[2]</td>";
            echo "<td>$valeur[3]</td>";
            echo "<td>$valeur[4]</td>";
            echo "<td>$valeur[5]</td>";
            echo "<td>Non défini</td>";
            echo "<td>Non défini</td>";
            echo "<td>Non défini</td>";
            echo "<td>Non défini</td>";
            echo "<td>Non défini</td>";
            echo "<td>Non défini</td>";
            echo "<td><a href=controllerEtudiant/getUpdate/$valeur[0] >Modifier</a></td>";
            echo "</tr>";
        }
    }

    public function Update()
    {
        $cnx = connexionBDD();
        $requete = $cnx->prepare("UPDATE AncienEtudiant SET etudiant_id= :id,
        etudiant_nom=:nom,etudiant_prenom=:prenom,
        etudiant_telephone=:telephone,etudiant_mai=:mail
        etudiant_promo=:promo,etudiant_travail=:travail");

        $requete->bindValue(':id', $this->id);
        $requete->bindvalue(':nom', $this->nom);
        $requete->bindvalue(':prenom', $this->prenom);
        $requete->bindvalue(':telephone', $this->telephone);
        $requete->bindvalue('mail', $this->mail);
        $requete->bindvalue(':promo', $this->promo);
        $requete->bindvalue(':travail', $this->travail);
        $result = $requete->execute();
        return $result;
    }
}
