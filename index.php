<?php
session_start();
$secureParameter = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_ENCODED);
$pageHobby = 'hobby';
$pageContact = 'contact';
$pageAffichage = '';



if (!isset($_SESSION['dateFirstVisit'])) {
    $date =date('Y-m-d H:i:s');
    $_SESSION['dateFirstVisit'] = $date;
}

if (!isset($_SESSION['countViewPage'])) {
    $_SESSION['countViewPage'] = 0;
}

if ($secureParameter) {
    if ($secureParameter == $pageHobby){
        $metaTitre = 'Hobbies';
        $metaDescription = 'Découvrez les hobbies d\'Auriane Chay';
        $pageAffichage = 'pages/hobby.php';
        $_SESSION['countViewPage']++;

    } elseif ($secureParameter == $pageContact){
        $metaTitre = 'Contact';
        $metaDescription = 'Contactez Auriane Chay pour bénéficier de ses compétences.';
        $pageAffichage = 'pages/contact.php';
        $_SESSION['countViewPage']++;
    } else {
        $metaTitre = 'Page non trouvée';
        $metaDescription = 'page non trouvée';
        $pageAffichage = 'pages/404.php';
    }
} else {
    $metaTitre = 'Accueil';
    $metaDescription = 'CV en ligne de Auriane Chay avec ses compétences';
    $pageAffichage = 'pages/accueil.php';
    $_SESSION['countViewPage']++;
}
require 'header.php';
require $pageAffichage;
require 'footer.php';