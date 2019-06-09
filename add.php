<?php
	$mysqli = mysqli_connect("localhost","root", "", "vitkaas");

	$message = $_POST['message'];
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	$check = false;
	$queryMessages = mysqli_query($mysqli, "SELECT * FROM todo"); 
    $rows = mysqli_num_rows($queryMessages);
    for ($i = 0; $i < $rows; $i++){                // создается массив с данными всех сообщений
	    $row = mysqli_fetch_row($queryMessages);
	    if($row[0] == $message)
	    	$check = true;    
    }
    if($check)
    	echo "error";
    else{
    	$result_add_in_bd = mysqli_query($mysqli, "INSERT INTO todo (message) VALUES ('$message')");
		echo "<div align='center'><label>".$message."</label><input type='submit' onсlick='deleteNote(this.id)' value='-' id='".$message."'></div>";
    }
?>
