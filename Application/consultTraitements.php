<HTML>
<HEAD>
	<TITLE>Consultation des Traitements</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
</HEAD>
<BODY>
<CENTER><H2>Consultation des Traitements</H2>
<?php
include ('connexion.php');

$vSql = 'select * from Traitements';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>NUM_TRAITEMENT</TH><TH>VETERINAIRE</TH><TH>DATE_DEBUT</TH><TH>CODE_ANIMAL</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_ASSOC))
		{
		printf("<TR><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>",$row['num_traitement'],$row['veterinaire'],$row['date_debut'],$row['code_animal']);
		}
	echo "</TABLE>";


?>
</CENTER>
</BODY>
</HTML>
