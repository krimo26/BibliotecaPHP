<?php

	$host = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "biblioteca";

	$connessione = new mysqli($host, $user, $password, $database);
	
	$utenti = "SELECT * FROM Utenti ORDER BY Cognome, Nome";
	$libri = "SELECT * FROM Libri ORDER BY Titolo";
	
	echo '
	<head>
		<title>Registra_Prestito</title>
	</head>
	
	<body>
		<div align="center"> <font size=10> <b>Registra Prestito</b> </font> <br> <br> <br>
			<form name="myform" action="progetto_prestito_handle.php" method="POST">
  				<label for="utente">Utente:</label><br>
  				<select id="utente" name="utente">';
  				if($result = $connessione->query($utenti)){
					if($result->num_rows > 0){
						while($row = $result->fetch_assoc()){
							echo '
							<option value=' . $row['Codice_Utente'] . '>' . $row['Codice_Utente'] . ' ' . $row['Cognome'] . ' ' . $row['Nome<'] . '</option>'
							;
						}
					}
				}
				
				
  					
  				echo '
  				
  				</select> <br>
				<br><br>
				
				<label for="libro">Libro:</label><br>
  				<select id="libro" name="libro">';
  				if($result = $connessione->query($libri)){
					if($result->num_rows > 0){
						while($row = $result->fetch_assoc()){
							echo '
							<option value=' . $row['Codice_Libro'] . '>' . $row['Codice_Libro'] . ' ' . $row['Titolo'] . '</option>'
							;
						}
					}
				}
				
				
  					
  				echo '
  				
  				</select> <br>
				<br><br>
				
				<label for="data">Data:</label><br>
				<input type="date" id="data" name="data" value="2010-01-01"><br><br><br>
  				
  				<label for="durata">Durata:</label><br>
  				<input type="number" min=1 max=60 id="durata" name="durata" value="15"> <br><br><br>
  				
				
				<input type="submit" value="Invia"> 
				
				<br><br><br><br><br>
				
				<a href= "http://localhost/test/progetto.php"><font size=5><b>Start</b></font></a> <br>
			</div>
		</form>
	</body>
	';
	$connessione->close();


?>
