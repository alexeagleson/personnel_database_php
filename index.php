<?php

session_start();

require 'vendor/autoload.php';
require 'model/dbconnect.php';
require 'model/dbfunction.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

echo $twig -> render('headdata.html');

$currentUser = (array_key_exists('username', $_SESSION)) ? $_SESSION['username'] : 'Log In';
echo $twig -> render('navbar.html', array(
    'active' => 'home',
    'currentUser' => $currentUser,
));

$headerTitle = 'Personnel App';
echo $twig -> render('header.html', array(
    'headerTitle' => $headerTitle,
));

$dataForTable = getDataFromDatabase($pdo);
echo $twig -> render('datatable.html', array(
    'dataForTable' => $dataForTable,
));

echo $twig -> render('footer.html');

?>
