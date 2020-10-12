<?php
// Connexion à la base de données
$vHost = 'tuxa.sme.utc';
$vPort = '5432';
$vData = 'dbbdd0p105';
$vUser = 'bdd0p105';
$vPass = 'rC3VqcWw';
$vConn = new PDO("pgsql:host=$vHost;port=$vPort;dbname=$vData", $vUser, $vPass) or die ('Erreur lors de la connexion');
?>