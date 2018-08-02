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
        'active' => 'dashboard',
        'currentUser' => $currentUser,
    ));

    $headerTitle = $currentUser . "'s Dashboard";
    echo $twig -> render('header.html', array(
        'headerTitle' => $headerTitle,
    ));

    echo $twig -> render('footer.html');
}

?>