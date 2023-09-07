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
	
	$utente = "SELECT * FROM Utenti WHERE Codice_Utente=".$cod_ut;
	$ut_result = $connessione->query($utente)->fetch_assoc();
	
	$sql = "SELECT Cod_Libro, Titolo, Data
		FROM Prestiti JOIN Utenti JOIN Libri
		WHERE Prestiti.Cod_Utente = Utenti.Codice_Utente
		  AND Prestiti.Cod_Libro = Libri.Codice_Libro
		  AND Utenti.Codice_Utente =" . $cod_ut .
		" ORDER BY Data DESC";
		
	
		
	echo '<div align="center">
	<font size=5> Prestiti di <b>' . $ut_result['Cognome'] . ' ' . $ut_result['Nome'] . '</b></font> <br> <br> <br>';
	if($result = $connessione->query($sql)){
		if($result->num_rows > 0){
			echo '<table border="1" cellspacing="1">
			<thead>
			<tr>
			<th> Data </th>
			<th> Codice Libro</th>
			<th> Titolo </th>
			</tr> </thead>
			<tbody>';
			while($row = $result->fetch_assoc()){
				echo '
				<tr>
				<td align=center>' . $row['Data'] . '</td>
				<td align=center>' . $row['Cod_Libro'] . '</td>
				<td align=center>' . $row['Titolo'] . '</td>
				
				</tr>' ;
			}
			echo '</table>';
		}
		else {
			echo "Nessun prestito trovato";
		}
	}
	else {
		echo "Errore nella query: " . $connessione->error;
	}
	
	echo ' 
	<br><br><br>
	<a href= "http://localhost/test/progetto.php"><font size=5><b>Start</b></font></a> <br>
	</div>
	'
	;
	$connessione->close();
	

?>
