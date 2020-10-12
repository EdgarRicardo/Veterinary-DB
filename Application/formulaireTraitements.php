<HTML>
<HEAD>
	<TITLE>Consultation des Clients</TITLE>
	<META name="type_contenu"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<LINK rel="stylesheet" href="Styles.css">
	<script src="newMedicament.js"></script>
</HEAD>
<BODY>
<CENTER><H2>Consultation des Clients</H2>
<?php
include ('connexion.php');
$vSql = 'select * from Veterinaires';
$vSql1 = 'select * from Animal';
$vSt = $vConn->prepare($vSql);
$vSt->execute();

$vSt1 = $vConn->prepare($vSql1);
$vSt1->execute();

$vSqlm = 'select * from Medicaments';
$vStm = $vConn->prepare($vSqlm);
$vStm->execute();
?>
<DIV>
<FORM METHOD="POST" ACTION="insertTraitements.php">
  Vétérinaire<BR/><select name="veterinaire" required>
			<?php
			while($row = $vSt->fetch(PDO::FETCH_ASSOC))
			 {
			 printf("<option value=\"%d\">%s %s</option>", $row['code'], $row['prenom'], $row['nom']);
			 }
			?>
	</select><BR/>

	Animal<BR/><select name="animal" required>
			<?php
			while($row2 = $vSt1->fetch(PDO::FETCH_ASSOC))
			 {
			 printf("<option value=\"%d\">%d - %s</option>", $row2['codeanimal'], $row2['codeanimal'], $row2['nom']);
			 }
			?>
	</select><BR/>
	<BR/>Date début<BR/><INPUT NAME="DN" TYPE="Date" required><BR/>
	Taille <BR/><input type="text" name="taille" id="taille" required><BR/>
	Poids <BR/><input type="text" name="poids" id="poids" required><BR/>
	Traitement
  <BR/>
	<input type="button" value="Add un medicament" onclick="ajouterMed()"><BR/><BR/>
	<select name="T1" id="T1" required>
		<option/>
			<?php
			while($row = $vStm->fetch(PDO::FETCH_ASSOC))
			 {
			 printf("<option value=\"%s\">%s</option>", $row['nom_molecule'], $row['nom_molecule']);
			 }
			?>
	</select> <input type="text" name="TT1" id="TT1" required>
	<input type="text" name="D1" id="D1" required>
	<BR/>
	<select name="T2" id="T2" hidden>
		<option/>
			<?php
			$vStm->execute();
			while($row = $vStm->fetch(PDO::FETCH_ASSOC))
			 {
			 printf("<option value=\"%s\">%s</option>", $row['nom_molecule'], $row['nom_molecule']);
			 }
			?>
	</select> <input type="text" name="TT2" id="TT2" hidden>
	<input type="text" name="D2" id="D2" hidden>
	<BR/>
	<select name="T3" id="T3" hidden>
		<option/>
			<?php
			$vStm->execute();
			while($row = $vStm->fetch(PDO::FETCH_ASSOC))
			 {
			 printf("<option value=\"%s\">%s</option>", $row['nom_molecule'], $row['nom_molecule']);
			 }
			?>
	</select> <input type="text" name="TT3" id="TT3" hidden>
	<input type="text" name="D3" id="D3" hidden>
	<BR/>
	<select name="T4" id="T4" hidden>
		<option/>
			<?php
			$vStm->execute();
			while($row = $vStm->fetch(PDO::FETCH_ASSOC))
			 {
			 printf("<option value=\"%s\">%s</option>", $row['nom_molecule'], $row['nom_molecule']);
			 }
			?>
	</select> <input type="text" name="TT4" id="TT4" hidden>
	<input type="text" name="D4" id="D4" hidden>
	<BR/>
	<select name="T5" id="T5" hidden>
		<option/>
			<?php
			$vStm->execute();
			while($row = $vStm->fetch(PDO::FETCH_ASSOC))
			 {
			 printf("<option value=\"%s\">%s</option>", $row['nom_molecule'], $row['nom_molecule']);
			 }
			?>
	</select> <input type="text" name="TT5" id="TT5" hidden>
	<input type="text" name="D5" id="D5" hidden>

  <BR/><BR/>
  <INPUT TYPE="SUBMIT" VALUE="Valider">
  &nbsp;&nbsp;&nbsp;<INPUT TYPE="RESET" VALUE="Effacer"><BR/>
</FORM>
</DIV>
</CENTER>
</BODY>
</HTML>
