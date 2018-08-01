<?php

$config = [
    'database' => [
        'hostname' => '160.153.76.39',
        'port'     => 3306,
        'name'     => 'php_project',
        'username' => 'aeagleso',
        'password' => 'just_for_testing',
    ]
];

$dsn = 'mysql:host='.$config['database']['hostname'].':'.$config['database']['port'].';dbname='.$config['database']['name'].';charset=utf8mb4';

$options = [
  PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];

try {
  $pdo = new PDO($dsn, $config['database']['username'], $config['database']['password'], $options);




} catch (Exception $e) {
  error_log($e->getMessage());
  exit('Something weird happened'); //something a user can understand
}

?>