<?php require_once("../header.html"); ?>

<form action="controllers/controllerEtudiant.php" method="post">
    <center>
        <h2>Ajout d'un Étudiant</h2>
        <table>
            <tr>
                <td>Nom de l'étudiant</td>
                <td><input type="text" name="étudiant_nom" size="50"></td>
            </tr>

            <tr>
                <td>Prenom de l'étudiant</td>
                <td><input type="text" name="étudiant_prenom" size="50"></td>
            </tr>
            <tr>
                <td>Téléphone de l'étudiant</td>
                <td><input type="tel" name="étudiant_tel" size="50"></td>
            </tr>
            <tr>
                <td>Email de l'étudiant</td>
                <td><input type="text" name="étudiant_mail" size="50"></td>
            </tr>
            <tr>
                <td>Promo de l'étudiant</td>
                <td><input type="text" name="étudiant_promo" size="50"></td>
            </tr>
            <tr>
                <td>Profession</td>
                <td><input type="text" name="profession" size="50"></td>
            </tr>
            <tr>
                <td>Année Début de Profession</td>
                <td><input type="date" name="annee_debut" size="50"></td>
            </tr>
            <tr>
                <td>Année Fin de Profession</td>
                <td><input type="text" name="annee_fin" size="50"></td>
            </tr>
            <tr>
                <td>Organisation</td>
                <td><input type="text" name="organisation_nom" size="50"></td>
            </tr>
            <tr>
                <td>Adresse de l'Organisation</td>
                <td><input type="text" name="organisation_addresse" size="50"></td>
            </tr>
            <tr>
                <td>téléphone de l'Organisation</td>
                <td><input type="text" name="organisation_tel" size="50"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="reset" name="effacer" value="Effacer"><input type="submit" name="enregistrer" value="Enregistrer"></td>
            </tr>
        </table>
    </center>
