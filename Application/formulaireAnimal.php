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
$vSql1 = 'select * from Especes';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

$vSt1 = $vConn->prepare($vSql1);
$vSt1->execute();
?>
<DIV>
<FORM METHOD="POST" ACTION="insertionAnimal.php">
  Propietaire<BR/><select name="propietaire" required>
			<?php
			while($row = $vSt->fetch(PDO::FETCH_ASSOC))
			 {
			 printf("<option value=\"%d\">%s %s</option>", $row['code'], $row['prenom'], $row['nom']);
			 }
			?>
	</select><BR/>

	Espece<BR/><select name="espece" required>
			<?php
			while($row2 = $vSt1->fetch(PDO::FETCH_ASSOC))
			 {
			 printf("<option value=\"%s\">%s</option>", $row2['nom_espece'], $row2['nom_espece']);
			 }
			?>
	</select><BR/>
  Nom<BR/><INPUT NAME="nom" required><BR/>
  Date de naissance<BR/><INPUT NAME="DN" TYPE="Date" required><BR/>
  <BR/>
  <INPUT TYPE="SUBMIT" VALUE="Valider">
  &nbsp;&nbsp;&nbsp;<INPUT TYPE="RESET" VALUE="Effacer"><BR/>
</FORM>
</DIV>
</CENTER>
</BODY>
</HTML>
