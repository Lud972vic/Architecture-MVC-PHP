<?php

require_once('vendor/autoload.php');

// Le fichier de config
include_once('config.php');

// On appelle le modèle et le contrôleur principaux
require_once(ROOT . 'app/Model.php');
require_once(ROOT . 'app/Controller.php');

// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', $_GET['p']);

// Si au moins 1 paramètre existe
if ($params[0] != "") {
    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]);

    // On sauvegarde le 2ème paramètre dans $action s'il existe, sinon on met index (la page d'accueil)
    $action = isset($params[1]) ? $params[1] : 'index';

    // On appelle le contrôleur
    require_once(CONTROLLER . $controller . '.php');

    // On instancie le contrôleur, par exemple $articles = new Articles();
    $controller = new $controller();

    // Nous obtiendrons un booléen qui nous permettra de savoir si la méthode existe dans le contrôleur demandé
    if (method_exists($controller, $action)) {
        // On supprime les 2 premiers paramètres
        unset($params[0]);
        unset($params[1]);

        // On appelle la méthode $action du contrôleur $controller
        call_user_func_array([$controller, $action], $params);

        $bonjour = New Jur\Bonjour("Salut je suis la class Bonjour");
        echo($bonjour->getBonjour());
    } else {
        // On envoie le code réponse 404
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }
} else {

}
