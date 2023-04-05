<?php require_once("header.html");
?>

<form action="index.php?action=controllerEtudiant/getEtudiantUpdate/<?= $data['etudiant_id']; ?>" method=" post">
    <center>
        <h2>Ajout d'un Étudiant</h2>
        <table>

            <tr>
                <td>Nom de l'étudiant</td>
                <td><input type="text" name="étudiant_nom" size="50" required value="<?= $data['etudiant_nom'] ?>"></td>
            </tr>

            <tr>
                <td>Prenom de l'étudiant</td>
                <td><input type="text" name="étudiant_prenom" size="50" required value="<?= $data['etudiant_prenom']; ?>"></td>
            </tr>
            <tr>
                <td>Téléphone de l'étudiant</td>
                <td><input type="tel" name="étudiant_tel" pattern="^0[0-9]{9}" size="50" required value="<?= $data['etudiant_telephone']; ?>"></td>
            </tr>
            <tr>
                <td>Email de l'étudiant</td>
                <td><input type="mail" pattern=".+@.+" name="étudiant_mail" size="50" required value="<?= $data['etudiant_mail']; ?>"></td>
            </tr>
            <tr>
                <td>Promo de l'étudiant</td>
                <td><input type=" text" name="étudiant_promo" size="50" required value="<?= $data['etudiant_promo']; ?>"></td>
            </tr>
            <td>Profession</td>
            <td><input type="text" name="profession" size="50"></td>
            </tr>
            <tr>
                <td>Année Début de Profession</td>
                <td><input type="date" name="annee_debut" size="50"></td>
            </tr>
            <tr>
                <td>Année Fin de Profession</td>
                <td><input type="date" name="annee_fin" size="50"></td>
            </tr>
            <tr>
                <td>Organisation Id</td>
                <td><input type="text" name="organisation_id" size="50"></td>
            </tr>

            <tr>
                <td>Adresse de l'Organisation</td>
                <td><input type="text" name="organisation_adresse" size="50"></td>
            </tr>
            <tr>
                <td>Téléphone de l'Organisation</td>
                <td><input type="tel" pattern="^0[0-9]{9}" name="organisation_tel" size="50"></td>
            </tr>
            <tr>
                <td>Site de l'Organisation</td>
                <td><input type="text" name="site" size="50"></td>
            </tr>


            <tr>
                <td></td>
                <td><input type="reset" name="effacer" value="Effacer"><input type="submit" name="update" value="Mettre à jour"></td>
            </tr>

        </table>
    </center>
</form>