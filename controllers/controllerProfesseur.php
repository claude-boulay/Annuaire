<?php

require_once("../classe/professeur.php");
require_once("../views/viewProfesseur.php");

function AddOneProfesseur()
{
    if (isset($_POST["enregistrer"])) {
        $nom = $_POST["prof_nom"];
        $prenom = $_POST["prof_prenom"];
        $telephone = $_POST["prof_tel"];
        $mail = $_POST["prof_mail"];
        $matiere = $_POST["prof_matiere"];

        $professeur = new Professeur($nom, $prenom, $telephone, $mail, $matiere);
        $professeur->Enregistrer();
        echo "inscription réussi";
    } else {
        echo "problème d'inscription";
    }
}
?>

