<?php
	try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=notes', username:'root', password:'root');
	echo("<script>alert('запустился')</script>");
	$id = $_POST['id'];
	$title = $_POST['title'];
    $sql = "UPDATE note SET note_title = '$title' WHERE note_id = '$id'";
    $db->exec($sql);
	}
	catch (PDOException $e) {
		echo "Database error: " . $e->getMessage();
	}
?>