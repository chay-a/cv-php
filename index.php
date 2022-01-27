<?php
session_start();
$queryPage = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_ENCODED);
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

if (isset($routes[$queryPage])){
    $metaTitre = $metaTitles[$queryPage];
    $metaDescription = $metaDescriptions[$queryPage];
    $pageAffichage = $routes[$queryPage];
    if ($queryPage != $_SESSION['page']) {
        $_SESSION['countViewPage']++;
    }
    $_SESSION['page'] = $queryPage;
} else {
    $metaTitre = 'Page non trouvée';
    $metaDescription = 'Désoléee, page non trouvée';
    $pageAffichage = 'pages/404.php';
}

$render = getInclude($pageAffichage, $queryPage, $metaTitre, $metaDescription);
echo $render;

function getInclude($includePath, $queryPage, $metaTitre, $metaDescription) {
    ob_start();
    $queryPage;
    $metaTitre;
    $metaDescription;
    include 'header.php';
    include $includePath;
    include 'footer.php';
    $page = ob_get_contents();
    ob_end_clean();
    return $page;
}