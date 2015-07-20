<?php
		session_start();
		$user=$_POST['usr'];
		$pass=$_POST['pas'];  	 
			 if(($user=="")||($pass==""))	 
			{ 
			
			}
			 else
			 {  			
				 $Connessione=mysql_connect("localhost","musaAlberto","stambecco7280");
				 mysql_select_DB("amm15_musaAlberto");
				 $Query="SELECT Nome, Priorita FROM Utente  WHERE Nome='$user' AND Password='$pass';";
				 $ExQuery=mysql_query($Query);
				 $Data=mysql_fetch_array($ExQuery);
				 if($Data)
				 {     
			      $_SESSION['User']=$Data[0];
				  $_SESSION['Liv']=$Data[1];
				  }
				mysql_close($connessione);
			 }
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
					<div id="titolo">Area Riservata</div>
<?php
			   
			      if(IsSet($_SESSION['User']))
				 {
				    $User=$_SESSION['User'];
					echo"<div id='corso'>Benvenuto $User</div>";		
				 }	 
				 else 
				 {
					echo"<div id='corso'>Utente o Password errati</div>";		
					header("Refresh: 10;URL=login.php");					 
		         }
				 
				 
?>
				</div>
			</div>
		</div>		
	</div>
<?php include("fondo.html");?>
	</body>
</html>
