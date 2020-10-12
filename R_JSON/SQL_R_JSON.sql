--Delete all the tables
DROP TABLE Taille_Poids ;
DROP TABLE Animal ;
DROP TABLE Especes;
DROP TABLE ClasseEspeces ;
DROP TABLE Clients;


--Create all the tables
CREATE TABLE ClasseEspeces(
classe varchar(10) PRIMARY KEY
);

CREATE TABLE Especes(
nom_espece varchar(10) PRIMARY KEY,
typeEspece varchar(10),
FOREIGN KEY (typeEspece) REFERENCES ClasseEspeces (classe)
);

CREATE TABLE Clients(
code int PRIMARY KEY,
nom varchar(15) NOT NULL,
prenom varchar(15) NOT NULL,
date_naissance date NOT NULL,
adresse varchar(50) NOT NULL,
num_tel number(10) NOT NULL,
CHECK (num_tel <= 9999999999 AND num_tel >= 100000000)
);

CREATE TABLE  Animal(
codeAnimal int PRIMARY KEY,
propietaire int NOT NULL,
espece varchar(10) NOT NULL,
nom varchar(15) NOT NULL,
date_naissance date,
traitements JSON,
FOREIGN KEY (espece) REFERENCES Especes (nom_espece),
FOREIGN KEY (propietaire) REFERENCES Clients (code)
);

CREATE TABLE Taille_Poids(
code_animal int,
dateC date,
taille float,
poids float,
FOREIGN KEY (code_animal) REFERENCES Animal (codeAnimal),
CHECK (taille > 0 AND poids >0),
PRIMARY KEY (code_animal, dateC)
);

--Insert on the tables
INSERT INTO ClasseEspeces VALUES ('Mammifere');
INSERT INTO ClasseEspeces VALUES ('Reptile');
INSERT INTO ClasseEspeces VALUES ('Oiseaux');
COMMIT;

INSERT INTO Especes VALUES ('Chat','Mammifere');
INSERT INTO Especes VALUES ('Chien','Mammifere');
INSERT INTO Especes VALUES ('Serpent','Reptile');
INSERT INTO Especes VALUES ('Perroquet','Oiseaux');
COMMIT;

INSERT INTO Clients VALUES (1,'Corona','Ricardo',TO_DATE('23/08/1998','DD/MM/YYYY'),'Residence Roberval 15',5517001249);
INSERT INTO Clients VALUES (2,'Murillo','Miguel',TO_DATE('14/04/1998','DD/MM/YYYY'),'Residence Roberval 157',1664595181);
INSERT INTO Clients VALUES (3,'Rekik','Ines',TO_DATE('28/11/1998','DD/MM/YYYY'),'Residence Roberval 247',1785693211);
INSERT INTO Clients VALUES (4,'Mendoza','Paquito',TO_DATE('27/10/1997','DD/MM/YYYY'),'Residence Roberval 356',1485624785);
INSERT INTO Clients VALUES (5,'Laclau','Pierre ',TO_DATE('01/09/1994','DD/MM/YYYY'),'Residence LeFort 789',3621542951);
COMMIT;

INSERT INTO Animal VALUES (1,3,'Chat','Milos',TO_DATE('15/11/2016','DD/MM/YYYY'),'[{
		"veterinaire" : {
			"nom" : "Segovia",
			"prenom" : "Jesus"},
		"medicament" : {
			"nom" : "Dafalgan",
			"qte" : 3}
			},

		{"veterinaire" : {
			"nom" : "Jacques",
			"prenom" : "Mateo"},
		"medicament" : {
			"nom" : "Ketoralaco",
			"qte" :1 }
			}]'
);

INSERT INTO Animal VALUES (2,1,'Chien','Funky',TO_DATE('24/02/2017','DD/MM/YYYY'),'[{
		"veterinaire" : {
			"nom" : "Murillo",
			"prenom" : "Kevin"},
		"medicament" : {
			"nom" : "Dafalgan",
			"qte" : 3}
			}]'
);
INSERT INTO Animal VALUES (3,2,'Serpent','Tssss',TO_DATE('30/05/2013','DD/MM/YYYY'),NULL);
INSERT INTO Animal VALUES (4,4,'Perroquet','Peri',TO_DATE('27/01/2010','DD/MM/YYYY'),NULL);
INSERT INTO Animal VALUES (5,5,'Chien','MDoggo',TO_DATE('12/09/2006','DD/MM/YYYY'),'[{
		"veterinaire" : {
			"nom" : "Murillo",
			"prenom" : "Kevin"},
		"medicament" : {
			"nom" : "Antadis",
			"qte" : 1}
			},
		{"veterinaire" : {
			"nom" : "Jacques",
			"prenom" : "Mateo"},
		"medicament" : {
			"nom" : "Paracetamol",
			"qte" :3}
		}]');
COMMIT;

INSERT INTO Taille_Poids VALUES (2,TO_DATE('13/06/2018','DD/MM/YYYY'),0.45,1.2);
INSERT INTO Taille_Poids VALUES (1,TO_DATE('27/10/2018','DD/MM/YYYY'),0.65,1.69);
INSERT INTO Taille_Poids VALUES (3,TO_DATE('18/02/2019','DD/MM/YYYY'),0.98,3.5);
COMMIT;

--Requete

SELECT A.nom,
tr->>'veterinaire' AS veterinaire,
tr->>'medicament' AS medicament,
FROM Animal A, JSON_ARRAY_ELEMENTS(A.traiements) tr;