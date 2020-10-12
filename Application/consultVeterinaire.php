<HTML>
<HEAD>
	<TITLE>Consultation des Vétérinaires</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
</HEAD>
<BODY>
<CENTER><H2>Consultation des Vétérinaires</H2>
<?php
include ('connexion.php');

$vSql = 'select * from Veterinaires';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>CODE</TH><TH>NOM</TH><TH>PRENOM</TH><TH>DATE_NAISSANCE</TH><TH>ADRESSE</TH><TH>NUM_TEL</TH><TH>SPECIALITE</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_BOTH))
		{
		printf("<TR><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>",$row['code'],$row['nom'],$row['prenom'],$row['date_naissance'],$row['adresse'],$row['num_tel'],$row['specialite']);
		}
	echo "</TABLE>";


?>
</CENTER>
</BODY>
</HTML>
