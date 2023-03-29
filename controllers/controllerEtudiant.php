<?php
require_once("classe/etudiant.php");

require_once("models/model.php");

function addOneEtudiant()
{
    try {
        if (isset($_POST["enregistrer"])) {
            $id = $_POST["étudiant_id"];
            $nom = $_POST["étudiant_nom"];
            $prenom = $_POST["étudiant_prenom"];
            $telephone = $_POST["étudiant_tel"];
            $mail = $_POST["étudiant_mail"];
            $promo = $_POST["étudiant_promo"];
            $id_org = $_POST["organisation_id"];
            $travail = $_POST["travail"];
            //création d'un étudiant
            $etudiant = new Etudiant($id, $nom, $prenom, $telephone, $mail, $promo, $travail);
            //fonction qui execute une requete sql pour intégrer le données dans la table Ancient Etudiant
            $etudiant->enregistrer();

            if ($travail == 1) {

                $profession = $_POST["profession"];
                $annee_debut = $_POST["annee_debut"];
                $annee_fin = $_POST["annee_fin"];
                $organisation_nom = $_POST["organisation_nom"];
                $organisation_adresse = $_POST["organisation_adresse"];
                $organisation_tel = $_POST["organisation_tel"];
                $organisation_site = $_POST["site"];


                try {
                    //appel de la fonction pour ajouter une organisation
                    addOneOrganisation(
                        $id_org,
                        $organisation_nom,
                        $organisation_adresse,
                        $organisation_tel,
                        $organisation_site
                    );
                } catch (Exception $e) {
                    require_once("views/viewEtudiant.php");
                    echo "<center><h2>L'id de l'Organisation ou le nom ne correspond pas au critère<h2>";
                }

                try {
                    addOneTravail($id_org, $id, $profession, $annee_debut, $annee_fin);
                } catch (Exception $e) {
                    require_once("views/viewEtudiant.php");
                    echo "<center><h2>Le champ Travail n'a pas été rempli correctement</h2></center>";
                }
            }
        }
        require_once("views/viewEtudiant.php");
    } catch (Exception $e) {
        require_once("views/viewEtudiant.php");

        echo " <center><h2>Le champ étudiant à été mal rempli vérifié que l'id n'est pas déjà utilisé</h2></center><br><br>";
    }
}
//fonction pour mettre a jour un etudiant qui a déjà un travail
function getUpdate($etudiant_id, $organisation_id)
{
    $data = getAll($etudiant_id, $organisation_id);

    if (!$data) {
        echo "Aucun étudiant pour cette id";
    } else {
        require_once('views/viewAllUpdate.php');
    }

    if (isset($_POST["update"])) {
        $id = $_POST["étudiant_id"];
        $nom = $_POST["étudiant_nom"];
        $prenom = $_POST["étudiant_prenom"];
        $telephone = $_POST["étudiant_tel"];
        $mail = $_POST["étudiant_mail"];
        $promo = $_POST["étudiant_promo"];
        $id_org = $_POST["organisation_id"];
        if (isset($_POST["profession"])) {
            $travail = 1;
        } else {
            $travail = 0;
        }

        //création d'un étudiant
        $etudiant = new Etudiant($id, $nom, $prenom, $telephone, $mail, $promo, $travail);
        $etudiant->Update();
        if ((isset($_POST["update"]))) {

            $profession = $_POST["profession"];
            $annee_debut = $_POST["annee_debut"];
            $annee_fin = $_POST["annee_fin"];
            $organisation_nom = $_POST["organisation_nom"];
            $organisation_adresse = $_POST["organisation_adresse"];
            $organisation_tel = $_POST["organisation_tel"];
            $organisation_site = $_POST["site"];
            // si la profession est la même alors ces une mise a jour sinon on crée une nouvelle organisation et travail
            if ($_POST["profession"] == $data["profession"]) {
                try {
                    //appel de la fonction pour mettre à jour une organisation
                    UpdateOneOrganisation(
                        $id_org,
                        $organisation_nom,
                        $organisation_adresse,
                        $organisation_tel,
                        $organisation_site
                    );
                } catch (Exception $e) {
                    require_once("views/viewAllUpdate.php");
                    echo "<center><h2>L'id de l'Organisation ou le nom ne correspond pas au critère<h2>";
                }

                try {
                    //appel de la fonction pour mettre à jour le travail correspondant à l'organisation et au travail précédant
                    UpdateOneTravail($id_org, $id, $profession, $annee_debut, $annee_fin);
                } catch (Exception $e) {
                    require_once("views/viewAllUpdate.php");
                    echo "<center><h2>Le champ Travail n'a pas été rempli correctement</h2></center>";
                }
            } else {
                try {
                    //appel de la fonction pour ajouter une organisation
                    addOneOrganisation(
                        $id_org,
                        $organisation_nom,
                        $organisation_adresse,
                        $organisation_tel,
                        $organisation_site
                    );
                } catch (Exception $e) {
                    require_once("views/viewEtudiantUpdate.php");
                    echo "<center><h2>L'id de l'Organisation ou le nom ne correspond pas au critère<h2>";
                }

                try {
                    //ajout d'un travail pour l'étudiant modifié
                    addOneTravail($id_org, $id, $profession, $annee_debut, $annee_fin);
                } catch (Exception $e) {
                    require_once("views/viewEtudiantUpdate.php");
                    echo "<center><h2>Le champ Travail n'a pas été rempli correctement</h2></center>";
                }
            }
        } else {
            echo "Tous les champs sont requis";
        }
    }
}

// fonction pour mettre a jour un etudiant sans travail et potentiellement lui en rajouter un
function getEtudiantUpdate($etudiant_id)
{
    $data = getEtudiant($etudiant_id);

    if (!$data) {
        echo "Aucun étudiant pour cette id";
    } else {
        require_once('views/viewEtudiantUpdate.php');
    }

    if (isset($_POST["update"])) {
        $id = $_POST["étudiant_id"];
        $nom = $_POST["étudiant_nom"];
        $prenom = $_POST["étudiant_prenom"];
        $telephone = $_POST["étudiant_tel"];
        $mail = $_POST["étudiant_mail"];
        $promo = $_POST["étudiant_promo"];
        $id_org = $_POST["organisation_id"];
        if (isset($_POST["profession"])) {
            $travail = 1;
        } else {
            $travail = 0;
        }

        //création d'un étudiant
        $etudiant = new Etudiant($id, $nom, $prenom, $telephone, $mail, $promo, $travail);
        //La fonction Update mets à jours les données de cet étudiant
        $etudiant->Update();
        if ((isset($_POST["update"]))) {

            $profession = $_POST["profession"];
            $annee_debut = $_POST["annee_debut"];
            $annee_fin = $_POST["annee_fin"];
            $organisation_nom = $_POST["organisation_nom"];
            $organisation_adresse = $_POST["organisation_adresse"];
            $organisation_tel = $_POST["organisation_tel"];
            $organisation_site = $_POST["site"];


            try {
                //appel de la fonction pour ajouter une organisation
                addOneOrganisation(
                    $id_org,
                    $organisation_nom,
                    $organisation_adresse,
                    $organisation_tel,
                    $organisation_site
                );
            } catch (Exception $e) {
                require_once("views/viewEtudiantUpdate.php");
                echo "<center><h2>L'id de l'Organisation ou le nom ne correspond pas au critère<h2>";
            }

            try {
                //ajout d'un travail pour l'étudiant modifié
                addOneTravail($id_org, $id, $profession, $annee_debut, $annee_fin);
            } catch (Exception $e) {
                require_once("views/viewEtudiantUpdate.php");
                echo "<center><h2>Le champ Travail n'a pas été rempli correctement</h2></center>";
            }
        }
    }
}
