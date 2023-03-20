<?php

abstract class Personne
{

    protected string $nom;
    protected string $prenom;
    protected string $telephone;
    protected string $mail;

    public abstract function Enregistrer();

    public abstract static function afficher();

    public abstract function setNom($nom);

    public abstract function setPrenom($prenom);

    public abstract function setTelephone($telephone);

    public abstract function setMail($mail);

    public abstract function getNom();

    public abstract function getPrenom();

    public abstract function getTelephone();

    public abstract function getMail();
}
?>

