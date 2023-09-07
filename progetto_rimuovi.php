<?php

	$host = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "biblioteca";

	$connessione = new mysqli($host, $user, $password, $database);
	
	$libri = "SELECT * FROM Libri ORDER BY Titolo";
	
	
	echo '
	<head>
		<title>Insersci_Libro</title>
	</head>
	
	<body>
		<div align="center"> <font size=10> <b>Rimuovi Libro</b> </font> <br> <br> <br>
			<form name="myform" action="progetto_rimuovi_handle.php" method="POST">
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
				<input type="submit" value="Invia"> 
				<br><br><br><br><br>
				
				<a href= "http://localhost/test/progetto.php"><font size=5><b>Start</b></font></a> <br>
			</div>
		</form>
	</body>
	';
	$connessione->close();
		

?>
