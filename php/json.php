<?php
	$Connessione=mysql_connect("localhost","root","davide");
	$DataBase=mysql_select_DB("amm15_musaAlberto");
	$app=$_POST['ID'];
	$Query="SELECT Citta, ID, Via, Provincia, Telefono FROM Sede WHERE ID=$app;";
	$ExQuery=mysql_query($Query);
	$Data = mysql_fetch_array($ExQuery);
	mysql_close($Connessione); 
	$json = "$Data[0], $Data[3] $Data[1]<br>$Data[2]<br> Tel: $Data[4]";
	echo json_encode($json);
?>
