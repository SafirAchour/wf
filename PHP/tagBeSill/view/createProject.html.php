<?php

$title = 'TagBeSill create project';

foreach (['status', 'category'] as $varName) {
    ${$varName . 'Display'} = '';
    foreach (${$varName . 'List'} as $element) {
        ${$varName . 'Display'} .= '<option value="'.$element->id.'">'.$element->label.'</option>';
    }
}

$errors = array_map(function(array $elements){
    if (empty($elements)) {
        return '';
    }
    return sprintf('<ul class="alert alert-danger">%s</ul>', implode('', $elements));
}, $errors);
list($titleErr, $descErr, $pictErr, $statusErr, $catErr, $pubErr) = array_values($errors);

$content = <<<EOT
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Project name</label>
                <input type="text" class="form-control" name="title" id="title" />
                $titleErr
            </div>
            <div class="form-group">
                <label for="description">Project description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
                $descErr
            </div>
            <div class="form-group">
                <label for="picture">Project image</label>
                <input type="file" name="picture" id="picture" />
                $pictErr
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    $statusDisplay
                </select>
                $statusErr
            </div>
            <div class="form-group">
                <label for="categories[]">Category</label>
                <select multiple class="form-control" name="categories[]" id="categories">
                    $categoryDisplay
                </select>
                $catErr
            </div>
            <div class="form-group">
                <label for="published">Publish the project now</label>
                <input type="checkbox" class="form-control" name="published" id="published" checked="checked"/>
                $pubErr
            </div>
            <a href="/">
                <button type="button" class="btn btn-success">Back</button>
            </a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
EOT;

include __DIR__ . '/Base.html.php';
