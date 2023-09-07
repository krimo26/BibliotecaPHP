<?php

	$host = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "biblioteca";

	$connessione = new mysqli($host, $user, $password, $database);
	
	if($connessione == false){
		die("Errore di connessione: " . $connessione->connect_error);
	}	
	
	$cod_li = $_REQUEST['libro'];
	
	$sql = "DELETE FROM Libri WHERE Codice_Libro=" . $cod_li;
	$tot = "DELETE FROM Prestiti WHERE Cod_Libro=" . $cod_li;
	
	echo '<div align="center">';
	if($connessione->query($sql) == true and $connessione->query($tot) == true){
		echo '<font face ="arial" size="5"><b>Libro rimosso correttamente</b> </font>';
	}
	else {
		echo "Errore nella rimozione del libro: " . $connessione->error;
	}
	
	echo ' 
	<br><br><br>
	<a href= "http://localhost/test/progetto.php"><font size=5><b>Start</b></font></a> <br>
	</div>
	';
	$connessione->close();
	

?>
