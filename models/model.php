<?php
function connexionBDD()
{
    $host = "localhost";
    $db_name = "Annuaire";
    $username = "root";
    $password = "root";
    $connexion = False;

    if (!$connexion) {
        try {
            $bddPDO = new PDO('mysql:host=' . $host . ';dbname=' . $db_name . '', $username, $password);
            $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bddPDO;
        } catch (PDOException $exeption) {
            echo "Erreur de connexion: " . $exeption->getMessage();
        }
    }
}

function GetEtudiant()
{
    $cnx = connexionBDD();
    $requete = "SELECT * FROM AncienEtudiant ORDER BY etudiant_Id ASC";
    $resultGetEtudiant = $cnx->query($requete);
    return $resultGetEtudiant;
}

function GetProfesseur()
{
    $cnx = connexionBDD();
    $requete = "SELECT * FROM Professeur ORDER BY professeur_Id ASC";
    $resultGetProf = $cnx->query($requete);
    return $resultGetProf;
}

function AddOneOrganisation($profession, $annee_debut, $annee_fin, $organisation_nom, $organisation_adresse, $organisation_tel, $organisation_site)
{
    $cnx = connexionBDD();
    $requete1 = $cnx->prepare("INSERT INTO Travailler(profession,annee_debut,annee_fin) VALUES('$profession','$annee_debut','$annee_fin')");

    $requete2 = $cnx->prepare("INSERT INTO Organisation(organisation_nom,organisation_adresse,organisation_tel,organisation_site) VALUES('$organisation_nom','$organisation_adresse','$organisation_tel','$organisation_site')");

    return [$requete1, $requete2];
}
