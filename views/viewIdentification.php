<!doctype html>
<html lang="fr">

<head>
    <base href="/~claude.boulay/www/annuaire/">
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
        <br>
        <center>
            <div>
                <form action="index.php?action=controller/identification" method="post">
                    <tr>
                        <td><label for="identifiant">Identifiant</label></td>
                        <td><input type="text" name="identifiant" id="identifiant"></td>
                    </tr><br><br>
                    <tr>
                        <td><label for="mdp">Mot de Passe</label>
                        <td>
                        <td><input type="password" name="mdp" id="mdp">
                        <td>
                    </tr><br><br>
                    <input type="submit" name="identifier" value="identifier">

                </form>
            </div>
        </center>
    </section>
</body>

</html>