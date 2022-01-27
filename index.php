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

//
if (!isset($_SESSION['dateFirstVisit'])) {
    $date =date('Y-m-d H:i:s');
    $_SESSION['dateFirstVisit'] = $date;
}

if (!isset($_SESSION['countViewPage'])) {
    $_SESSION['countViewPage'] = 1;
}

if (!isset($_SESSION['page'])) {
    $_SESSION['page'] ="";
}

if (isset($routes[$secureParameter])){
    $metaTitre = $metaTitles[$secureParameter];
    $metaDescription = $metaDescriptions[$secureParameter];
    $pageAffichage = $routes[$secureParameter];
    if ($secureParameter != $_SESSION['page']) {
        $_SESSION['countViewPage']++;
    }
    $_SESSION['page'] = $secureParameter;
} else {
    $metaTitre = 'Page non trouvée';
    $metaDescription = 'Désoléee, page non trouvée';
    $pageAffichage = 'pages/404.php';
}

require 'header.php';
require $pageAffichage;
require 'footer.php';