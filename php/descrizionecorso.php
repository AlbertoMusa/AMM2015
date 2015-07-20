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
<?php
						$Connessione=mysql_connect("localhost","root","davide");
						$DataBase=mysql_select_DB("amm15_musaAlberto");
						$Q=$_GET['CodS'];
						$Query="SELECT C.Titolo,C.Tipo,C.Obiettivi,C.Programma,C.Svolgimento,C.Titoli,C.Iscrizione,C.Destinatari,C.Data,C.Orari,C.Costo
								FROM Corso as C,Abilita as A
								WHERE C.Cod='$Q';";
						$ExQuery=mysql_query($Query);
						$Data=mysql_fetch_array($ExQuery);
						echo"<div id='titolo'> $Data[0] </div>";
						echo"<table id='desc'>";
						for($j=1; $j<mysql_num_fields($ExQuery); $j++)
						{
							echo"<tr>";
								$NDa=mysql_field_name($ExQuery,$j);
								if(!($Data[$j]===NULL))
								{
									echo "<td id='csx'><b>$NDa:</b></td><td id='cdx'>$Data[$j]</td>";
								}
							echo"</tr>";
						}
						$app=$Data[8];
						
						echo"<tr>";
						echo "<td id='csx'><b>Sedi:</b></td>";
						$Query="SELECT S.Citta FROM Sede as S,abilita as A,Corso as C WHERE C.Cod='$Q' AND C.Cod=A.Cod AND A.ID=S.ID;";
						$ExQuery=mysql_query($Query);
						echo "<td id='cdx'>";
						if(mysql_num_rows($ExQuery)>0){
						for($j=0; $j<mysql_num_rows($ExQuery); $j++)
						{
						$Data=mysql_fetch_array($ExQuery);
						echo "$Data[0], ";
						}
						}
						else{
						echo"il corso non e' al momento attivo su nessuna sede";
						}
						echo "</td>";
						echo"</tr>";
						
						if(IsSet($_SESSION['User']) && !($_SESSION['Liv']))
						{
							$app=$_SESSION['User'];
							echo"<tr>";
							echo "<td id='csx'><b>Operazione:</b></td>";
							echo "<td id='cdx'>";
							$Query="SELECT Cod FROM Partecipa WHERE Cod='$Q' AND Nome='$app';";
							$ExQuery=mysql_query($Query);
							if(mysql_num_rows($ExQuery)==0)
							{
								echo "<a href=prenota.php?Op=$Q>Prenota</a>";
							}
							else{
								echo "<a href=elprenota.php?Op=$Q>Cancella prenotazione</a>";
							}
							echo "</td>";
							echo"</tr>";
						}
						
						echo"</table>";
						mysql_close($Connessione); 
?>
				</div>
			</div>	
		</div>		
	</div>
<?php include("fondo.html");?>
	</body>
</html>