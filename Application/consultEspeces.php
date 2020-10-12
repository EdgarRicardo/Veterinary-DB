<HTML>
<HEAD>
	<TITLE>Consulter Espèces</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
</HEAD>
<BODY>
<CENTER><H2>Consultation des Espèces</H2>
<?php
include ('connexion.php');
$vSql = 'select * from Especes';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>Nom Espèce</TH><TH>Type Espèce</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_BOTH))
		{
		printf("<TR><TD>%s</TD><TD>%s</TD></TR>",$row['nom_espece'],$row['typeespece']);
		}
	echo "</TABLE>";

?>
</CENTER>
</BODY>
</HTML>
