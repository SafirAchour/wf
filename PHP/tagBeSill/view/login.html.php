<?php
$title = 'TagBeSill login';

if (isset($success) && $success) {
    $success = '<p class="alert alert-success">You are logged</p>';
} else {
    $success = '';
}
if (isset($error) && $error) {
    $error = '<p class="alert alert-warning">Login failed, check your credential informations</p>';
} else {
    $error = '';
}

$content = <<<EOT
    <div class="container">
        $success
        $error
        <form method="POST">
            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input type="text" class="form-control" name="nickname" id="nickname" />
            </div>
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <a href="/">
                <button type="button" class="btn btn-success">Back</button>
            </a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
EOT;

include __DIR__ . '/Base.html.php';