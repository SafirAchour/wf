<?php
require_once __DIR__ . '/connection.php';

function findAllCategories() {
    global $connection;
    $statement = 'SELECT * FROM Category';
    $statusList = $connection->query($statement)->fetchAll(PDO::FETCH_CLASS, stdClass::class);
    if ($statusList === false) {
        throw new Exception($connection->errorCode());
    }

    return $statusList;
}
