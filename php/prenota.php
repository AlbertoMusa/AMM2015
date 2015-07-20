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
					<div id="titolo">Prenotazione</div>
<?php
			   
			      if(IsSet($_SESSION['User']))
				 {						
					$Connessione=mysql_connect("localhost","musaAlberto","stambecco7280");
					$DataBase=mysql_select_DB("amm15_musaAlberto");
					$Q=$_GET['Op'];
					$app=$_SESSION['User'];
					$QueryIns="insert into partecipa values('$app','$Q');";
					$ExIns=mysql_query($QueryIns);
					echo"<div id='corso'>Operazione completata correttamente</div>";			
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
