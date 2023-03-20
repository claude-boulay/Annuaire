<?php

require_once("../classe/professeur.php");
require_once("../views/viewProfesseur.php");

function addOneProfesseur()
{
    if (isset($_POST["enregistrer"])) {
        $nom = $_POST["prof_nom"];
        $telephone = $_POST["prof_tel"];
        $mail = $_POST["prof_mail"];
        $matiere = $_POST["prof_matiere"];

        $professeur = new Professeur($nom, $telephone, $mail, $matiere);
        $professeur->enregistrer();
        echo "inscription réussi";
    } else {
        echo "problème d'inscription";
    }
}
