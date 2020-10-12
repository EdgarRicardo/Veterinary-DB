<HTML>
<HEAD>
	<TITLE>Consultation des medicments par espèce</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
</HEAD>
<BODY>
<CENTER><H2>Consultation des médicaments par espèces</H2>
<?php
include ('connexion.php');

$vSql = 'select * from Medicament_Espece';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>NOM</TH><TH>NOM_ESPECE</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_ASSOC))
		{
		printf("<TR><TD>%s</TD><TD>%s</TD></TR>",$row['nom_molecule'],$row['nom_espece']);
		}
	echo "</TABLE>";

?>
</CENTER>
</BODY>
</HTML>
