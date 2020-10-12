<HTML>
<HEAD>
	<TITLE>Consulter Classes Espèces</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
</HEAD>
<BODY>
<CENTER><H2>Consult des Classes Especes</H2>
<?php
include ('connexion.php');
$vSql = 'select * from ClasseEspeces';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>CLASSE</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_BOTH))
		{
		printf("<TR><TD>%s</TD></TR>",$row['classe']);
		}
	echo "</TABLE>";

?>
</CENTER>
</BODY>
</HTML>
