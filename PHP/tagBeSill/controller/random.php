<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/main.css"/>
    </head>
    <body class="container">
<?php 

$array = [
    'mustapha',
    'JP',
    'max',
    'alexandru',
    'diego',
    'romilson',
    'ricardo',
    'fabio',
    'philipe',
    'stefano',
    'danny',
    'marc',
    'nidhi',
    'JC',
    'saphir',
    'jonathan'
];

for ($i = 0;$i < 10;$i++, shuffle($array));

$size = $_GET['size'] ?? count($array);

$array = array_chunk($array, $size);
echo '<div class="row">';
foreach ($array as $value) {
    echo '<div class="col-sm-3 mx-4 my-2" style="border: 1px solid brown;">';
    foreach ($value as $student) {
        echo sprintf('<p>%s</p>', $student);
    }
    echo '</div>';
}
echo '</div>';
?>

<a href="?size=2"><button>By 2</button></a>
<a href="?size=3"><button>By 3</button></a>
<a href="?size=4"><button>By 4</button></a>
<a href="?size=5"><button>By 5</button></a>
<a href="?size=<?php echo $size; ?>"><button>Retry</button></a>

    	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   	</body>
</html>