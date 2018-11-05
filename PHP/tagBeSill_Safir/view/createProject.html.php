<?php 
$title = 'Create Project';

// I CREATE VAR WITH CONCATENATION TO LINK TO DB - USE VAR IN HTML FORM
$statusDisplay = '';
foreach ($status as $statusElement) {
    $statusDisplay .= '<option value="'.$statusElement['id'].'">'.$statusElement['label'].'</option>';
}

$categoryDisplay = '';
foreach ($category as $categoryElement) {
    $categoryDisplay .= '<option value="'.$categoryElement['id'].'">'.$categoryElement['label'].'</option>';
}

$titleError = '';
if (!empty($errors['title'])) {
    $titleError = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['title'] as $errorText) {
        $titleError .= '<li>' . $errorText . '</li>';
    }
    $titleError .= '</ul>';
}

$descriptionError = '';
if (!empty($errors['description'])) {
    $descriptionError = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['description'] as $errorText) {
        $descriptionError .= '<li>' . $errorText . '</li>';
    }
    $descriptionError .= '</ul>';
}

$categoryError = '';
if (!empty($errors['category'])) {
    $categoryError = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['category'] as $errorText) {
        $categoryError .= '<li>' . $errorText . '</li>';
    }
    $categoryError .= '</ul>';
}

$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';

$content = <<< EOT



<form method="POST">

<div class="container"> 
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="titleHelp" name="title" value="$title">
    $titleError
  </div>
  
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" aria-describedby="descriptionHelp" name="description"  >$description</textarea>
    $descriptionError
  </div>


  <div class="form-group">
    <label for="image">Project image</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>

  <div class="form-group">
    <label for="projectStatus">Status</label>
    <select class="form-control" id="projectStatus" name="projectStatus">
       $statusDisplay
    </select>
  </div>
  
//USE  MULTIPLE SELECT -->
PUT VALUE AND LABEL FOR OPTIONS
CHECK AFTER BREAK
ASK QUESTIONS...

    <div class="form-group">
    <label for="category">Project category</label>
    <select multiple class="form-control" id="category" name="category[]">
      $categoryDisplay
    </select>
    $categoryError
  </div>




  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
EOT;

include __DIR__ . '/Base.html.php';