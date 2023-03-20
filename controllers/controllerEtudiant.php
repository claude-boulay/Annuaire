<?php
require_once("../classe/etudiant.php");
require_once("../views/viewEtudiant.php");

function AddOneEtudiant()
{

    if (isset($_POST["enregistrer"])) {
        $nom = $_POST["etudiant_nom"];
        $prenom = $_POST["etudiant_prenom"];
        $telephone = $_POST["etudiant_tel"];
        $mail = $_POST["etudiant_mail"];
        $promo = $_POST["etudiant_promo"];

        $etudiant = new Etudiant($nom, $prenom, $telephone, $mail, $promo);
        $etudiant->Enregistrer();

        if (isset($_POST["profession"])) {
            $profession = $_POST["profession"];
            $annee_debut = $_POST["annee_debut"];
            $annee_fin = $_POST["annee_fin"];
            $organisation_nom = $_POST["organisation_nom"];
            $organisation_adresse = $_POST["organisation_adresse"];
            $organisation_tel = $_POST["organisation_tel"];

            AddOneOrganisation(
                $profession,
                $annee_debut,
                $annee_fin,
                $organisation_nom,
                $organisation_adresse,
                $organisation_tel
            );
        }
        echo "inscription réussi";
    } else {
        echo "problème d'inscription";
    }
}
?>

