<?php

session_start();

require 'vendor/autoload.php';
require 'model/dbconnect.php';
require 'model/dbfunction.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

echo $twig -> render('headdata.html');

$currentUser = (array_key_exists('username', $_SESSION)) ? $_SESSION['username'] : '';
echo $twig -> render('navbar.html', array(
    'active' => 'home',
    'currentUser' => $currentUser,
));

$headerTitle = 'Personnel App';
$headerText = 'This site was written in PHP using the Twig templating engine, and stores its data in a MySQL database.';
echo $twig -> render('header.html', array(
    'headerTitle' => $headerTitle,
    'headerText'  => $headerText,
));

$dataForTable = getDataFromDatabase($pdo);
echo $twig -> render('datatable.html', array(
    'dataForTable' => $dataForTable,
    'currentUser' => $currentUser,
));

echo $twig -> render('footer.html');

?>
