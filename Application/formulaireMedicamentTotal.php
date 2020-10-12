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
$vSql = 'select * from medicaments';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

?>
<DIV>
<FORM METHOD="POST" ACTION="requeteMedicamentTotal.php">
  Medicament<BR/><select name="medicament">
			<?php
			while($row = $vSt->fetch(PDO::FETCH_ASSOC))
			 {
			 printf("<option value=%s>%s</option>", $row['nom_molecule'],$row['nom_molecule']);
			 }
			?>
	</select><BR/>
	<BR/>
  <INPUT TYPE="SUBMIT" VALUE="Valider">
  &nbsp;&nbsp;&nbsp;<INPUT TYPE="RESET" VALUE="Effacer"><BR/>
</FORM>
</DIV>
</CENTER>
</BODY>
</HTML>
