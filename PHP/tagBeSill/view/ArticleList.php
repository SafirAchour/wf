<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Tag be sill home page</title>
	</head>
	<body>
		<h1>Tag be sill</h1>
		
		<p>
			The actual time is
			<?php 
			
			echo (new DateTime())->format('Y-m-d H:i:s');
			?>
		</p>
		
		<table>
			<th>
			<?php 
			foreach ($articles as $items){
			    echo 'id', 'pub_date', 'img', 'title', 'description';
			}
			?>
			</th>
			<tr></tr>
		</table>
	</body>
	
</html>