<?php
require_once("models/model.php");


function afficherAll()
{
    require_once("views/viewAll.php");
}

function identification()
{
    $identifiant = $_POST["identifiant"];
    $mdp = getMDP($identifiant);
    $mdpTest = $_POST["mdp"];
    $vérif = password_verify($mdpTest, $mdp[0]["MDP"]);



    if ($vérif == true) {
        require_once("header.html");
        setcookie('identification', "$mdpTest", time() + 900, '/', '', true, true);
        echo "<center>";
        echo "identification réussi";
        echo "</center>";
    } else {
        require_once("views/viewIdentification.php");
        echo "<br><center><h2>";
        echo "Mot de passe ou identifiant incorrect";
        echo "</h2></center>";
    }
}

function connexion()
{
    require_once("../views/viewsIdentification.php");
}

function createAdmin()
{
    if (isset($_POST["cree"])) {
        $identifiant = $_POST["identifiant"];
        $option = ["id" => 15];
        $mdp = password_hash($_POST["mdp"], CRYPT_BLOWFISH, $option);
        try {
            insertAdmin($identifiant, $mdp);
            echo "<br><center><h2>Utilisateur créer</h2></center>";
        } catch (Exception $e) {
            echo $e . "<br><center><h2>La création à échouer</h2></center>";
        }
    }
    require_once("views/viewCreateUser.php");
}
