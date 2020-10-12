<HTML>
<HEAD>
	<TITLE>Insertion</TITLE>
	<META name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
</HEAD>
<BODY>
<CENTER><H2>Validation de l'insertion du Client</H2>
<?php
include ('connexion.php');
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$date_naissance=$_POST["DN"];
$adresse=$_POST["adresse"];
$num_tel=$_POST["NT"];
$date = "TO_DATE("."'".$date_naissance."'".",'YYYY-MM-DD')";


$vSql="insert into clients (nom,prenom,date_naissance,adresse,num_tel) values('$nom','$prenom',$date,'$adresse',$num_tel)";

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
