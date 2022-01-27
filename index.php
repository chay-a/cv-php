<?php
session_start();
$queryPage = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_ENCODED);
$pageAffichage = '';
$routes = [
    NULL => ['pages/accueil.php', 'Accueil', 'CV en ligne de Auriane Chay avec ses compétences'],
    'hobby' => ['pages/hobby.php', 'Hobbies', 'Découvrez les hobbies d\'Auriane Chay'],
    'contact' => ['pages/contact.php','Contact', 'Contactez Auriane Chay pour bénéficier de ses compétences.'],
];

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
    $metaTitre = $routes[$queryPage][1];
    $metaDescription = $routes[$queryPage][2];
    $pageAffichage = $routes[$queryPage][0];
    if ($queryPage != $_SESSION['page']) {
        $_SESSION['countViewPage']++;
    }
    $_SESSION['page'] = $queryPage;
} else {
    $metaTitre = 'Page non trouvée';
    $metaDescription = 'Désoléee, page non trouvée';
    $pageAffichage = 'pages/404.php';
}

$render = getInclude($pageAffichage, $queryPage, $routes);
echo $render;

function getInclude($includePath, $queryPage, $routes) {
    ob_start();
    $queryPage;
    $routes;
    include 'header.php';
    include $includePath;
    include 'footer.php';
    $page = ob_get_contents();
    ob_end_clean();
    return $page;
}