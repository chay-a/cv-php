<?php

$secureParameter = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);

if ($secureParameter) {
    if ($secureParameter == 'hobby'){
        require 'pages/hobby.php';
    } elseif ($secureParameter == 'contact'){
        require 'pages/contact.php';
    } else {
        require 'pages/404.php';
    }
} else {
    require 'pages/accueil.php';
}