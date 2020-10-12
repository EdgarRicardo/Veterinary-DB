<HTML>
<HEAD>
	<TITLE>Insertion</TITLE>
	<META name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
</HEAD>
<BODY>
<CENTER><H2>Validation de l'insertion du Traitement</H2>
<?php
include ('connexion.php');
$med1 = $_POST["T1"];
$dog1 = $_POST["TT1"];
$dur1 = $_POST["D1"];
$med2 = $_POST["T2"];
$dog2 = $_POST["TT2"];
$dur2 = $_POST["D2"];
$med3 = $_POST["T3"];
$dog3 = $_POST["TT3"];
$dur3 = $_POST["D3"];
$med4 = $_POST["T4"];
$dog4 = $_POST["TT4"];
$dur4 = $_POST["D4"];
$med5 = $_POST["T5"];
$dog5 = $_POST["TT5"];
$dur5 = $_POST["D5"];
$animal = $_POST["animal"];
$veterinaire = $_POST["veterinaire"];
$date_naissance = $_POST["DN"];
$date = "TO_DATE("."'".$date_naissance."'".",'YYYY-MM-DD')";
$taille = $_POST["taille"];
$poids = $_POST["poids"];

$vSql="insert into Taille_Poids (code_animal,dateC,taille, poids) values ($animal,$date,$taille,$poids)";
$vSt = $vConn->prepare($vSql);
	if ($vSt->execute())
	{
   		echo "Taille et poids bien enregistrés";
	}
	else {
    		echo "Taille et poids erreur, try again";
	}

$vSql="insert into Traitements (veterinaire, date_debut, code_animal) values ($veterinaire,$date,$animal)";
echo $vSql;
$vSt = $vConn->prepare($vSql);
	if ($vSt->execute())
	{
   		echo "Traitement bien enregistré";
	}
	else {
    		echo "Traitement erreur, try again";
	}

	$vSqlT="SELECT max(num_traitement) AS dernier from Traitements";
	$vStT = $vConn->prepare($vSqlT);
	$vStT->execute();
	$codeT = 0;
	if($row = $vStT->fetch(PDO::FETCH_ASSOC)) $codeT = $row['dernier'];
	$vSqlD = "";
	printf("%s" ,$codeT);
	if($med5 != ""){
		$vSqlD = "INSERT INTO DosageMed VALUES($codeT,'$med1',$dur1,$dog1),($codeT,'$med2',$dur2,$dog2),($codeT,'$med3',$dur3,$dog3),($codeT,'$med4',$dur4,$dog4),($codeT,'$med5',$dur5,$dog5)";
	}
	elseif($med4 != ""){
		$vSqlD = "INSERT INTO DosageMed VALUES($codeT,'$med1',$dur1,$dog1),($codeT,'$med2',$dur2,$dog2),($codeT,'$med3',$dur3,$dog3),($codeT,'$med4',$dur4,$dog4)";
	}
	elseif($med3 != ""){
		$vSqlD = "INSERT INTO DosageMed VALUES($codeT,'$med1',$dur1,$dog1),($codeT,'$med2',$dur2,$dog2),($codeT,'$med3',$dur3,$dog3)";
	}
	elseif($med2 != ""){
		$vSqlD = "INSERT INTO DosageMed VALUES($codeT,'$med1',$dur1,$dog1),($codeT,'$med2',$dur2,$dog2)";
	}
	else{
		$vSqlD = "INSERT INTO DosageMed VALUES($codeT,'$med1',$dur1,$dog1)";
	}

	$vSqlD = $vConn->prepare($vSqlD);
	if ($vSqlD->execute())
	{
   		echo "Dosages bien enregistrés";
	}
	else {
    		echo "Dosages erreur, try again";
	}
?>
</CENTER>
</BODY>
</HTML>
