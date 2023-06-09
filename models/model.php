<?php
function connexionBDD()
{
    // données pouvant changer selon l'hote du site
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

function getEtudiants()
{
    $cnx = connexionBDD();
    $requete = "SELECT AncienEtudiant.etudiant_id,etudiant_nom,etudiant_prenom,etudiant_telephone,etudiant_mail,etudiant_promo FROM AncienEtudiant WHERE etudiant_travail IS false ORDER BY etudiant_Id ASC";
    $resultGetEtudiant = $cnx->query($requete);
    return $resultGetEtudiant;
}

function getEtudiant($etudiant_id)
{
    $cnx = connexionBDD();
    $requete = "SELECT AncienEtudiant.etudiant_id,etudiant_nom,etudiant_prenom,etudiant_telephone,etudiant_mail,etudiant_promo FROM AncienEtudiant WHERE AncienEtudiant.etudiant_travail IS false AND etudiant_id=$etudiant_id ORDER BY etudiant_Id ASC";
    $result = $cnx->query($requete);
    $data = $result->fetch(PDO::FETCH_ASSOC);

    return $data;
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

function addOneOrganisation($organisation_nom, $organisation_adresse, $organisation_tel, $organisation_site)
{
    $cnx = connexionBDD();


    $requete2 = $cnx->prepare("INSERT INTO Organisation(organisation_nom,organisation_adresse,organisation_tel,organisation_site) VALUES('$organisation_nom','$organisation_adresse','$organisation_tel','$organisation_site')");

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

function addOneTravail2($organisation_id, $etudiant_id, $profession, $annee_debut)
{
    $cnx = connexionBDD();

    $requete1 = $cnx->prepare("INSERT INTO Travailler(organisation_id,etudiant_id,profession,annee_debut) VALUES('$organisation_id','$etudiant_id','$profession','$annee_debut')");
    $result = $requete1->execute();
    return $result;
}

function getAlls()
{
    $cnx = connexionBDD();
    $requete = "SELECT  AncienEtudiant.etudiant_id,etudiant_nom,etudiant_prenom,etudiant_telephone,etudiant_mail,etudiant_promo,travail_id,profession,annee_fin,annee_debut, Organisation.organisation_id,organisation_nom,organisation_adresse,organisation_tel, organisation_site FROM AncienEtudiant,Travailler,Organisation 
    WHERE AncienEtudiant.etudiant_id=Travailler.etudiant_id AND Travailler.organisation_id=Organisation.organisation_id ORDER BY annee_fin DESC";
    $resultGetAll = $cnx->query($requete);
    $ligne = $resultGetAll->fetchAll(PDO::FETCH_NUM);

    foreach ($ligne as $valeur) {
        echo "<tr>";
        echo "<td>$valeur[1]</td>";
        echo "<td>$valeur[2]</td>";
        echo "<td>$valeur[3]</td>";
        echo "<td>$valeur[4]</td>";
        echo "<td>$valeur[5]</td>";
        echo "<td>$valeur[7]</td>";
        echo "<td>$valeur[9]</td>";
        echo "<td>$valeur[8] </td>";

        $date2 = new DateTime("$valeur[9] 00:00:00");
        if ($valeur[8] != null) {
            $date1 = new DateTime("$valeur[8] 00:00:00");
        } else {
            $now = time();
            $date1 = new DateTime(date("Y/m/d H:i:s", $now));
        }
        $test = date_diff($date2, $date1);
        echo "<td>" . $test->days . "</td>";
        echo "<td>$valeur[11]</td>";

        echo "<td>$valeur[12]</td>";
        echo "<td>$valeur[13]</td>";
        echo "<td>$valeur[14]</td>";
        echo "<td><a href=controllerEtudiant/getUpdate/$valeur[0]/$valeur[10] >Modifier</a></td>";

        echo "</tr>";
    }
}

function getAlls2()
{
    $cnx = connexionBDD();
    $requete = "SELECT  AncienEtudiant.etudiant_id,etudiant_nom,etudiant_prenom,etudiant_telephone,etudiant_mail,etudiant_promo,travail_id,profession,annee_debut,annee_fin, Organisation.organisation_id,organisation_nom,organisation_adresse,organisation_tel, organisation_site FROM AncienEtudiant,Travailler,Organisation 
    WHERE AncienEtudiant.etudiant_id=Travailler.etudiant_id AND Travailler.organisation_id=Organisation.organisation_id ORDER BY annee_fin DESC";
    $resultGetAll = $cnx->query($requete);
    $ligne = $resultGetAll->fetchAll(PDO::FETCH_NUM);

    foreach ($ligne as $valeur) {
        echo "<tr>";
        echo "<td>$valeur[1]</td>";
        echo "<td>$valeur[2]</td>";
        echo "<td>$valeur[3]</td>";
        echo "<td>$valeur[4]</td>";
        echo "<td>$valeur[5]</td>";
        echo "<td>$valeur[7]</td>";
        echo "<td>$valeur[8]</td>";
        echo "<td>$valeur[9]</td>";
        $date2 = new DateTime("$valeur[8] 00:00:00");
        if ($valeur[9] != null) {
            $date1 = new DateTime("$valeur[9] 00:00:00");
        } else {
            $now = time();
            $date1 = new DateTime(date("Y/m/d H:i:s", $now));
        }
        $test = date_diff($date2, $date1);
        echo "<td>" . $test->days . "</td>";
        echo "<td>$valeur[11]</td>";

        echo "<td>$valeur[12]</td>";
        echo "<td>$valeur[13]</td>";
        echo "<td>$valeur[14]</td>";


        echo "</tr>";
    }
}



// function pour récupérer les données nécéssairres pour l'update
function getAll($etudiant_id, $organisation_id)
{
    $cnx = connexionBDD();
    $requete = "SELECT  AncienEtudiant.etudiant_id,etudiant_nom,etudiant_prenom,etudiant_telephone,etudiant_mail,etudiant_promo,etudiant_travail,profession,annee_debut,annee_fin, Organisation.organisation_id,organisation_nom,organisation_adresse,organisation_tel, organisation_site FROM AncienEtudiant,Travailler,Organisation 
    WHERE AncienEtudiant.etudiant_id=Travailler.etudiant_id AND Travailler.organisation_id=Organisation.organisation_id AND AncienEtudiant.etudiant_id=$etudiant_id AND Organisation.organisation_id=$organisation_id";
    $resultGetAll = $cnx->query($requete);

    $data = $resultGetAll->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}


//fonction pour update une organisation
function UpdateOneOrganisation($organisation_id, $organisation_nom, $organisation_adresse, $organisation_tel, $organisation_site)
{
    $cnx = connexionBDD();


    $requete2 = $cnx->prepare("UPDATE Organisation SET organisation_nom='$organisation_nom',organisation_adresse='$organisation_adresse',organisation_tel='$organisation_tel',organisation_site='$organisation_site' WHERE Organisation.organisation_id=$organisation_id");

    $result = $requete2->execute();
    return $result;
}
//fonction pour update un travail
function UpdateOneTravail($organisation_id, $etudiant_id, $profession, $annee_debut, $annee_fin)
{
    $cnx = connexionBDD();

    $requete1 = $cnx->prepare("UPDATE Travailler SET profession='$profession',annee_debut='$annee_debut',annee_fin='$annee_fin' WHERE  Travailler.organisation_id=$organisation_id AND Travailler.etudiant_id=$etudiant_id");
    $result = $requete1->execute();
    return $result;
}

function UpdateOneTravail2($organisation_id, $etudiant_id, $profession, $annee_debut)
{
    $cnx = connexionBDD();

    $requete1 = $cnx->prepare("UPDATE Travailler SET profession='$profession',annee_debut='$annee_debut' WHERE  Travailler.organisation_id=$organisation_id AND Travailler.etudiant_id=$etudiant_id");
    $result = $requete1->execute();
    return $result;
}



function getMDP($identifiant)
{
    $cnx = connexionBDD();
    $requete = "SELECT MDP FROM Connexion WHERE Identifiant='$identifiant'";
    $result = $cnx->query($requete);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function getIdEtudiant($nom_etudiant)
{
    $cnx = connexionBDD();
    $requete = "SELECT etudiant_id FROM AncienEtudiant WHERE etudiant_nom='$nom_etudiant'";
    $result = $cnx->query($requete);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function getIdOrganisation($nom_organisation)
{
    $cnx = connexionBDD();
    $requete = "SELECT organisation_id FROM Organisation WHERE organisation_nom='$nom_organisation'";
    $result = $cnx->query($requete);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}


//création d'un nouvelle utilisateur

function insertAdmin($identifiant, $mdp)
{
    $cnx = connexionBDD();
    $requete = $cnx->prepare("INSERT INTO Connexion(Identifiant,MDP) VALUES('$identifiant','$mdp')");
    $result = $requete->execute();
    return $result;
}
