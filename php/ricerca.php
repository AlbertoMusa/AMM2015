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
		$K=$_GET['key'];
		$Query="SELECT C.Cod,C.Titolo,C.Data,C.Anteprima
		FROM Corso as C
		WHERE C.Titolo like '%$K%'
		OR C.Programma like '%$K%'
		OR C.Obiettivi like '%$K%'
		OR C.Svolgimento like '%$K%'
		OR C.Destinatari like '%$K%'
		OR C.Titoli like '%$K%'
		OR C.Durata like '%$K%'
		OR C.Costo like '%$K%'
		OR C.Iscrizione like '%$K%'
		ORDER BY C.Data desc;";
		$ExQuery=mysql_query($Query);
		echo"<div id='titolo'> Ricerca per    '$K' </div>";
		if(mysql_num_rows($ExQuery)==0)
		{
		echo"<div id='corso'>nessun risultato trovato</div>";
		}
		else{
		for ($i=0;$i<mysql_num_rows($ExQuery);$i++)
		{
		$Data=mysql_fetch_array($ExQuery);
		echo"<div id='corso'>";
		echo"<div id='img_corso'><img src='../images/stemma.png'  width='40' height='40'></div>";
		if(IsSet($_SESSION['User']) && ($_SESSION['Liv']))
			echo"<b style='margin-right:20px;'>Cod:$Data[0] </b>";
		echo "<b style='margin-right:10px;'><a href=descrizionecorso.php?CodS=$Data[0]>$Data[1]</a></b> dal $Data[2]<br>$Data[3]";
		echo"</div>";
		}
		}
		mysql_close($Connessione); 
?>
				</div>
			</div>
		</div>		
	</div>
<?php include("fondo.html");?>
	</body>
</html>