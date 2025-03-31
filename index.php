<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controller\IndexController;
use App\Controller\AdminController;

$isLoggedIn = true;

// Récupérer les paramètres de l'URL
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

$indexController = new IndexController();
$adminController = new AdminController();
// $securityController = new SecurityController();


if ($action === 'detail_element' && !is_null($id)) {

    // echo ("page détail élément");
    $indexController->detailElement($id);

} elseif ($action === 'detail_element_admin' && !is_null($id)) {

    // echo ("page détail élément administrateur");
    $adminController->detailElementAdmin($id);

} elseif ($action === 'login') {

    echo ("page conexion");
    // $securityController->login();

} elseif ($action === 'register') {

    echo ("page s'enregistrer");
    // $securityController->register();

} elseif ($action === 'logout' && $isLoggedIn) {

    echo ("page HomePage suite au logout");
    // $securityController->logout();

} elseif ($action === 'admin' && $isLoggedIn) {

    $adminController->dashboardAdmin();

} elseif ($action === 'add' && $isLoggedIn) {

    // echo ("page d'ajout d'un élément");
    $adminController->addElement();

} elseif ($action === 'edit_element' && !is_null($id) && $isLoggedIn && $id > 119) {

    echo ("page de modification d'un elément uniquement si l'id (id corespond au atomic-number en bdd pour les 118 premiers éléments) est supérieur à 118");
    $adminController->editElement($id);

} elseif ($action === 'delete_element' && !is_null($id) && $isLoggedIn) {

    echo ("page de supression d'un elément uniquement si l'id (id corespond au atomic-number en bdd pour les 118 premiers éléments) est supérieur à 118 (le refaire corectement avec une nouvelle colone bdd plus tard)");
    $adminController->deleteElement($id);

} elseif ($action === 'search_element' && !is_null($id)) {

    echo ("homepage avec résultat de recherche afiché");
    // $indexController->detailElement($id);

} elseif ($action === 'user_profil' && !is_null($id) && $isLoggedIn) {

    echo ("page de d'affichage d'un user avec les boutons pour suprimer ou modifier le user");
    // $adminController->profil($id);

} elseif ($action === 'edit_user' && !is_null($id) && $isLoggedIn) {

    echo ("page de modification d'un user");
    // $adminController->deleteUser($id);

} elseif ($action === 'delete_user' && !is_null($id) && $isLoggedIn && $id > 1) {

    echo ("page de supression d'un user uniquement si l'id est supérieur à 1(ce qui corespondrai au superadmin)(le refaire corectement avec un role plus tard)");
    // $adminController->deleteUser($id);

} else {

    $indexController->homePage();
}
