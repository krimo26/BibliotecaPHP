<?php

	$host = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "biblioteca";

	$connessione = new mysqli($host, $user, $password, $database);
	
	$nome_generi = "SELECT * FROM Generi ORDER BY Codice_Genere";
	
	echo '
	<head>
		<title>Insersci_Libro</title>
	</head>
	
	<body>
		<div align="center"> <font size=10> <b>Inserisci Libro</b> </font> <br> <br> <br> <br>
		<form name="myform" action="progetto_inserisci_handle.php" method="POST">
				<label for="cod_li">Codice Libro:</label><br>
  				<input type="text" id="cod_li" name="cod_li" placeholder="Codice Libro" minlength ="6" maxlength="6" value="000000"><br><br>
				<label for="titolo">Titolo:</label><br>
				<input type="text" id="titolo" name="titolo" placeholder="Titolo" maxlength="50"><br><br>
				<label for="autore">Autore:</label><br>
  				<input type="text" id="autore" name="autore" placeholder="Autore" maxlength="50"><br><br>
  				<label for="editore">Editore:</label><br>
  				<input type="text" id="editore" name="editore" placeholder="Editore" maxlength="50"><br><br>
  				<label for="scaffale">Scaffale:</label><br>
  				<input type="number" min=1 id="scaffale" name="scaffale" value=1 max=999><br><br>
  				<label for="genere">Genere:</label><br>
  				<select id="genere" name="genere">';
  				if($result = $connessione->query($nome_generi)){
					if($result->num_rows > 0){
						while($row = $result->fetch_assoc()){
							echo '
							<option value=' . $row['Codice_Genere'] . '>' . $row['Nome'] . '</option>'
							;
						}
					}
				}
				
  					
  				echo '
  				</select> <br> <br>
  				<label for="num_pag">Numero Pagine:</label><br>
  				<input type="number" min=0 id="num_pag" name="num_pag" value=100><br><br>
  				<label for="anno_pub">Anno di Pubblicazione:</label><br>
  				<input type="number" id="anno_pub" name="anno_pub" value=1900 max="2022"><br><br>
				<input type="submit" value="Invia"> 
				<br><br><br><br><br>
				
				<a href= "http://localhost/test/progetto.php"><font size=5><b>Start</b></font></a> <br>
			</div>
		</form>
	</body>
	';
	$connessione->close();

?>
