<?php require_once("header.html");
?>

<form action="controllerEtudiant/getUpdate/<?= $data[0]['etudiant_id']; ?>/<?= $data[0]['organisation_id']; ?>" method="post">
    <center>
        <h2>Ajout d'un Étudiant</h2>
        <table>
            <tr>
                <td>Id de l'étudiant</td>
                <td><input type="text" name="étudiant_id" size="50" required value="<?= $data[0]['etudiant_id'] ?>"></td>
            </tr>
            <tr>
                <td>Nom de l'étudiant</td>
                <td><input type="text" name="étudiant_nom" size="50" required value="<?= $data[0]['etudiant_nom'] ?>"></td>
            </tr>

            <tr>
                <td>Prenom de l'étudiant</td>
                <td><input type="text" name="étudiant_prenom" size="50" required value="<?= $data[0]['etudiant_prenom']; ?>"></td>
            </tr>
            <tr>
                <td>Téléphone de l'étudiant</td>
                <td><input type="tel" pattern="^0[0-9]{9}" name="étudiant_tel" size="50" required value="<?= $data[0]['etudiant_telephone']; ?>"></td>
            </tr>
            <tr>
                <td>Email de l'étudiant</td>
                <td><input type="mail" pattern=".+@.+" name="étudiant_mail" size="50" required value="<?= $data[0]['etudiant_mail']; ?>"></td>
            </tr>
            <tr>
                <td>Promo de l'étudiant</td>
                <td><input type=" text" name="étudiant_promo" size="50" required value="<?= $data[0]['etudiant_promo']; ?>"></td>
            </tr>
            <td>Profession</td>
            <td><input type="text" name="profession" size="50" value="<?= $data[0]['profession']; ?>"></td>
            </tr>
            <tr>
                <td>Année Début de Profession</td>
                <td><input type="date" name="annee_debut" size="50" value="<?= $data[0]['annee_debut']; ?>"></td>
            </tr>
            <tr>
                <td>Année Fin de Profession</td>
                <td><input type="date" name="annee_fin" size="50" value="<?= $data[0]['annee_fin']; ?>"></td>
            </tr>
            <tr>
                <td>Organisation Id</td>
                <td><input type="text" name="organisation_id" size="50" value="<?= $data[0]['organisation_id'] ?>"></td>
            </tr>
            <tr>
                <td>Organisation</td>
                <td><input type="text" name="organisation_nom" size="50" value="<?= $data[0]['organisation_nom'] ?>"></td>
            </tr>
            <tr>
                <td>Adresse de l'Organisation</td>
                <td><input type="text" name="organisation_adresse" size="50" value="<?= $data[0]['organisation_adresse'] ?>"></td>
            </tr>
            <tr>
                <td>Téléphone de l'Organisation</td>
                <td><input type="tel" pattern="^0[0-9]{9}" name="organisation_tel" size="50" value="<?= $data[0]['organisation_tel'] ?>"></td>
            </tr>
            <tr>
                <td>Site de l'Organisation</td>
                <td><input type="text" name="site" size="50" value="<?= $data[0]['organisation_site'] ?>"></td>
            </tr>


            <tr>
                <td></td>
                <td><input type="reset" name="effacer" value="Effacer"><input type="submit" name="update" value="Mettre à jour"></td>
            </tr>

        </table>
    </center>
</form>