<?php
require __DIR__ . '/vendor/autoload.php';




// Démarrer la session et vérification de la connexion user 
// session_start();
// if(isset($_SESSION["username"])){
//     $isLoggedIn = true;
// }else{
//     $isLoggedIn = false; 
// }

// Récupérer les paramètres de l'URL et créer des valeurs par défaut
if (isset($_GET['action'])) {

    $action = $_GET['action'];
    
} else {
		
    $action = 'homePage';
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    $id = null;
}

// Gérer les routes avec une suite de conditions if

//index.php?action=detail&id=12
if ($action === 'homePage') {

    $indexController->detailCar($id);

//index.php?action=login
} elseif ($action === 'detail' && !is_null($id)) {

    $indexController->detailCar($id);

//index.php?action=login
} elseif ($action === 'login') {

    $securityController->login();

//index.php?action=register
} elseif ($action === 'register') {

    $securityController->register();

//index.php?action=logout + Connecté
} elseif ($action === 'logout' && $isLoggedIn) {
    
    $securityController->logout();

//index.php?action=logout + Connecté
}elseif ($action === 'admin' && $isLoggedIn) {

    $adminController->dashboardAdmin();

//index.php?action=add + Connecté
} elseif ($action === 'add' && $isLoggedIn) {

    $adminController->addCar();
    
//index.php?action=edit&id=10 + Connecté
} elseif ($action === 'edit' && !is_null($id) && $isLoggedIn) {

    $adminController->editCar($id);

//index.php?action=delete&id=10 + Connecté
} elseif ($action === 'delete' && !is_null($id) && $isLoggedIn) {

    $adminController->deleteCar($id);

//Sinon aucune route correspond -> page d'accueil par défaut + Clean url
} else {

    header("Location: index.php");

}