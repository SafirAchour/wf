<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tag be sill home page</title>
    </head>
    <body>
    	<h1>Tag be sill</h1>
    	
    	<p style="font-weight: bold;color: red;">
    		Please, create an account on opse.cscfa.fr
    	</p>
    	
    	<table>
    		<thead>
    			<tr>
    				<th>&nbsp;</th>
    				<th>Title</th>
    				<th>Publication date</th>
    				<th>Description</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php 
    			     foreach ($articles as $article) {
    			         $img = $article['img'];
    			         $title = $article['title'];
    			         $pubDate = $article['pub_date'];
    			         $desc = $article['description'];
    			         
    			         if (strlen($desc) > 200) {
    			             $desc = substr($desc, 0, 197) . '...';
    			         }
    			         
		         ?>
		         <tr>
		         	<td><img src="<?php echo $img;?>" style="width:50px;"/></td>
		         	<td><?php echo $title;?></td>
		         	<td><?php echo $pubDate;?></td>
		         	<td><?php echo $desc;?></td>
		         </tr>
		         <?php
    			     }
    			?>
    		</tbody>
    	</table>
    </body>
</html>