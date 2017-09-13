
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>My collection of Rare balls</title>
</head>

<body>

	<h1>My collection of Rare balls</h1>
	<?php
	require_once('dbcon.php');
	$sql = 'SELECT id, title, beskrivelse, brands_idbrands, imageurl FROM balls ORDER BY last_update ASC';
	$stmt = $link->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id, $title, $beskrivelse, $brands_idbrands, $url);
	
	while($stmt->fetch()){ ?>
	<li>	
		<h2><?=$id?>: <?=$title?></h2>
		<h4><?=$beskrivelse?></h4>
		<h3><?=$brands_idbrands?> - Dette tal står for et mærke i databasen. Sammenlign med drop-down vælgeren længere nede</h3>
		<img src="<?=$url?>" width="100px" />
		<form action="sletbillede.php" method="post">
        	<input type="hidden" name="id" value="<?=$id?>" />
        	<button name="submit" type="submit">Delete ball</button>
        	<a href="renamecategory.php?beskrivelse=<?=$beskrivelse?>">Change description of the ball (doesn't work)</a>
    	</form>
	</li>
<?php } ?>
	

	<hr>
	<h2>Upload a new ball</h2>
	<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:<br>
    	<input type="text" name="title" placeholder="Image title" required />
    	<select name="brands_idbrands">
    		<option value="1">Adidas</option>
    		<option value="2">Nike</option>
    		<option value="3">Puma</option>
    		 <option value="4">Select</option>
    		<option value="5">Other</option>
    	</select><br><br>
    	<input type="text" name="beskrivelse" placeholder="beskrivelse" required />
    	<br><br>
    	<input type="file" name="fileToUpload" id="fileToUpload"><br>
    	<input type="submit" value="Upload Image" name="submit">
	</form>
	
	
	
				
      

    
	
</body>
</html>