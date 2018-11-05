<?php
require_once __DIR__ . '/../model/Project.php';
require_once __DIR__ . '/../model/Status.php';
require_once __DIR__ . '/../model/Category.php';

$statusList = findAllStatus();
$categoryList = findAllCategories();

$errorCount = 0;
$errors = [
    'title' => [],
    'description' => [],
    'picture' => [],
    'status' => [],
    'categories' => [],
    'published' => []
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (array_keys($errors) as $field) {
        if ($field === 'picture') {
            continue;
        }
        if (empty($_POST[$field])) {
            $errorCount++;
            $errors[$field][] = '<li>Please, provide a value for the field '.$field.'</li>';
        }
    }
    $image = null;
    if (!empty($_FILES['picture'])) {
        if ($_FILES['picture']['error'] !== UPLOAD_ERR_OK) {
            $errorCount++;
            $errors['picture'][] = '<li>Please, provide a correct file</li>';
        } else if (substr($_FILES['picture']['type'], 0, 6) !== 'image/') {
            $errorCount++;
            $errors['picture'][] = '<li>Please, provide an image ('.$_FILES['picture']['type'].' is not supported)</li>';
        } else {
            $image = 'img/' . uniqid();
            $destination = $config['public_path'] . '/' . $image;
            move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
        }
    }
    
    if ($errorCount == 0) {
        createProject(
            $_POST['title'], 
            $_POST['description'], 
            (bool)$_POST['published'], 
            $_POST['status'], 
            $_POST['categories'],
            $image
        );
    }
}

require __DIR__ . '/../view/createProject.html.php';
