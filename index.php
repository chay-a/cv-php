<?php
session_start();
$secureParameter = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_ENCODED);
$pageAffichage = '';
$routes = array(
    NULL => 'pages/accueil.php',
    'hobby' => 'pages/hobby.php',
    'contact' => 'pages/contact.php',
);
$metaTitles = array(
    NULL => 'Accueil',
    'hobby' => 'Hobbies',
    'contact' => 'Contact',
);
$metaDescriptions = array(
    NULL => 'CV en ligne de Auriane Chay avec ses compétences',
    'hobby' => 'Découvrez les hobbies d\'Auriane Chay',
    'contact' => 'Contactez Auriane Chay pour bénéficier de ses compétences.',
);


if (!isset($_SESSION['dateFirstVisit'])) {
    $date =date('Y-m-d H:i:s');
    $_SESSION['dateFirstVisit'] = $date;
}

if (!isset($_SESSION['countViewPage'])) {
    $_SESSION['countViewPage'] = 0;
}

$key = Recherche_Page($routes, $secureParameter, $metaTitles, $metaDescriptions);
if ($key !== false) {
    $metaTitre = $metaTitles[$key];
    $metaDescription = $metaDescriptions[$key];
    $pageAffichage = $routes[$key];
} else {
    $metaTitre = 'Page non trouvée';
    $metaDescription = 'Désoléee, page non trouvée';
    $pageAffichage = 'pages/404.php';
}

require 'header.php';
require $pageAffichage;
require 'footer.php';

function Recherche_Page ($routes, $secureParameter, $metaTitles, $metaDescriptions) {
    foreach ($routes as $key => $value) {
        if ($key == $secureParameter) {
            $_SESSION['countViewPage']++;
            return $key;
        }
    }
    return false;
}