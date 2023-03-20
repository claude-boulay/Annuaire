<?php
//définir le chemin du dossier dans ROOT
define('ROOT', str_replace("index.php", '', $_SERVER['SCRIPT_FILENAME']));
define('WEBROOT', str_replace("index.php", '', $_SERVER['SCRIPT_NAME']));

require_once(ROOT . "./models/model.php");
require_once(ROOT . "./controllers/controller.php");
//exploxe la chaîne de caractère pour récup l'url converti par htaccess
$params = explode("/", $_GET["p"]);
//récupérer de l'url  le controller 
if ($params[0] != "") {
    $controller = $params[0];
    //récupération de l'action (méthode à appliquer)
    if (isset($params[1])) {
        $action = $params[1];
    } else {
        $action = "index";
    }


    //appel du controller voulue

    require_once(ROOT . 'controllers/' . $controller . '.php');

    if (function_exists($action)) {
        if (isset($params[2]) && isset($params[3])) {
            $action($params[2], $params[3]);
        } elseif (isset($params[2])) {
            $action($params[2]);
        } else {
            $action();
        }
    } else {
    }
} else {
    require_once("./header.html");
}
