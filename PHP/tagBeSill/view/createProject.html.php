<?php 
$title = 'Create Project';

$statusDisplay = '';
foreach ($status as $statusElement) {
    $statusDisplay .= '<option value="'.$statusElement['id'].'">'.$statusElement['label'].'</option>';
}

$categoryDisplay = '';
foreach ($category as $categoryElement) {
    $categoryDisplay .= '<option value="'.$categoryElement['id'].'">'.$categoryElement['label'].'</option>';
}

$content = <<< EOT
<form>

<div class="container"> 
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="titleHelp" name="title">
    <small id="titleHelp" class="form-text text-muted">Enter project title</small>
  </div>
  
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" aria-describedby="descriptionHelp" name="description"  ></textarea>
    <small id="descriptionHelp" class="form-text text-muted">Enter project description</small>
  </div>

<form>
  <div class="form-group">
    <label for="image">Project image</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
</form>




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
    <select multiple class="form-control" id="category" name="category">
      $categoryDisplay
    </select>
  </div>




  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
EOT;

include __DIR__ . '/Base.html.php';