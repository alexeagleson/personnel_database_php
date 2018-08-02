<?php 

session_start();

require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

echo $twig -> render('headdata.html');

$currentUser = (array_key_exists('username', $_SESSION)) ? $_SESSION['username'] : '';
echo $twig -> render('navbar.html', array(
    'active' => 'login',
    'currentUser' => $currentUser,
));

$headerTitle = 'Log In';
echo $twig -> render('header.html', array(
    'headerTitle' => $headerTitle,
));

echo $twig -> render('loginform.html');

echo $twig -> render('footer.html');

?>