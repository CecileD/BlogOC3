<?php
/**
 * Lance l'autoloader qui permettra le chargment des classes utiles
 */
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::chargement();

/**
 * Gére le routage vers le contrôleur en fonction de l'URL appelée dans le navigateur
 */

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'chapitres.index';
}
//La syntaxe des pages est de type index.php?p=dossier[0].classe[1].vue[2]
$page = explode('.', $page);
if($page[0] == 'admin'){ //si la page demandée commence par admin
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller'; //Les contrôleurs sont à trouver dans le dossier Admin, syntaxe ClasseController
    $action = $page[2]; //La méthode à appeler dans le fichier contrôleur est celle du nom de la vue
} else{
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}
$controller = new $controller();
$controller->$action();