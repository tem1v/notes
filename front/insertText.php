<?php
	try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=notes', username:'root', password:'root');
	echo("<script>alert('запустился')</script>");
	$id = $_POST['id'];
	$text = $_POST['text'];
    $sql = "UPDATE note SET note_text = '$text' WHERE note_id = '$id'";
    $db->exec($sql);
	}
	catch (PDOException $e) {
		echo "Database error: " . $e->getMessage();
	}
?>