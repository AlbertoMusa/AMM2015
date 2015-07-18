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
					<div id="titolo">Elimina Prenotazione</div>
<?php
			   
			     if(IsSet($_SESSION['User']))
				 {						
					$Connessione=mysql_connect("localhost","root","davide");
					$DataBase=mysql_select_DB("Ercf");
					$Q=$_GET['Op'];
					$app=$_SESSION['User'];
					$Query="DELETE FROM Partecipa WHERE Cod='$Q' AND Nome='$app';";
					$ExQuery=mysql_query($Query);
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