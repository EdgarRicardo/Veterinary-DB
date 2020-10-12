<HTML>
<HEAD>
	<TITLE>Consultations des médicaments</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
</HEAD>
<BODY>
<CENTER><H2>Consultation des médicaments</H2>
<?php
include ('connexion.php');

$vSql = 'select * from Medicaments';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>NOM_MOLECULE</TH><TH>TYPE_EFFET</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_ASSOC))
		{
		printf("<TR><TD>%s</TD><TD>%s</TD></TR>",$row['nom_molecule'],$row['effet']);
		}
	echo "</TABLE>";


?>
</CENTER>
</BODY>
</HTML>
