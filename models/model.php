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
    $requete = "SELECT * FROM AncienEtudiant ORDER BY etudiant_Id ASC";
    $resultGetEtudiant = $cnx->query($requete);
    return $resultGetEtudiant;
}

function getProfesseur()
{
    $cnx = connexionBDD();
    $requete = "SELECT * FROM Professeur ORDER BY prof_id ASC";
    $resultGetProf = $cnx->query($requete);
    return $resultGetProf;
}

function getOrganisation()
{
    $cnx = connexionBDD();
    $requete = $cnx->prepare("SELECT * FROM Organisation ORDER BY organisation_id ASC");
    $resultGetOrg = $cnx->query($requete);
    return $resultGetOrg;
}

function getTravail()
{
    $cnx = connexionBDD();
    $requete = $cnx->prepare("SELECT * FROM Travailler ORDER BY travail_id ASC");
    $resultGetTravail = $cnx->query($requete);
    return $resultGetTravail;
}

function addOneOrganisation($organisation_id, $organisation_nom, $organisation_adresse, $organisation_tel, $organisation_site)
{
    $cnx = connexionBDD();


    $requete2 = $cnx->prepare("INSERT INTO Organisation(organisation_id,organisation_name,organisation_adresse,organisation_tel,organisation_site) VALUES('$organisation_id','$organisation_nom','$organisation_adresse','$organisation_tel','$organisation_site')");

    $result = $requete2->execute();
    return $result;
}

function addOneTravail($organisation_id, $etudiant_id, $profession, $annee_debut, $annee_fin)
{
    $cnx = connexionBDD();

    $requete1 = $cnx->prepare("INSERT INTO Travailler(organisation_id,etudiant_id,profession,annee_debut,annee_fin) VALUES('$organisation_id','$etudiant_id','$profession','$annee_debut','$annee_fin')");
    $result = $requete1->execute();
    return $result;
}
