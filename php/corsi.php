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
						$Connessione=mysql_connect("localhost","musaAlberto","stambecco7280");
						$DataBase=mysql_select_DB("amm15_musaAlberto");
						$data=(date("y-m-d"));
						$Q=$_GET['Sede'];
						$Query="SELECT C.Cod,C.Titolo,C.Data,C.Anteprima 
								FROM Corso as C,Sede as S,Abilita as A 
								WHERE S.Citta='$Q' AND S.ID=A.ID AND A.Cod=C.Cod AND C.Tipo='Interno' AND C.DataF>=current_date()
								ORDER BY C.Data desc;";
						$ExQuery=mysql_query($Query);
						echo"<div id='titolo'> Corsi della sede di $Q </div>";
						if(mysql_num_rows($ExQuery) == 0)
						{
							echo"<div id='corso'>non ci sono al momento corsi attivi in questa sede</div>";
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
