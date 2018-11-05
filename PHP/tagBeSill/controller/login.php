<?php
require_once __DIR__.'/../model/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['nickname']) || empty($_POST['nickname']) || !isset($_POST['password'])) {
        $error = true;
    }

    try {
        $user = findOneUserByNickname($_POST['nickname']);
    } catch (Exception $e) {
        $error = true;
    }

    if ($user && $_POST['password'] == $user['password']) {
        logInUser($user);
        $success = true;
    } else {
        $error = true;
    }
}

include __DIR__ . '/../view/login.html.php';





