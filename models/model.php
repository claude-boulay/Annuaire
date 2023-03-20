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


function getEtudiant()
{
    $cnx = connexionBDD();
    $requete = "SELECT * FROM Etudiant ORDER BY etudiant_Id ASC";
    $resultGetEtudiant = $cnx->query($requete);
    return $resultGetEtudiant;
}

function getProfesseur()
{
    $cnx = connexionBDD();
    $requete = "SELECT * FROM Professeur ORDER BY professeur_Id ASC";
    $resultGetProf = $cnx->query($requete);
    return $resultGetProf;
}

function AddOneOrganisation(
    $profession,
    $annee_debut,
    $annee_fin,
    $organisation_nom,
    $organisation_adresse,
    $organisation_tel
) {
}
