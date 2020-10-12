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
$espece = $_POST["espece"];
$vSql = 'SELECT A.espece, AVG(TP.taille) AS moyenne_Taille, AVG(TP.poids) AS moyenne_Poids FROM Animal A, Taille_Poids TP WHERE
TP.code_animal = A.codeanimal AND A.espece ='.'\''.$espece.'\''.'GROUP BY A.espece';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>Taille moyenne</TH><TH>Poids moyenne</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_ASSOC))
		{
		printf("<TR><TD>%s</TD><TD>%s</TD></TR>",$row['moyenne_taille'],$row['moyenne_poids']);
		}
	echo "</TABLE>";


?>
</CENTER>
</BODY>
</HTML>
