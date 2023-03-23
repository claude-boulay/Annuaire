<?php
require_once("models/model.php");

class Travail
{
    public function __construct()
    {
    }

    public static function afficher()
    {
        $ligne = getTravail();
        echo "<tr>";
        foreach ($ligne as $valeur) {
            echo "<td>$valeur[3]</td>";
            echo "<td>$valeur[5]-$valeur[4]</td>";
            echo "</tr>";
        }
    }
}
