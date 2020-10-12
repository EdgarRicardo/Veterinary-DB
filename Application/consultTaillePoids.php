<HTML>
<HEAD>
	<TITLE>Consultation des tailles et poids des animaux</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
</HEAD>
<BODY>
<CENTER><H2>Consultation des tailles et poids des animaux</H2>
<?php
include ('connexion.php');

$vSql = 'select * from Taille_Poids';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>CODE_ANIMAL</TH><TH>DATEC</TH><TH>TAILLE</TH><TH>POIDS</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_ASSOC))
		{
		printf("<TR><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>",$row['code_animal'],$row['datec'],$row['taille'],$row['poids']);
		}
	echo "</TABLE>";


?>
</CENTER>
</BODY>
</HTML>
