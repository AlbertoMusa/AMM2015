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
				<div id="titolo">I tuoi corsi</div>
<?php		   
			      if(IsSet($_SESSION['User']))
				 {						
					$Connessione=mysql_connect("localhost","root","davide");
					$DataBase=mysql_select_DB("amm15_musaAlberto");
					$app=$_SESSION['User'];
					$Query="SELECT C.Cod,C.Titolo,C.Data,C.Anteprima 
							FROM Corso as C,Partecipa as P
							WHERE C.Cod=P.Cod AND P.Nome='$app' 
							ORDER BY C.Data desc;";
					$ExQuery=mysql_query($Query);
					if(mysql_num_rows($ExQuery)==0)
					{
						echo"<div id='corso'>non sei iscritto a nessun corso al momento</div>";
					}
					else{
						for ($i=0;$i<mysql_num_rows($ExQuery);$i++)
						{
							$Data=mysql_fetch_array($ExQuery);
							echo"<div id='corso'>";
							echo"<div id='img_corso'><img src='../images/stemma.png'  width='40' height='40'></div>";
							if(IsSet($_SESSION['User']))
								echo"<b style='margin-right:20px;'>Cod:$Data[0] </b>";
							echo "<b style='margin-right:10px;'><a href=descrizionecorso.php?CodS=$Data[0]>$Data[1]</a></b> dal $Data[2]<br>$Data[3]";
							echo"</div>";
						}
					}
					mysql_close($Connessione);  
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