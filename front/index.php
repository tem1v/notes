<?php
	$db = new PDO('mysql:host=127.0.0.1;dbname=notes', username:'root', password:'root');
	$info = [];

	if($query = $db->query("SELECT * FROM `note`")){
		$info = $query->fetchAll(PDO::FETCH_ASSOC);
	} else{
		print_r($db->errorInfo());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="icon" href="images/favicon.png">
	<title>Notes</title>
</head>
<body>
	<div class="main-window">
		<div class="notes-block">
			<ul class="notes-list">
				<?php foreach($info as $data):?>
				<li class="note">
					<div class="title">
						<ul>
							<li><input id="title-input" class="title-input" value="<?= $data['note_title']?>" id_in_db="<?= $data['note_id']?>"/></li>
							<li>
                    			<button class="delete-button" id="delete-button<?= $data['note_id']?>" id_in_db="<?= $data['note_id']?>" onclick = "deleteNote('<?= $data['note_id']?>')"><img id = "button-image<?= $data['note_id']?>" src="images/trash.png"/></button>
							</li>
						</ul>
					</div>
					<div class="text-block">
						<textarea class="text-block-textarea" id="text-block-textarea" id_in_db="<?= $data['note_id']?>"><?= $data['note_text']?></textarea>
					</div>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
		<div class="create-note">
			<button class="create-button" id="create-button" onclick="createNote()">+</button>
		</div>
	</div>
	<script src="script.js"></script>
</body>
</html>
