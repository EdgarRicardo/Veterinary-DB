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

$vSql = 'select * from DosageMed';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>CODE_TRAITEMENT</TH><TH>NOM_MOLECULE</TH><TH>DUREE</TH><TH>DOSEXJOUR</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_ASSOC))
		{
		printf("<TR><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>",$row['code_traitement'],$row['nom_molecule'],$row['duree'],$row['dosexjour']);
		}
	echo "</TABLE>";


?>
</CENTER>
</BODY>
</HTML>
