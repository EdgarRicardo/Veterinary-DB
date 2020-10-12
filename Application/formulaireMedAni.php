<HTML>
<HEAD>
	<TITLE>Consultation des Clients</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
</HEAD>
<BODY>
<CENTER><H2>Quantite de medicament suministre à une animal</H2>
<?php
include ('connexion.php');
$vSql = 'select * from animal';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

?>
<DIV>
<FORM METHOD="POST" ACTION="medicamentAnimal.php">
  Animal<BR/><select name="animal">
			<?php
			while($row = $vSt->fetch(PDO::FETCH_ASSOC))
			 {
			 printf("<option value=\"%d\">%d - %s</option>", $row['codeanimal'], $row['codeanimal'], $row['nom']);
			 }
			?>
	</select><BR/><BR/>
  <INPUT TYPE="SUBMIT" VALUE="Valider">
  &nbsp;&nbsp;&nbsp;<INPUT TYPE="RESET" VALUE="Effacer"><BR/>
</FORM>
</DIV>
</CENTER>
</BODY>
</HTML>
