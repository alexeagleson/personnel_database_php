<?php

session_start();

require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

echo $twig -> render('headdata.html');

$currentUser = (array_key_exists('username', $_SESSION)) ? $_SESSION['username'] : '';

if ($currentUser == '') {
    echo $twig -> render('noaccess.html');
} else {
    echo $twig -> render('navbar.html', array(
        'active' => 'new-employee',
        'currentUser' => $currentUser,
    ));

    $headerTitle = 'Add New Employee';
    echo $twig -> render('header.html', array(
        'headerTitle' => $headerTitle,
    ));

    echo $twig -> render('inputform.html', array(
        'personID'   => '',
        'personName' => '',
        'personRole' => '',
        'submitButtonName' => 'Add New Employee',
        'submitAction' => 'new-employee',
    ));

    echo $twig -> render('footer.html');
}

?>


