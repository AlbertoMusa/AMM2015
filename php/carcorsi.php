<?php
session_start();
?>
<html>
	<head>
		<title>Agenzia Formativa ERCF :: Corsi Professionali in Sardegna</title>
		<link href="../css/stile.css" rel="stylesheet" type="text/css">
	</head>
	<body>
<?php include("intestazione.html");?>
	<div id="base">
<?php include("menu.php");?>		
		<div id="base_contenuto">
				
			<div id="info">
				<div id="contenuto">		
				<div id="titolo">Carica Corso</div>
<?php		   
			      if(IsSet($_SESSION['User']))
				 {						
						echo"<form action='inscorso.php' method='post'>";echo"<table>";
						echo"<tr>";
						echo"<td id='rdx'><b>Titolo:</b></td><td><Input type='text' maxlength='100' size='70' name='Titolo'></td>";
						echo"</tr><tr>";
						echo"<td id='rdx'><b>Sedi:</b></td><td>";
						$Connessione=mysql_connect("localhost","musaAlberto","stambecco7280");
						$DataBase=mysql_select_DB("amm15_musaAlberto");
						$Query="select ID,Citta from Sede ORDER BY Citta;";
						$ExQuery=mysql_query($Query);
						for ($i=0;$i<mysql_num_rows($ExQuery);$i++)
						{
							$Data=mysql_fetch_array($ExQuery);
							echo "<input type=checkbox name='$Data[0]' value='$Data[0]'>$Data[1]<br>";
						}
						mysql_close($Connessione);   
						echo"</td>";
						echo"</tr><tr>";	
						echo"<td id='rdx'><b>Tipo:</b></td><td>
						<input type=radio name='Tipo' value='Interno' checked>Interno
						<input type=radio name='Tipo' value='Autofinanziato'>Autofinanziato
						<input type=radio name='Tipo' value='Formazione Professionale'>Formazione Professionale</td>";
						echo"</tr><tr>";	
						echo"<td id='rdx'><b>Costo**:</b></td><td><Input type='text' name='Costo' maxlength='20' size='20'></td>";
						echo"</tr><tr>";						
						echo"<td id='rdx'><b>Anteprima:</b></td><td><textarea  id='car' name='Anteprima' maxlength='200' style='height:80;'></textarea></td>";
						echo"</tr><tr>";
						echo"<td id='rdx'><b>Programma:</b></td><td><textarea id='car' name='Programma' maxlength='1000' style='height:300;'></textarea></td>";
						echo"</tr><tr>";
						echo"<td id='rdx'><b>Obbiettivi*:</b></td><td><textarea id='car' name='Obbiettivi' maxlength='700' style='height:200;'></textarea></td>";
						echo"</tr><tr>";
						echo"<td id='rdx'><b>Svolgimento*:</b></td><td><textarea id='car' name='Svolgimento' maxlength='700' style='height:200;'></textarea></td>";
						echo"</tr><tr>";
						echo"<td id='rdx'><b>Destinatari*:</b></td><td><textarea id='car' name='Destinatari' maxlength='300' style='height:100;'></textarea></td>";
						echo"</tr><tr>";
						echo"<td id='rdx'><b>Titoli Rilasciati*:</b></td><td><textarea id='car' name='Titoli' maxlength='200' style='height:80;'></textarea></td>";
						echo"</tr><tr>";
						echo"<td id='rdx'><b>Modalita' D'Iscrizione*:</b></td><td><textarea id='car' maxlength='200' name='Iscrizione' style='height:80;'></textarea></td>";
						echo"</tr><tr>";
						echo"<td id='rdx'><b>Durata*:</b></td><td><input type='text' name='Durata' maxlength='10' size='20'></td>";
						echo"</tr><tr>";
						echo"<td id='rdx'><b>Data Inizio:</b><br>(aaaa/mm/gg) </td><td><input type='text' name='Data' maxlength='10'></td>";
						echo"</tr><tr>";
						echo"<td id='rdx'><b>Data Fine:</b><br>(aaaa/mm/gg) </td><td><input type='text' name='DataF' maxlength='10'></td>";
						echo"</tr><tr>";
						echo"<td id='rdx'><b>Orari*:</b></td><td><input type='text' name='Orari'></td>";
						echo"</tr><tr>";
						echo"<td><input type='reset' value='Cancella'><input type='submit' value='Carica'></td>";
						echo"</tr>";
						echo"</table></form>";
						echo"* campi faccoltativi<br>**solo se Autofinanziato/Formazione Professionale";
				 }	 
				 else 
				 {
					echo"<div id='corso'>Area Riservata<br>Si prega di convalidare la sessione</div>";		
					header("Refresh:5;URL=login.php");					 
		         } 
?>
				</div>
			</div>
		</div>		
	</div>
<?php include("fondo.html");?>
	</body>
</html>
