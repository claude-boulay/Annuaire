<?php require_once("header.html") ?>

<form action="index.php?action=/controllerProfesseur/AddOneProfesseur" method="post">
    <center>
        <h2>Ajout d'un professeur</h2>
        <table>
            <tr>
                <td>Nom du professeur</td>
                <td><input type="text" name="prof_name" size="50" required></td>
            </tr>

            <tr>
                <td>Téléphone du professeur</td>
                <td><input type="tel" name="prof_tel" size="50" required></td>
            </tr>
            <tr>
                <td>Email du professeur</td>
                <td><input type="text" name="prof_mail" size="50" required></td>
            </tr>
            <tr>
                <td>Matière du Professeur</td>
                <td><input type="text" name="prof_matiere" size="50" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="reset" name="effacer" value="Effacer" required><input type="submit" name="enregistrer" value="enregistrer"></td>
            </tr>
        </table>
    </center>
</form>