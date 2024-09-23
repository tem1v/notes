function createNote(){
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "createNote.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send();
	document.location.reload(true);
}


var titleInputs = document.querySelectorAll(".title-input");

titleInputs.forEach(input =>{
	input.addEventListener("focus", function () {
		var id_in_db = input.getAttribute("id_in_db");
		var button = document.getElementById("delete-button"+id_in_db);
		button.className = "save-button";
    	button.id = "save-button"+id_in_db;
    	button.onclick = "saveNote('<?= $data['note_id']?>')";
    	document.getElementById("button-image"+id_in_db).src = "images/save.png";	
    });
    input.addEventListener("blur", function () {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "insertTitle.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(
        `id=${encodeURIComponent(
            input.getAttribute("id_in_db")
        )}&title=${encodeURIComponent(input.value)}`
        );
        location.reload(true);
    });
});


var contentTextareas = document.querySelectorAll(".text-block-textarea");
contentTextareas.forEach(textarea => {
	textarea.addEventListener("focus", function () {
		var id_in_db = textarea.getAttribute("id_in_db");
    	var button = document.getElementById("delete-button"+id_in_db);
		button.className = "save-button";
		button.id = "save-button"+id_in_db;
		button.onclick = "saveNote('<?= $data['note_id']?>')";
		document.getElementById("button-image"+id_in_db).src = "images/save.png";
	});

	textarea.addEventListener("blur", function () {
		var id_in_db = textarea.getAttribute("id_in_db");
		var button = document.getElementById("save-button" + id_in_db);
		button.className = "delete-button";
		button.id = "delete-button" + id_in_db;
		button.onclick = "deleteNote('<?= $data['note_id']?>')";
		document.getElementById("button-image" + id_in_db).src = "images/trash.png";
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "insertText.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(
		`id=${encodeURIComponent(
			textarea.getAttribute("id_in_db")
		)}&text=${encodeURIComponent(textarea.value)}`
		);
	});

});



function deleteNote(id) {
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "deleteNote.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("id=" + encodeURIComponent(id));
	location.reload(true);
};

function saveNote(id) {
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "insertTitle.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(
	`id=${encodeURIComponent(
		titleInputs.getAttribute("id_in_db")
	)}&title=${encodeURIComponent(titleInputs.value)}`
	);
	xhr.open("POST", "insertText.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(
	`id=${encodeURIComponent(
		contentTextarea.getAttribute("id_in_db")
	)}&text=${encodeURIComponent(contentTextarea.value)}`
	);
};

