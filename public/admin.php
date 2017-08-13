<?php
use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::chargement();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'accueil';
}

// Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if(!$auth->estConnecte()){
    $app->forbidden();
}

ob_start();
if($page === 'accueil'){
    require ROOT . '/pages/admin/chapitres/index.php';
} elseif ($page === 'chapitres.edit'){
    require ROOT . '/pages/admin/chapitres/edit.php';
} elseif ($page === 'chapitres.add'){
    require ROOT . '/pages/admin/chapitres/add.php';
}elseif ($page === 'chapitres.delete'){
    require ROOT . '/pages/admin/chapitres/delete.php';
}elseif($page === 'statuts.index'){
    require ROOT . '/pages/admin/statuts/index.php';
} elseif ($page === 'statuts.edit'){
    require ROOT . '/pages/admin/statuts/edit.php';
} elseif ($page === 'statuts.add'){
    require ROOT . '/pages/admin/statuts/add.php';
}elseif ($page === 'statuts.delete'){
    require ROOT . '/pages/admin/statuts/delete.php';
}elseif ($page === 'connexion'){
    require ROOT . '/pages/admin/auteurs/connexion.php';
}
$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';
