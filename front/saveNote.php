<?php
	try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=notes', username:'root', password:'root');
	$text = $_POST['text'];
    $sql = "INSERT INTO `note` ('note_title') VALUES ($text)";
	$content = $_POST['content'];
	$sql = "INSERT INTO `note` ('note_text') VALUES ($contnet)";
    $db->exec($sql);
	}
	catch (PDOException $e) {
		echo "Database error: " . $e->getMessage();
	}
?>