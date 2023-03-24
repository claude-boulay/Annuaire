<?php require_once("header.html");
require_once("models/model.php");
require_once("classe/etudiant.php");
require_once("classe/professeur.php"); ?>


<center>
    <br>
    <h2>Tous les étudiant aillant participer au BTS SIO</h2>
    <br>
    <table border="1">
        <tr>
            <th>Nom de l'étudiant</th>
            <th>Prénom de l'étudiant</th>
            <th>Téléphone de l'étudiant</th>
            <th>E-mail de l'étudiant</th>
            <th>Promo de l'étudiant</th>
            <th>Profession</th>
            <th>Durée de la Profession</th>
            <th>Nom de l'Organisation</th>
            <th>Adresse de l'Organisation</th>
            <th>Téléphone de l'Organisation</th>
            <th>Site de l'Organisation</th>
        </tr>
        <?php
        getAll();
        Etudiant::afficher();
        ?>
    </table>
    <br>
    <br>
    <h2>Tous les Professeurs du BTS SIO</h2>
    <br>
    <table border="1">
        <tr>
            <th>Nom des Professeurs</th>
            <th>Téléphone des Professeurs</th>
            <th>E-mail des Professeurs</th>
            <th>Matière du Professeurs</th>
        </tr>

        <?php Professeur::afficher(); ?>
    </table>
    <br>
    <br>

</center>
</form>