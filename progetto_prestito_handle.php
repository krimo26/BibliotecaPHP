<?php

	$host = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "biblioteca";

	$connessione = new mysqli($host, $user, $password, $database);
	
	if($connessione == false){
		die("Errore di connessione: " . $connessione->connect_error);
	}	
	
	$cod_ut = $_REQUEST['utente'];
	$cod_li = $_REQUEST['libro'];
	$data = $_REQUEST['data'];
	$durata = $_REQUEST['durata'];
	
	$sql = "INSERT INTO Prestiti (Cod_Utente, Data, Durata, Cod_Libro)
		VALUES ('$cod_ut','$data','$durata','$cod_li')";
	
	echo '<div align="center">';
	if($connessione->query($sql) == true){
		echo '<font face ="arial" size="5"><b>Prestito registrato con successo</b> </font>';
	}
	else {
		echo "Errore nella registrazione del prestito: " . $connessione->error;
	}
	
	echo ' 
	<br><br><br>
	<a href= "http://localhost/test/progetto.php"><font size=5><b>Start</b></font></a> <br>
	</div>
	'
	;
	$connessione->close();
	

?>
