<?php
require_once("personne.php");
require_once("../models/model.php");

class Professeur extends Personne
{

    private string $matiere;
    //construteur
    public function __construct(string $nom, string $prenom, int $telephone, string $mail, string $matiere)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setTelephone($telephone);
        $this->setMail($mail);
        $this->setMatiere($matiere);
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

    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
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
        return $this->matiere;
    }

    //autres méthode

    public function Enregistrer()
    {
        $cnx = connexionBDD();
        $requete = $cnx->prepare("INSERT INTO Professeur(prof_nom,prof_prenom,
        prof_tel,prof_mail,prof_matiere) 
        VALUES('$this->nom','$this->prenom','$this->telephone','$this->mail','$this->matiere')");
        $result = $requete->execute();
    }

    public static function afficher()
    {

        $ligne = getProfesseur();
        echo "<center>";
        echo "<h2>Tous les professeurs aillant fait cours au classes de BTS SIO</h2>";
        echo "<tr>";
        foreach ($ligne as $valeur) {
            echo "<td>$valeur[1]</td>";
            echo "<td>$valeur[2]</td>";
            echo "<td>$valeur[3]</td>";
            echo "<td>$valeur[4]</td>";
            echo "<td>$valeur[5]</td>";
        }
        echo "</tr>";
        echo "</center>";
    }
}
