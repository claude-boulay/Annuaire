<?php require_once("header.html"); ?>
<center>
    <div>
        <h3>Création d'un administrateur</h3>
    </div><br>
    <form action="index.php?action=controller/createAdmin" method="post">
        <table>
            <tr>
                <td>Identifiant de l'utilisateur</td>
                <td><input type="test" name="identifiant"></td>
            </tr>
            <tr>
                <td>Mot de Passe pour l'utilisateur</td>
                <td><input type="password" name="mdp"></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>

                <td><input type="submit" name="cree" value="Créer"></td>
            </tr>
        </table>
    </form>
</center>