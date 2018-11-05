<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        empty($_FILES['image']) ||
        $_FILES['image']['error'] !== UPLOAD_ERR_OK ||
        !preg_match('#^image/.+#', $_FILES['image']['type']) ||
        $_FILES['image']['size'] > 1000000
    ) {
        if ($_FILES['image']['size'] > 1000000) {
            echo 'The allowed size is 1Mb';
        } else if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            echo 'An error occured '.$_FILES['image']['error'];
        } else {
            echo 'Please, provide an image';
        }
    } else {
        
        $image = imagecreatefromstring(file_get_contents($_FILES['image']['tmp_name']));
        $toDisplay = imagescale($image, 150, 150);
        header('Content-Type: image/png');
        imagepng($toDisplay);
        exit();
    }
}

?>
<form method="POST" enctype="multipart/form-data">
	<input type="file" name="image"/>
	<button>submit</button>
</form>
