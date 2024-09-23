<?php
	try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=notes', username:'root', password:'root');
	$text = $_POST['id'];
    $sql = "DELETE FROM `note` WHERE `note_id` = $text";
    $db->exec($sql);
	
	}
	catch (PDOException $e) {
		echo "Database error: " . $e->getMessage();
	}
	header("Refresh: 1");
?>