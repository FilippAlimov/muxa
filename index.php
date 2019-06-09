<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Todo list</title>
</head>
<body>
<div align="center">
	<input type="text" id="message" placeholder="Введите...">
	<button id="add" onclick="addNote(this.id)">+</button>
</div>
<div>
	<ul id="allNote">
		<?php
			$mysqli = mysqli_connect("localhost", "root", "", "vitkaas");
			mysqli_query($mysqli, "SET NAMES 'utf8'");
			$result = mysqli_query($mysqli, "SELECT * FROM todo");
			while($row = mysqli_fetch_array($result))
				echo "<div align='center'><label>".$row['message']."</label><input type='submit' onclick='deleteNote(this.id)' value='-' id='".$row['message']."'></div>";
		?>
	</ul>
</div>
<script src="ajax.js"></script>
</body>
</html>
