<?php
require_once __DIR__.'/../model/Project.php';
require_once __DIR__.'/../model/Status.php';
require_once __DIR__.'/../model/Category.php';

$status = getAllStatus();
$category = getAllCategories();


// CHECK STATUSID VAR LINK AND CATEGORY AS WELL - IF NOT TRY WITHOUT TO TEST
function createProject(string $title, string $description, int $statusId) : int {
    global $connection;
    
    $query = 'INSERT INTO Project(title, `description`, statusId) VALUE ("'.$title.'", "'.$description.'", '.$statusDisplay.')';
    $result = $connection->exec($query);
    
    if (!$result) {
        throw new RuntimeException(print_r($connection->errorInfo(), true));
    }
    
    return $connection->lastInsertId();
}

    $errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['title']) || empty($_POST['title'])) {
        $errors['title'] = ['A title must be provided'];
    }
    if (!isset($_POST['description']) || empty($_POST['description'])) {
        $errors['description'] = ['A description must be provided'];
    }
    if (!isset($_POST['category']) || empty($_POST['category'])) {
        $errors['category'] = ['A category must be provided DUH'];
    }
    
    
   
    // TODO: check each incoming informations
    // WE WILL CREATE A FOREACH HERE an deng zenn
    
    
    if (empty($errors)) {
        createProject($_POST['title'], $_POST['description'], $_POST['statusId']);
    }
}



include __DIR__ . '/../view/createProject.html.php';
