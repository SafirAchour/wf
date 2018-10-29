<?php
$config = include __DIR__ . '/../config/config.php';
include __DIR__ .'/../model/User.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if (!isset($_POST['nickname'])) {
        $errors['nickname'] = ['A nickname must be provided'];
    }
    
    if (!isset($_POST['password1'])) {
        $errors['nickname'] = ['A password must be provided'];
    }
    
    if (!isset($_POST['password2'])) {
        $errors['nickname'] = ['You need to retype your password'];
    }
    
    if (empty($_POST['nickname'])) {
        if (!isset($errors['nickname'])) {
            $errors['nickname'] = [];
        }
        $errors['nickname'][] = 'Please, provide a nickname with at least 1 character';
    }
    
    if (empty($_POST['password1'])) {
        if (!isset($errors['password1'])) {
            $errors['password1'] = [];
        }
        $errors['password1'][] = 'Please, provide a password with at least 1 character';
    }
    if (empty($_POST['password2'])) {
        if (!isset($errors['password2'])) {
            $errors['password2'] = [];
        }
        $errors['password2'][] = 'Please, provide a password with at least 1 character';
    }
    
    if ($_POST['password1'] !== $_POST['password2']) {
        if (!isset($errors['password2'])) {
            $errors['password2'] = [];
        }
        $errors['password2'][] = 'Passwords do not match';
    }
    
    if (empty($errors)) {
        createUser($_POST['nickname'], $_POST['password1']);
        $success = true;
    }
}

require  __DIR__ . '/../view/form.php';

/*  MATCHING PASSWORDS - WRONG SYNTAX
    if (($_POST['password2']) !== ($_POST['password1'])) {
        $errors['password2'] = 'Your passwords are not matching';
    }
*/

?>