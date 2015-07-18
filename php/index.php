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
		
		
		<div id="ultimi_corsi">
			<div id="titolo">
				NEWS
			</div>
			<?php
				$Connessione=mysql_connect("localhost","root","davide");
				$DataBase=mysql_select_DB("Ercf");
				$Query="SELECT C.Cod,C.Titolo,C.Data,C.DataF,S.Citta
						FROM Corso as C,Abilita as A, Sede as S
						WHERE C.Cod=A.Cod AND A.ID=S.ID
						GROUP BY C.Cod
						ORDER BY C.Cod desc;";
				$ExQuery=mysql_query($Query);
				for ($i=0;$i<3;$i++)
					{
						$Data=mysql_fetch_array($ExQuery);
						echo"<a href='descrizionecorso.php?CodS=$Data[0]'>";
						echo"<div id='ultimo_corso'>";
						echo"<div id='img_ultimo_corso'><img src='../images/icona.jpg'  width='120' height='120'></div>";
						echo"<center><b>$Data[1]</b></center><br>dal $Data[2]<br>al $Data[3]<br>nella sede di $Data[4]...";
						echo"</div></a>";
					}
				mysql_close($Connessione); 
			?>
		</div>
	
			<div id="info">
				<div id="contenuto_intero">
					<div id="titolo">
					E.R.C.F. per la tua Formazione Professionale
					</div>
					<center><img src="../images/img1.jpg"  width="450" height="296" style='border:4px solid orange;'></center>
					<div id="text_info">
					<p>Il mercato del lavoro è in continua evoluzione e adattarsi rapidamente al cambiamento è diventato fondamentale.
					Per questo l'Agenzia Formativa E.R.C.F. ti mette a disposizione tutti gli strumenti necessari ad acquisire i requisiti fondamentali
					per essere veramente competitivo.<br>
					Contattaci per rimanere aggiornato sulle nostre attività.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include("fondo.html");?>
	</body>
</html>