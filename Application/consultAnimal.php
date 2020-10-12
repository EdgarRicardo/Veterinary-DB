<HTML>
<HEAD>
	<TITLE>Consultation des Animaux</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
</HEAD>
<BODY>
<CENTER><H2>Consultation des Animaux</H2>
<?php
include ('connexion.php');

$vSql = 'select * from Animal';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>CODE</TH><TH>PROPRIETAIRE</TH><TH>ESPECE</TH><TH>NOM</TH><TH>DATE_NAISSANCE</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_ASSOC))
		{
		printf("<TR><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>",$row['codeanimal'],$row['propietaire'],$row['espece'],$row['nom'],$row['date_naissance']);
		}
	echo "</TABLE>";


?>
</CENTER>
</BODY>
</HTML>
