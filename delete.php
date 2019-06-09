<?php
	$mysqli = mysqli_connect("localhost","root", "", "vitkaas");
	$message = $_POST['message'];
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	$result_delete = mysqli_query($mysqli, "DELETE FROM todo WHERE message='$message'");
	$queryMessages = mysqli_query($mysqli, "SELECT * FROM todo"); 
    $rows = mysqli_num_rows($queryMessages);
    for ($i = 0; $i < $rows; $i++){                // создается массив с данными всех сообщений
	    $row = mysqli_fetch_row($queryMessages);
	    	echo "<div align='center'><label>".$row[0]."</label><input type='submit' onclick='deleteNote(this.id)' value='-' id='".$row[0]."'></div>";
    }
?>
