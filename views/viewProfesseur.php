<?php require_once("../header.html") ?>

<form action="controllers/controllerProfesseur.php" method="post">
    <center>
        <h2>Ajout d'un professeur</h2>
        <table>
            <tr>
                <td>Nom du professeur</td>
                <td><input type="text" name="prof_nom" size="50"></td>
            </tr>

            <tr>
                <td>Prenom du professeur</td>
                <td><input type="text" name="prof_prenom" size="50"></td>
            </tr>
            <tr>
                <td>Téléphone du professeur</td>
                <td><input type="tel" name="prof_tel" size="50"></td>
            </tr>
            <tr>
                <td>Email du professeur</td>
                <td><input type="text" name="prof_mail" size="50"></td>
            </tr>
            <tr>
                <td>Matière du Professeur</td>
                <td><input type="text" name="prof_matiere" size="50"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="reset" name="effacer" value="Effacer"><input type="submit" name="enregistrer" value="Enregistrer"></td>
            </tr>
        </table>
    </center>
