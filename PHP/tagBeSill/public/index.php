<?php 

$config = include __DIR__ . '/../config/config.php';
require __DIR__ . '/../model/Project.php';  // <=   ???

try {
    $projects = getAllProjects();
} catch (Exception $e) {
    echo 'An error occured with code : ' .$e->getMessage();
    exit;
}

var_dump($projects->fetchAll());

/*
-> go in config and return config
-> require project.php
    ->  require connection.php
        -> create a connection
    -> define getAllProjects function
-> call getAllProjects
    -> send a query
    -> return the result
*/

    
    