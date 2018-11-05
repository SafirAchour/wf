<?php
$title = 'TagBeSill registration';

$nicknameError = '';
if (! empty($errors['nickname'])) {
    $nicknameError = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['nickname'] as $errorText) {
        $nicknameError .= '<li>' . $errorText . '</li>';
    }
    $nicknameError .= '</ul>';
}

$password1Error = '';
if (! empty($errors['password1'])) {
    $password1Error = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['password1'] as $errorText) {
        $password1Error .= '<li>' . $errorText . '</li>';
    }
    $password1Error .= '</ul>';
}

$password2Error = '';
if (! empty($errors['password2'])) {
    $password2Error = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['password2'] as $errorText) {
        $password2Error .= '<li>' . $errorText . '</li>';
    }
    $password2Error .= '</ul>';
}

$nickname = $_POST['nickname'] ?? '';

if (isset($success) && $success) {
    $success = '<p class="alert alert-success">Your account was successfully created</p>';
}   else {
    $success = '';
}
// USE THE LEFT ONE, IF NOT EXISTS: USE THE RIGHT ONE
// NULL COALESCING OPERATER !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// Never do this kind of password

$content = <<< EOT
    <div class=container>
    $success
    <form method='POST'>

      <div class="form-group">
       
        <input class="form-control" type="text" value="$nickname"  name="nickname">
      </div>
        $nicknameError
            
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password1">
      </div>
       $password1Error 

      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" aria-describedby="emailHelp" class="form-control" id="exampleInputPassword1" name="password2">
      </div>
        <small id="emailHelp" class="form-text text-muted">To be sure your passwords match.</small>
        $password2Error

     <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
EOT;

include __DIR__ . '/../view/Base.html.php';
?>