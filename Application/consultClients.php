<HTML>
<HEAD>
	<TITLE>Consultation des Clients</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
</HEAD>
<BODY>
<CENTER><H2>Consultation des Clients</H2>
<?php
include ('connexion.php');
$vSql = 'select * from Clients';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>CODE</TH><TH>NOM</TH><TH>PRENOM</TH><TH>DATE_NAISSANCE</TH><TH>ADRESSE</TH><TH>NUM_TEL</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_ASSOC))
		{
		printf("<TR><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>",$row['code'],$row['nom'],$row['prenom'],$row['date_naissance'],$row['adresse'],$row['num_tel']);
		}
	echo "</TABLE>";


?>
</CENTER>
</BODY>
</HTML>
