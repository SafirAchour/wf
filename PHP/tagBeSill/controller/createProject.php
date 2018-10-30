<?php
require_once __DIR__.'/../model/Project.php';
require_once __DIR__.'/../model/Status.php';
require_once __DIR__.'/../model/Category.php';

$status = getAllStatus();
$category = getAllCategories();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    // TODO: check each incoming informations
    // WE WILL CREATE A FOREACH HERE an deng zenn
    
    
    if (empty($errors)) {
        createProject($_POST['title'], $_POST['description'], $_POST['statusId']);
    }
}

include __DIR__ . '/../view/createProject.html.php';
