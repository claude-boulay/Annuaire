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

    if ($mdp == $mdpTest) {
        require_once("header.html");
        setcookie('identification', "$identifiant", time() + 900, '/', '', true, true);
        echo "<center>";
        echo "identification réussi";
        echo "</center>";
    } else {
        echo "<center><h2>";
        echo "Mot de passe incorrect";
        echo "</h2></center>";
    }
}
