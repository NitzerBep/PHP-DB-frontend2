<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Rare balls</title>
</head>

<body>
	<h1>Rare balls uploaded</h1>
	<a href="index.php">Go back</a>
	
<?php
	require_once('dbcon.php');
	$sql = 'SELECT id, title, imageurl FROM image ORDER BY last_update DESC';
	$stmt = $link->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id, $title, $url);
	
	while($stmt->fetch()){ ?>
		
	<h2><?=$id?>: <?=$title?></h2>
	<img src="<?=$url?>" width="100px" />
<?php } ?>
</body>
</html>