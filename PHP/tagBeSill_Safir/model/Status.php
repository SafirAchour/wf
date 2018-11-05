<?php 

require_once __DIR__ . '/connection.php';

function getAllStatus() {
    global $connection;
    
    $query = 'SELECT * FROM Status';
    $results = $connection->query($query);
    
    if (!$results) {
        throw new LogicException($connection->errorCode());
    }
    
    return $results->fetchAll();
}

