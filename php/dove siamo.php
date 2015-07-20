<?php
session_start();
?>
<html>
	<head>
		<title>Agenzia Formativa ERCF :: Corsi Professionali in Sardegna</title>
		<link href="../css/stile.css" rel="stylesheet" type="text/css">
		
		<script type="text/javascript" src="../lib/jquerymin.1.6.1.js"></script>
		<script type="text/javascript">
			jQuery(function(){
				jQuery('ul li').click(function(){

					var app = this.id;
					 jQuery.post('json.php',  {ID: app}, mostra_sede, 'json');
				});
			});

			function mostra_sede(data){
				jQuery(function(){
					jQuery('#text_sede').html(data);
				})
			}
		</script>
	</head>
	<body>
<?php include("intestazione.html");?>
	<div id="base">
<?php include("menu.php");?>
		<div id="base_contenuto">
		<div id="info">
<?php		
						echo "<div id='titolo'>Le Sedi</div>";
						$Connessione=mysql_connect("localhost","musaAlberto","stambecco7280");
						$DataBase=mysql_select_DB("amm15_musaAlberto");
						$Query="SELECT ID, Citta FROM Sede ORDER BY Citta;";
						$ExQuery=mysql_query($Query);
						echo "<div  id='sede'><ul>";
						while($Data = mysql_fetch_array($ExQuery)){
							echo "<li class='sedi' id='$Data[0]'>$Data[1] </li>";
						}
						echo "</ul></div>";
						echo "<div id='text_sede'></div>";
						mysql_close($Connessione);
?>
		</div>
		</div>
	</div>
   <?php include("fondo.html");?>
	</body>
</html>
