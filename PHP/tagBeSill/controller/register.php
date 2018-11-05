<?php

require_once __DIR__ . '/../model/User.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['nickname'])) {
        $errors['nickname'] = ['A nickname must be provided'];
    }
    if (!isset($_POST['password1'])) {
        $errors['password1'] = ['A password must be provided'];
    }
    if (!isset($_POST['password2'])) {
        $errors['password2'] = ['You need to retype your password'];
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
    if ($_POST['password1'] !== $_POST['password2']) {
        if (!isset($errors['password2'])) {
            $errors['password2'] = [];
        }
        $errors['password2'][] = 'The password you retyped is not equal to the first field';
    }
    
    if (empty($errors)) {
        createUser($_POST['nickname'], $_POST['password1']);
        $success = true;
    }
}

include __DIR__ . '/../view/Register.html.php';
