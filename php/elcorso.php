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
					$Connessione=mysql_connect("localhost","root","davide");
					$DataBase=mysql_select_DB("amm15_musaAlberto");
					$Query="SELECT Cod FROM Corso WHERE Cod='".$_POST['Cod2']."';";
					$ExQuery=mysql_query($Query);
					if((($_POST['Cod1'])==($_POST['Cod2']))&&(isset($_POST['Cod1']))&&(isset($_POST['Cod2']))&&(mysql_num_rows($ExQuery)>0))
					{
					$Query="DELETE FROM Abilita WHERE Cod='".$_POST['Cod1']."';";
					$ExQuery=mysql_query($Query);
					$Query="DELETE FROM Partecipa WHERE Cod='".$_POST['Cod1']."';";
					$ExQuery=mysql_query($Query);
					$Query="DELETE FROM Corso WHERE Cod='".$_POST['Cod1']."';";
					$ExQuery=mysql_query($Query);
					echo"<div id='corso'>Operazione completata correttamente</div>";			
					}else{
					echo"<div id='corso'>I parametri inseriti non sono validi</div>";
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