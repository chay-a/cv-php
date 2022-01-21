<?php

$secureParameter = filter_input(INPUT_GET, 'page');

if ($secureParameter) {
    if ($secureParameter == 'hobby'){
        include 'pages/hobby.php';
    } elseif ($secureParameter == 'contact'){
        include 'pages/contact.php';
    } else {
        include 'pages/404.php';
    }
} else {
    include 'pages/accueil.php';
}