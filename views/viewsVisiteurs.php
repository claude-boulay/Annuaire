<?php
require_once("models/model.php");
require_once("classe/etudiant.php");
require_once("classe/professeur.php"); ?>

<!doctype html>
<html lang="fr">

<head>
    <base href="/~claude.boulay/projet/Annuaire/">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="./img/favicon.png" type="image/png">
    <title>Annuaire des classe de BTS SIO</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/vendors/linericon/style.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="./assets/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="./assets/vendors/animate-css/animate.css">
    <link rel="stylesheet" href="./assets/vendors/popup/magnific-popup.css">
    <!-- main css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
</head>

<body>

    <!--================Header Menu Area =================-->
    <header class="header_area">

        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="">Accueil</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="views/viewIdentification.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Connexion
                                </a>
                        </ul>
                        </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Annuaire des classes de BTS SIO</h2>


                </div>
            </div>
        </div>
    </section>


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
                <th>Date de début de Profession</th>
                <th>Date de fin de Profession</th>
                <th>Durée de la Profession (en jours)</th>
                <th>Nom de l'Organisation</th>
                <th>Adresse de l'Organisation</th>
                <th>Téléphone de l'Organisation</th>
                <th>Site de l'Organisation</th>

            </tr>
            <?php
            getAlls2();
            Etudiant::afficher2();
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