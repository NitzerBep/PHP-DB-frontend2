<?php //error_reporting(E_ALL); 

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) or die ('Jeg modtog ikke den id parameter jeg forventede');

	require_once('dbcon.php');
	$sql = 'Delete from balls where id = ?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	
		if($stmt->affected_rows >0 ){
			echo "Den er slettet";
		
		}
		else {
			
			echo "Der skete en fejl";
		}

?>