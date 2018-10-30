<?php
$title = 'TagBeSill registration';

$nicknameError = '';
if (!empty($errors['nickname'])) {
    $nicknameError = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['nickname'] as $errorText) {
        $nicknameError .= '<li>' . $errorText . '</li>';
    }
    $nicknameError .= '</ul>';
}
$password1Error = '';
if (!empty($errors['password1'])) {
    $password1Error = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['password1'] as $errorText) {
        $password1Error .= '<li>' . $errorText . '</li>';
    }
    $password1Error .= '</ul>';
}
$password2Error = '';
if (!empty($errors['password2'])) {
    $password2Error = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['password2'] as $errorText) {
        $password2Error .= '<li>' . $errorText . '</li>';
    }
    $password2Error .= '</ul>';
}

$nickname = $_POST['nickname'] ?? '';

if (isset($success) && $success) {
    $success = '<p class="alert alert-success">Your account was successfully created</p>';
} else {
    $success = '';
}

$content = <<<EOT
    <div class="container">
        $success
        <form method="POST">
            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input type="text" value="$nickname" class="form-control" name="nickname" id="nickname" />
                $nicknameError
            </div>
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" class="form-control" name="password1" id="password1">
                $password1Error
            </div>
            <div class="form-group">
                <label for="password2">Retype your password</label>
                <input type="password" class="form-control" aria-describedby="password2Help" name="password2" id="password2">
                <small id="password2Help" class="form-text text-muted">To be sure you enter a needed password.</small>
                $password2Error
            </div>
            <a href="/">
                <button type="button" class="btn btn-success">Back</button>
            </a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
EOT;

include __DIR__ . '/Base.html.php';
