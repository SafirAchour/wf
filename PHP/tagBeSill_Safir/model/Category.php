<?php

require_once __DIR__ . '/connection.php';

function getAllCategories() {
    global $connection;
    
    $query = 'SELECT * FROM Category';
    $results = $connection->query($query);
    
    if (!$results) {
        throw new LogicException($connection->errorCode());
    }
    
    return $results->fetchAll();
}