<HTML>
<HEAD>
	<TITLE>Consultation des Dosage</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
</HEAD>
<BODY>
<CENTER><H2>Consultation des Dosage</H2>
<?php
include ('connexion.php');
$nom_molecule = $_POST["medicament"];
$vSql = 'SELECT SUM(duree * doseXjour) AS UseTotale FROM DosageMed DM WHERE nom_molecule = '.'\''.$nom_molecule.'\'';
$vSt = $vConn->prepare($vSql);
$vSt->execute();
	printf("<TABLE><TR><TH>Usage Totale %s </TH></TR>", $nom_molecule);
	while($row = $vSt->fetch(PDO::FETCH_ASSOC))
		{
		printf("<TR><TD>%s</TD></TR>",$row['usetotale']);
		}
	echo "</TABLE>";


?>
</CENTER>
</BODY>
</HTML>
