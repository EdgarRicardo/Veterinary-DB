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
$animal = $_POST["animal"];
$vSql = 'SELECT DM.nom_molecule, SUM(DM.duree * DM.doseXjour) AS MedicamentAnimal FROM
DosageMed DM, Traitements T WHERE DM.code_traitement = T.num_traitement AND
T.code_animal = '.$animal.'GROUP BY DM.nom_molecule';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

	echo "<TABLE><TR><TH>MOLECULE</TH><TH>QUANTITE</TH></TR>";
	while($row = $vSt->fetch(PDO::FETCH_ASSOC))
		{
		printf("<TR><TD>%s</TD><TD>%d</TD></TR>",$row['nom_molecule'],$row['medicamentanimal']);
		}
	echo "</TABLE>";


?>
</CENTER>
</BODY>
</HTML>
