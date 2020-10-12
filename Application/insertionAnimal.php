<HTML>
<HEAD>
	<TITLE>Insertion</TITLE>
	<META name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
</HEAD>
<BODY>
<CENTER><H2>Validation de l'insertion du Animal</H2>
<?php
include ('connexion.php');
$prop = $_POST["propietaire"];
$espe = $_POST["espece"];
$nom = $_POST["nom"];
$date_naissance = $_POST["DN"];
$date = "TO_DATE("."'".$date_naissance."'".",'YYYY-MM-DD')";


$vSql="insert into animal (propietaire, espece, nom, date_naissance) values($prop,'$espe','$nom',$date)";

$vSt = $vConn->prepare($vSql);
if ($vSt->execute())
	{
   		echo "Tout a bien enregistré";
	}
	else {
    		echo "Erreur, try again";
	}
?>
</CENTER>
</BODY>
</HTML>
