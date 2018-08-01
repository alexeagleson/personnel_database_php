<?php

require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

echo $twig -> render('headdata.html');
echo $twig -> render('navbar.html', array('active' => 'edit-employee'));

$headerTitle = 'Edit Employee Data';
echo $twig -> render('header.html', array(
    'headerTitle' => $headerTitle,
));

echo $twig -> render('inputform.html', array(
    'personId'   => $_POST['person-id'],
    'personName' => $_POST['person-name'],
    'personRole' => $_POST['person-role'],
    'submitButtonName' => 'Save Employee',
    'submitAction' => 'edit-employee',
));

echo $twig -> render('footer.html');

?>