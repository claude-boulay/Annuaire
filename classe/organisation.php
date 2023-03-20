<?php
require_once("../models/model.php");

class Organisation
{
    private String $nom;
    private String $adresse;
    private String $telephone;
    private String $site;

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

    public function afficher()
    {
        $ligne = getOrganisation();
        echo "<center>";
        echo "<h2></h2>";
        echo "<tr>";
        foreach ($ligne as $valeur)
        {
            echo "<td>$valeur[0]</td>";
            echo "<td>$valeur[1]</td>";
            echo "<td>$valeur[2]</td>";
            echo "<td>$valeur[3]</td>";
        }
        echo "</tr>";
        echo "</center>";
    }
}
?>
