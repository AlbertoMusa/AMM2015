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
				<div id="titolo">Carica Corso</div>
<?php		   
			      if(IsSet($_SESSION['User']))
				 {						
					$Connessione=mysql_connect("localhost","root","davide");
					$DataBase=mysql_select_DB("amm15_musaAlberto");
					if(($_POST['Titolo'])&&($_POST['Tipo'])&&($_POST['Data'])&&($_POST['DataF'])&&($_POST['Anteprima'])&&($_POST['Programma']))
					{
					$Query="insert into Corso values(''
					,'".$_POST['Titolo']."'
					,'".$_POST['Tipo']."'
					,'".$_POST['Data']."'
					,'".$_POST['DataF']."'
					,'".$_POST['Anteprima']."'
					,'".$_POST['Programma']."'";
if($_POST['Obbiettivi'])				
	$Query=$Query.",'".$_POST['Obbiettivi']."'";
else
	$Query=$Query.",NULL";
if($_POST['Svolgimento'])				
	$Query=$Query.",'".$_POST['Svolgimento']."'";
else
	$Query=$Query.",NULL";
if($_POST['Destinatari'])				
	$Query=$Query.",'".$_POST['Destinatari']."'";
else
	$Query=$Query.",NULL";
if($_POST['Durata'])				
	$Query=$Query.",'".$_POST['Durata']."'";
else
	$Query=$Query.",NULL";
if($_POST['Titoli'])				
	$Query=$Query.",'".$_POST['Titoli']."'";
else
	$Query=$Query.",NULL";
if($_POST['Iscrizione'])				
	$Query=$Query.",'".$_POST['Iscrizione']."'";
else
	$Query=$Query.",NULL";
if($_POST['Orari'])				
	$Query=$Query.",'".$_POST['Orari']."'";
else
	$Query=$Query.",NULL";
if(($_POST['Tipo'])&&(strcmp($_POST['Tipo'], "Interno")!=0))
	$Query=$Query.",'".$_POST['Costo']."');";
else
	$Query=$Query.",NULL);";
					
	$ExQuery=mysql_query($Query);

$Query2="SELECT Cod FROM Corso WHERE Titolo='".$_POST['Titolo']."' AND Tipo='".$_POST['Tipo']."' AND Data='".$_POST['Data']."' AND DataF='".$_POST['DataF']."';";
$ExQuery2=mysql_query($Query2);
$Data=mysql_fetch_array($ExQuery2);
$Cod=$Data[0];
$Query2="SELECT ID FROM Sede;";
$ExQuery2=mysql_query($Query2);
for($i=0;$i<mysql_num_rows($ExQuery2);$i++)
{
	$Data=mysql_fetch_array($ExQuery2);
	if(isset($_POST["$Data[0]"])){					
		$QueryIns="insert into abilita values('$Cod','$Data[0]');";
		$ExIns=mysql_query($QueryIns);
	} 
}	
					if (($ExQuery)&&($ExIns))
					echo "<div id='corso'>caricamento effetuato correttamente</div>";
					else
					echo "<div id='corso'>Caricamento Fallito</div>";
					}
					else
					{
					echo"<div id='corso'>Caricamento Fallito</div>";
					exit;
					}
				 }	 
				 else 
				 {
					echo"<div id='corso'>Area Riservata<br>Si prega di convalidare la sessione</div>";		
					header("Refresh:5;URL=login.php");					 
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