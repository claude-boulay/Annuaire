<?php
//définir le chemin du dossier dans ROOT
define('ROOT', str_replace("index.php", '', $_SERVER['SCRIPT_FILENAME']));
define('WEBROOT', str_replace("index.php", '', $_SERVER['SCRIPT_NAME']));
error_reporting(-1); // Pour le développement parti production, il faut le mettre à 0//
ini_set("display_errors", 1); // "" "" "" ""  ""  ""  ""  ""   ""  ""  ""  ""  ""    //
$identified = false;
require_once(ROOT . "./models/model.php");
require_once(ROOT . "./controllers/controller.php");
//exploxe la chaîne de caractère pour récup l'url converti par htaccess
if ($_GET['action']) {
    $params = explode("/", $_GET['action']);
    /*echo "Paramètre 1 = " . $params[0];
    echo "<br>";
    echo "Paramètre 2 = " . $params[1];
    echo "<br>";
    echo "Paramètre 3 = " . $params[2];
    echo "<br>";*/
    if ($params[0] != "") {
        $controller = $params[0];

        $action = "";
        if (isset($params[1])) {
            $action = $params[1];
        }
        require_once(ROOT . 'controllers/' . $controller . '.php');

        if (function_exists($action)) {
            if (isset($params[2]) && isset($params[3])) {
                $action($params[2], $params[3]);
            } elseif (isset($params[2])) {
                $action($params[2]);
            } else {
                $action();
            }
        } elseif (!isset($_COOKIE['identificationl'])) {

            require_once("views/viewIdentification.php");
        } else {
            require("header.html");
        }
    }
} elseif (!isset($_COOKIE['identification'])) {

    require_once("views/viewIdentification.php");
} else {
    require("header.html");
}
