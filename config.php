<?php
// Parametre de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'bdd_mvc');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

// On génère une constante contenant le chemin vers la racine publique du projet, par exemple D:/laragon_jur/www/mvc/
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define('MODEL', ROOT . 'models/');
define('CONTROLLER', ROOT . 'controllers/');
define('VIEW', ROOT . 'views/');
