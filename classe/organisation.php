<?php
require_once("models/model.php");

class Organisation
{
    private string $nom;
    private string $adresse;
    private string $telephone;
    private string $site;

    public function __construct()
    {
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setSite($site)
    {
        $this->site = $site;
    }

    public static function afficher()
    {
        $ligne = getOrganisation();


        foreach ($ligne as $valeur) {
            echo "<tr>";
            echo "<td>$valeur[1]</td>";
            echo "<td>$valeur[2]</td>";
            echo "<td>$valeur[3]</td>";
            echo "<td>$valeur[4]</td>";
            echo "</tr>";
        }
    }
}
