<?php

require_once __DIR__ . '/connection.php';

function getAllProjects() {
    global $connection;
    $statement = 'SELECT p.*, s.label FROM Project as p 
                  INNER JOIN Status as s ON s.id = p.statusId';
    $projects = $connection->query($statement)->fetchAll();
    if ($projects === false) {
        throw new Exception($connection->errorCode());
    }
    
    foreach ($projects as $key => $project) {
        $statement = '
            SELECT c.label FROM Category as c 
            INNER JOIN ProjectCategory as pc ON c.id = pc.categoryId
            WHERE pc.projectId = '.$project['id'];
        $categories = $connection->query($statement)->fetchAll();
        if ($categories === false) {
            throw new Exception($connection->errorCode());
        }
        
        $project['categories'] = $categories;
        $projects[$key] = $project;
    }

    return $projects;
}

function createProject(
    string $title, 
    string $description, 
    bool $published, 
    int $status, 
    array $categories, 
    string $image = null
) {
    global $connection;
    $queryProject = 'INSERT INTO Project(title, description, image, publishingDate, statusId) 
        VALUE (:title, :description, :image, :publishingDate, :status)';
    
    $date = null;
    if ($published) {
        $date = (new DateTime())->format('Y-m-d H:i:s');
    }
    
    $stmt = $connection->prepare($queryProject);
    $stmt->bindValue('title', $title);
    $stmt->bindValue('description', $description);
    $stmt->bindValue('publishingDate', $date);
    $stmt->bindValue('status', $status);
    $stmt->bindValue('image', $image);
    $result = $stmt->execute();
    if ($result === false) {
        throw new Exception(print_r($stmt->errorInfo(), true));
    }
    
    $projectId = $connection->lastInsertId();
    
    foreach ($categories as $category) {
        $queryCategory = 'INSERT INTO ProjectCategory VALUE(:project, :category)';
        $stmt = $connection->prepare($queryCategory);
        $stmt->bindValue('project', $projectId);
        $stmt->bindValue('category', $category);
        $result = $stmt->execute();
        if ($result === false) {
            throw new Exception(print_r($stmt->errorInfo(), true));
        }
    }
    
    return $projectId;
}
