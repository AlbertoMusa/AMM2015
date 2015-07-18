			<div id="menu">
			<ul>
				<li class="menu"><a>Sedi Attive</a>
					<ul class="submenu" id="submenu-1">
<?php
						$Connessione=mysql_connect("localhost","root","davide");
						$DataBase=mysql_select_DB("Ercf");
						$Query="SELECT Citta FROM Sede ORDER BY Citta;";
						$ExQuery=mysql_query($Query);
						for ($i=0;$i<mysql_num_rows($ExQuery);$i++)
						{
							$Data=mysql_fetch_array($ExQuery);
							echo "<li><a href=corsi.php?Sede=$Data[0]>$Data[0]</a></li>";
						}
						mysql_close($Connessione);   
?>
					</ul>
				</li>
				<li><a href="corsi svolti.php">Corsi terminati</a>
				</li>
				
<?php
					
				 if(IsSet($_SESSION['User']))
				 {
					$app=$_SESSION['User'];
					echo"<li class='menu'><a> $app </a>";
					if($_SESSION['Liv'])
					{
						echo"<ul class='submenu' id='submenu-2'>";
						echo"<li><a href=carcorsi.php>Carica Corso</a></li>";
						echo"<li><a href=cancorsi.php>Elimina Corso</a></li>";
						echo"</ul>";
					}
					else{
						echo"<ul class='submenu' id='submenu-2'>";
						echo"<li><a href=tuoicorsi.php>I tuoi corsi</a></li>";
						echo"</ul>";
						
					}
					echo"</li>";
				}
?>				
			</ul>
			<div id='contatti' style='width:240;margin:30px 0px 0px 0px;'>
			<center>
			<div style='width:240;margin-bottom:10px;'>
				<a href="http://www.regione.sardegna.it/"><img src="../images/sardegna.jpg" style='max-width:120px;'></a>
			</div>
			<div style='width:240;margin-bottom:10px;'>
				<a href="http://www.lavoro.gov.it/Lavoro"><img src="../images/ministero.gif" style='max-width:120px;'></a>
			</div>
			<div style='width:240;margin-bottom:10px;'>
				<a href="http://europa.eu/index_it.htm"><img src="../images/unione europea.jpg" style='max-width:120px;'></a>
			</div>
			</center>
			</div>
			</div>