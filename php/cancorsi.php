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
				<div id="titolo">Elimina Corso</div>
<?php		   
			      if(IsSet($_SESSION['User']))
				 {						
						echo"<form action='elcorso.php' method='post'>";echo"<table>";
						echo"<tr>";
						echo"<td style='width:200px;'><b>Codice Corso:</b></td><td><Input type='text' maxlength='20' size='20' name='Cod1'></td>";
						echo"</tr><tr>";		
						echo"<td style='width:50px;'><b>Verifica Codice:</b></td><td><Input type='text' name='Cod2' maxlength='20' size='20'></td>";
						echo"</tr><tr>";						
						echo"<td><input type='submit' value='Elimina Corso'></td>";
						echo"</tr>";
						echo"</table></form>";
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