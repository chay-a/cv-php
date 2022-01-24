<?php

$secureParameter = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);
$pageHobby = 'hobby';
$pageContact = 'contact';


if ($secureParameter) {
    if ($secureParameter == $pageHobby){
        $metaTitre = 'Hobbies';
        $metaDescription = 'Découvrez les hobbies d\'Auriane Chay';
        require 'header.php';
        require 'pages/hobby.php';
    } elseif ($secureParameter == $pageContact){
        $metaTitre = 'Contact';
        $metaDescription = 'Contactez Auriane Chay pour bénéficier de ses compétences.';
        require 'header.php';
        require 'pages/contact.php';
    } else {
        $metaTitre = 'Page non trouvée';
        $metaDescription = 'page non trouvée';
        require 'header.php';
        require 'pages/404.php';
    }
} else {
    $metaTitre = 'Accueil';
    $metaDescription = 'CV en ligne de Auriane Chay avec ses compétences';
    require 'header.php';
    require 'pages/accueil.php';
}

require 'footer.php';