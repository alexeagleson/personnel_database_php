<?php

session_start();

require '../model/dbconnect.php';
require '../model/dbfunction.php';
require '../assets/dummydata.php';

if (array_key_exists('new-employee', $_POST)) {
    $_POST['person-id'] = uniqid();
    if (insertNewEmployee($pdo, $_POST)) {
        header('Refresh:0; url=../index.php');
    } else {
        echo '<h1>Invalid form entry</h1><br /><a href="../index.php">Return home</a>';
    }

} elseif (array_key_exists('edit-employee', $_POST)) {
    if (updateEmployee($pdo, $_POST)) {
        header('Refresh:0; url=../index.php');
    } else {
        echo '<h1>Invalid form entry</h1><br /><a href="../index.php">Return home</a>';
    }

} elseif (array_key_exists('insert-multiple-employees', $_POST)) {
    clearAllData($pdo);
    if (insertMultipleEmployees($pdo, $dummyData)) {
        header('Refresh:0; url=../index.php');
    } else {
        echo '<h1>Invalid form entry</h1><br /><a href="../index.php">Return home</a>';
    }

} elseif (array_key_exists('remove-employee', $_POST)) {
    if (deleteEmployee($pdo, $_POST)) {
        header('Refresh:0; url=../index.php');
    } else {
        echo '<h1>Invalid form entry</h1><br /><a href="../index.php">Return home</a>';
    }

} elseif (array_key_exists('clear-all-data', $_POST)) {
    if (clearAllData($pdo)) {
        header('Refresh:0; url=../index.php');
    } else {
        echo '<h1>Invalid form entry</h1><br /><a href="../index.php">Return home</a>';
    }

} elseif (array_key_exists('login-submission', $_POST)) {
    $validator = new DataValidator;
    if ($validator->stringValidator($_POST['login-username']) && $validator->stringValidator($_POST['login-password'])) {
        $_SESSION['username'] = $_POST['login-username'];
        header('Refresh:0; url=../index.php');
    } else {
        echo '<h1>Invalid form entry</h1><br /><a href="../index.php">Return home</a>';
    }

} else {
    header('Refresh:0; url=../index.php');
}

?>

