<?php

	$host = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "biblioteca";

	$connessione = new mysqli($host, $user, $password, $database);
	
	$utenti = "SELECT * FROM Utenti ORDER BY Cognome, Nome";
	
	
	echo '
	<head>
		<title>Lista_Prestiti_Utente</title>
	</head>
	
	<body>
		<div align="center"> <font size=10> <b>Ricerca Prestiti</b> </font> <br> <br> <br>
			<form name="myform" action="progetto_lista_handle.php" method="POST">
			<label for="utente">Utente:</label><br><br>
  				<select id="utente" name="utente">';
  				if($result = $connessione->query($utenti)){
					if($result->num_rows > 0){
						while($row = $result->fetch_assoc()){
							echo '
							<option value=' . $row['Codice_Utente'] . '>' . $row['Codice_Utente'] . ' ' . $row['Cognome'] . ' ' . $row['Nome'] .  '</option>'
							;
						}
					}
				}
				echo '
  				
  				</select> <br>
				<br><br>
				<input type="submit" value="Invia"> 
				<br><br><br><br><br>
				
				<a href= "http://localhost/test/progetto.php"><font size=5><b>Start</b></font></a> <br>
			</div>
		</form>
		
	</body>
	';
	$connessione->close();
		

?>
