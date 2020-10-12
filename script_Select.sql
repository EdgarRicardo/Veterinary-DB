--See all the tables

SELECT * FROM vPersonne;
SELECT * FROM vPersonnel;
SELECT * FROM Taille_Poids ;
SELECT * FROM DosageMed ;
SELECT * FROM Medicament_Espece ;
SELECT * FROM Traitements ;
SELECT * FROM Veterinaires ;
SELECT * FROM Assistants ;
SELECT * FROM Animal ;
SELECT * FROM Especes;
SELECT * FROM ClasseEspeces ;
SELECT * FROM Clients ;
SELECT * FROM Medicaments ;


--Rêquetes
SELECT DM.nom_molecule, SUM(DM.duree * DM.doseXjour) AS MedicamentAnimal FROM
DosageMed DM, Traitements T WHERE DM.code_traitement = T.num_traitement AND
T.code_animal = 1 GROUP BY DM.nom_molecule;

SELECT SUM(duree * doseXjour) AS UseTotale FROM DosageMed DM WHERE nom_molecule = 'Paracetamol';

SELECT A.espece, AVG(TP.taille) AS moyenne_Taille, AVG(TP.poids) AS moyenne_Poids FROM Animal A, Taille_Poids TP WHERE
TP.code_animal = A.codeanimal AND A.espece = 'Chien' GROUP BY A.espece;

/*
Usage Global
SELECT DM.nom_molecule, SUM(DM.duree * DM.doseXjour) AS MedicamentAnimal FROM
DosageMed DM, Traitements T WHERE DM.code_traitement = T.num_traitement AND
T.code_animal = $code_animal GROUP BY DM.nom_molecule;

SELECT SUM(duree * doseXjour) AS UseTotale FROM DosageMed DM WHERE nom_molecule = $nom_molecule;

SELECT A.espece, AVG(TP.taille) AS moyenne_Taille, AVG(TP.poids) AS moyenne_Poids FROM Animal A, Taille_Poids TP WHERE
TP.code_animal = A.codeanimal AND A.espece = $espece GROUP BY A.espece;
*/
