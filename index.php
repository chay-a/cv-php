<?php
if (isset($_GET['page'])){
    if ($_GET['page'] == 'hobby'){
        include 'pages/hobby.php';
    } elseif ($_GET['page'] == 'contact') {
        include 'pages/contact.php';
    }
} else {
       include 'pages/hobby.php';
}