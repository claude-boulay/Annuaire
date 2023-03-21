<?php
require_once("classe/etudiant.php");

require_once("models/model.php");

function addOneEtudiant()
{
    if (isset($_POST["enregistrer"])) {
        $nom = $_POST["étudiant_nom"];
        $prenom = $_POST["étudiant_prenom"];
        $telephone = $_POST["étudiant_tel"];
        $mail = $_POST["étudiant_mail"];
        $promo = $_POST["étudiant_promo"];

        $etudiant = new Etudiant($nom, $prenom, $telephone, $mail, $promo);
        $etudiant->enregistrer();

        if (isset($_POST["profession"])) {
            $profession = $_POST["profession"];
            $annee_debut = $_POST["annee_debut"];
            $annee_fin = $_POST["annee_fin"];
            $organisation_nom = $_POST["organisation_nom"];
            $organisation_adresse = $_POST["organisation_adresse"];
            $organisation_tel = $_POST["organisation_tel"];
            $organisation_site = $_POST["site"];

            addOneTravail($profession, $annee_debut, $annee_fin);

            addOneOrganisation(
                $organisation_nom,
                $organisation_adresse,
                $organisation_tel,
                $organisation_site
            );
        }
        echo "inscription réussi";
    } else {
        echo "problème d'inscription";
    }
    require_once("views/viewEtudiant.php");
}
