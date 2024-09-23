<?php
	try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=notes', username:'root', password:'root');
    $sql = "INSERT INTO `note` (note_title, note_text) VALUES('','')";
    $db->exec($sql);
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>