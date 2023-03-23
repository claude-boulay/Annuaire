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
    $requete = "SELECT * FROM Organisation ORDER BY organisation_id ASC";
    $resultGetOrg = $cnx->query($requete);
    return $resultGetOrg;
}

function getTravail()
{
    $cnx = connexionBDD();
    $requete = "SELECT * FROM Travailler ORDER BY travail_id ASC";
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

function getAll()
{
    $cnx = connexionBDD();
    $requete = "SELECT etudiant_id,etudiant_nom,etudiant_prenom,etudiant_telephone,etudiant_mail,etudiant_promo,travail_id,profession,(annee_fin -annee_debut) as temps_profession, organisation_id,organisation_name,organisation_adresse,organisation_tel, organisation_site FROM AncienEtudiant,Travailler,Organisation WHERE AncienEtudiant.etudiant_id=Travailler.etudiant_id AND Travailler.organisation_id=Organisation.organisation_id";
    $resultGetAll = $cnx->query($requete);
    $ligne = $resultGetAll->fetchAll(PDO::FETCH_NUM);

    foreach ($ligne as $valeur) {
        echo "<tr>";
        echo "<td>$valeur[1]</td>";
        echo "<td>$valeur[2]</td>";
        echo "<td>$valeur[3]</td>";
        echo "<td>$valeur[4]</td>";
        echo "<td>$valeur[5]</td>";
        echo "<td>$valeur[9]</td>";
        echo "<td>$valeur[10]</td>";
        //echo "<td>$valeur[11]</td>";

        echo "<td>$valeur[13]</td>";
        echo "<td>$valeur[14]</td>";
        echo "<td>$valeur[15]</td>";
        echo "<td>$valeur[16]</td>";
        echo "</tr>";
    }
}
