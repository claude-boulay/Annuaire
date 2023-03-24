<?php
require_once("classe/etudiant.php");

require_once("models/model.php");

function addOneEtudiant()
{
    if (isset($_POST["enregistrer"])) {
        $id = $_POST["étudiant_id"];
        $nom = $_POST["étudiant_nom"];
        $prenom = $_POST["étudiant_prenom"];
        $telephone = $_POST["étudiant_tel"];
        $mail = $_POST["étudiant_mail"];
        $promo = $_POST["étudiant_promo"];
        $id_org = $_POST["organisation_id"];
        $travail = $_POST["travail"];

        $etudiant = new Etudiant($id, $nom, $prenom, $telephone, $mail, $promo, $travail);
        $etudiant->enregistrer();


        $profession = $_POST["profession"];
        $annee_debut = $_POST["annee_debut"];
        $annee_fin = $_POST["annee_fin"];
        $organisation_nom = $_POST["organisation_nom"];
        $organisation_adresse = $_POST["organisation_adresse"];
        $organisation_tel = $_POST["organisation_tel"];
        $organisation_site = $_POST["site"];



        addOneOrganisation(
            $id_org,
            $organisation_nom,
            $organisation_adresse,
            $organisation_tel,
            $organisation_site
        );

        addOneTravail($id_org, $id, $profession, $annee_debut, $annee_fin);
    }
    require_once("views/viewEtudiant.php");
}
