<?php
session_start();
if (!isset($_SESSION['']))
$secureParameter = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_ENCODED);
$pageHobby = 'hobby';
$pageContact = 'contact';
$pageAffichage = '';
if (!isset($_SESSION['started'])) {
    $date =date('Y-m-d H:i:s');
    $_SESSION['started'] = $date;
}

if ($secureParameter) {
    if ($secureParameter == $pageHobby){
        $metaTitre = 'Hobbies';
        $metaDescription = 'Découvrez les hobbies d\'Auriane Chay';
        $pageAffichage = 'pages/hobby.php';
    } elseif ($secureParameter == $pageContact){
        $metaTitre = 'Contact';
        $metaDescription = 'Contactez Auriane Chay pour bénéficier de ses compétences.';
        $pageAffichage = 'pages/contact.php';
    } else {
        $metaTitre = 'Page non trouvée';
        $metaDescription = 'page non trouvée';
        $pageAffichage = 'pages/404.php';
    }
} else {
    $metaTitre = 'Accueil';
    $metaDescription = 'CV en ligne de Auriane Chay avec ses compétences';
    $pageAffichage = 'pages/accueil.php';
}
require 'header.php';
require $pageAffichage;
require 'footer.php';