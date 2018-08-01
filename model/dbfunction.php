<?php

require 'datavalidate.php';

// CREATE
function insertNewEmployee($db, $employeeData) {
    $validator = new DataValidator;
    if (!$validator->uniqidValidator($employeeData['person-id'])) return false;
    if (!$validator->stringValidator($employeeData['person-name'])) return false;
    if (!$validator->stringValidator($employeeData['person-role'])) return false;

    $stmt = $db -> prepare('INSERT INTO employees (id, name, role) VALUES (?, ?, ?)');
    $stmt -> execute([$employeeData['person-id'], $employeeData['person-name'], $employeeData['person-role']]);
    $stmt = null;
    return true;
}

function insertMultipleEmployees($db, $employeeArray) {
    $validator = new DataValidator;
    foreach ($employeeArray as $employeeData) {
        if (!insertNewEmployee($db, $employeeData)) return false;
    }
    return true;
}

// READ
function getDataFromDatabase($db) {
    $stmt = $db -> prepare('SELECT * FROM employees');
    $stmt -> execute();
    $arr = $stmt -> fetchAll();
    //if(!$arr) exit('No rows');
    //var_export($arr);
    $stmt = null;
    return $arr;
}

// UPDATE
function updateEmployee($db, $employeeData) {
    $validator = new DataValidator;
    if (!$validator->uniqidValidator($employeeData['person-id'])) return false;
    if (!$validator->stringValidator($employeeData['person-name'])) return false;
    if (!$validator->stringValidator($employeeData['person-role'])) return false;
    $stmt = $db -> prepare('UPDATE employees SET name = ?, role = ? WHERE id = ?');
    $stmt -> execute([$employeeData['person-name'], $employeeData['person-role'], $employeeData['person-id']]);
    $stmt = null;
    return true;
}

// DELETE
function deleteEmployee($db, $employeeData) {
    $validator = new DataValidator;
    if (!$validator->uniqidValidator($employeeData['person-id'])) return false;
    $stmt = $db -> prepare('DELETE FROM employees WHERE id = ?');
    $stmt -> execute([$employeeData['person-id']]);
    $stmt = null;
    return true;
}

function clearAllData($db) {
    $stmt = $db -> prepare('DELETE FROM employees');
    $stmt -> execute();
    $stmt = null;
    return true;
}

?>