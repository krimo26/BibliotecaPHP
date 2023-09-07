<?php

	$host = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "biblioteca";

	$connessione = new mysqli($host, $user, $password, $database);
	
	if($connessione == false){
		die("Errore di connessione: " . $connessione->connect_error);
	}	
	
	$cod_li = $_REQUEST['cod_li'];
	$titolo = $_REQUEST['titolo'];
	$autore = $_REQUEST['autore'];
	$editore = $_REQUEST['editore'];
	$scaffale = $_REQUEST['scaffale'];
	$cod_gen = $_REQUEST['genere'];
	$num_pag = $_REQUEST['num_pag'];
	$anno_pub = $_REQUEST['anno_pub'];
	
	$sql = "INSERT INTO Libri (Codice_Libro, Titolo, Autore, Editore, Scaffale, Cod_Genere, Num_Pagine, Anno_Pub)
		VALUES ('$cod_li','$titolo','$autore','$editore','$scaffale','$cod_gen','$num_pag','$anno_pub')";
		
	echo '<div align="center">';
	
	if($connessione->query($sql) == true){
		echo '<font face ="arial" size="5"><b>Libro aggiunto correttamente</b> </font>';
	}
	else {
		echo "Errore nell'inserimento del libro: " . $connessione->error;
	}
	
	echo ' 
	<br><br><br>
	<a href= "http://localhost/test/progetto.php"><font size=5><b>Start</b></font></a> <br>
	</div>
	'
	;
	$connessione->close();
		

?>
