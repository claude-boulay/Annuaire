<?php
require_once("personne.php");
require_once("models/model.php");

class Etudiant extends Personne
{

    private string $promo;
    private $id;

    public function __construct($id, string $nom, string $prenom, string $telephone, string $mail, string $promo)
    {
        $this->id = $id;
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setTelephone($telephone);
        $this->setMail($mail);
        $this->setPromo($promo);
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
            etudiant_telephone,etudiant_mail,etudiant_promo) 
            VALUES (:id,:nom,:prenom,:telephone,:mail,:promo)");
        $requete->bindValue(':id', $this->id);
        $requete->bindvalue(':nom', $this->nom);
        $requete->bindvalue(':prenom', $this->prenom);
        $requete->bindvalue(':telephone', $this->telephone);
        $requete->bindvalue('mail', $this->mail);
        $requete->bindvalue(':promo', $this->promo);
        $result = $requete->execute();

        return $result;
    }

    public static function afficher()
    {
        $ligne = getEtudiant();



        foreach ($ligne as $valeur) {
            echo "<tr>";
            echo "<td>$valeur[1]</td>";
            echo "<td>$valeur[2]</td>";
            echo "<td>$valeur[3]</td>";
            echo "<td>$valeur[4]</td>";
            echo "<td>$valeur[5]</td>";
            echo "</tr>";
        }
    }
}
