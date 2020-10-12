--DELETE TABLES
DROP TABLE Taille_Poids;
DROP TABLE Medicament_Espece;
DROP TABLE Traitements;
DROP TABLE Veterinaires;
DROP TABLE Animal;
DROP TABLE Especes; 
DROP TABLE ClasseEspeces;
DROP TABLE Clients;
DROP TABLE Medicaments;
DROP TYPE L_TaillePoids;
DROP TYPE Ty_TaillePoids;


--CREATE TABLES
CREATE TYPE Ty_TaillePoids AS OBJECT( 
    dateC DATE, 
    taille FLOAT,
    poids  FLOAT
);
/

CREATE TYPE L_TaillePoids AS TABLE OF Ty_TaillePoids;
/

CREATE TABLE ClasseEspeces(
classe VARCHAR(10) PRIMARY KEY
);

CREATE TABLE Especes(
nom_espece VARCHAR(10) PRIMARY KEY,
typeEspece VARCHAR(10),
FOREIGN KEY (typeEspece) REFERENCES ClasseEspeces (classe)
);

CREATE TABLE Clients(
code INTEGER PRIMARY KEY,
nom VARCHAR(15) NOT NULL,
prenom VARCHAR(15) NOT NULL,
date_naissance DATE NOT NULL,
adresse VARCHAR(50) NOT NULL,
num_tel NUMBER(10) NOT NULL,
CHECK (num_tel <= 9999999999 AND num_tel >= 100000000) 
);

CREATE TABLE Veterinaires(
code INTEGER PRIMARY KEY,
nom VARCHAR(15) NOT NULL,
specialite VARCHAR(10),
FOREIGN KEY (specialite) REFERENCES ClasseEspeces (classe)
);

CREATE TABLE  Animal(
codeAnimal INTEGER PRIMARY KEY,
propietaire INTEGER NOT NULL,
espece VARCHAR(10) NOT NULL,
nom VARCHAR(15) NOT NULL,
date_naissance DATE,
tailles_poids L_TaillePoids,
FOREIGN KEY (espece) REFERENCES Especes (nom_espece),
FOREIGN KEY (propietaire) REFERENCES Clients (code)
)
NESTED TABLE tailles_poids STORE AS taillepoidsND;

CREATE TABLE  Medicaments(
nom_molecule VARCHAR(25) PRIMARY KEY
);

CREATE TABLE Traitements(
num_traitement INTEGER PRIMARY KEY,
veterinaire INTEGER NOT NULL,
date_debut DATE NOT NULL,
code_animal INTEGER NOT NULL,
medicament VARCHAR(25),
FOREIGN KEY (veterinaire) REFERENCES Veterinaires (code),
FOREIGN KEY (code_animal) REFERENCES Animal (codeAnimal),
FOREIGN KEY (medicament) REFERENCES Medicaments (nom_molecule)
);

--INSERTS
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

INSERT INTO Veterinaires VALUES (1,'Segovia','Mammifere');
INSERT INTO Veterinaires VALUES (2,'Jacques','Reptile');
INSERT INTO Veterinaires VALUES (3,'Murillo','Mammifere');
COMMIT;

INSERT INTO Animal VALUES (1,3,'Chat','Milos',TO_DATE('15/11/2016','DD/MM/YYYY'),
L_TaillePoids(Ty_TaillePoids(TO_DATE('13/06/2018','DD/MM/YYYY'),0.45,1.2),Ty_TaillePoids(TO_DATE('27/10/2018','DD/MM/YYYY'),0.65,1.69)));
INSERT INTO Animal VALUES (2,1,'Chien','Funky',TO_DATE('24/02/2017','DD/MM/YYYY'),
L_TaillePoids(Ty_TaillePoids(TO_DATE('17/01/2018','DD/MM/YYYY'),0.25,1.12)));
INSERT INTO Animal VALUES (3,2,'Serpent','Tssss',TO_DATE('30/05/2013','DD/MM/YYYY'),
L_TaillePoids(Ty_TaillePoids(TO_DATE('18/01/2018','DD/MM/YYYY'),0.65,1.2),Ty_TaillePoids(TO_DATE('30/9/2018','DD/MM/YYYY'),0.75,1.49)));
INSERT INTO Animal VALUES (4,1,'Serpent','Snake',TO_DATE('23/08/2005','DD/MM/YYYY'),NULL);
COMMIT;

SELECT a.nom,tp.poids,tp.datec FROM Animal a,TABLE(a.tailles_poids) tp; 

INSERT INTO Medicaments VALUES('Paracetamol');
INSERT INTO Medicaments VALUES('Antadis');
INSERT INTO Medicaments VALUES('Dafalgan');
INSERT INTO Medicaments VALUES('Ketoralaco');
COMMIT;

INSERT INTO Traitements(num_traitement,veterinaire,date_debut,code_animal,medicament) VALUES (1,2,TO_DATE('10/05/2018','DD/MM/YYYY'),1,'Paracetamol');
INSERT INTO Traitements VALUES (2,1,TO_DATE('17/10/2018','DD/MM/YYYY'),2,'Antadis');
INSERT INTO Traitements VALUES (3,2,TO_DATE('30/11/2018','DD/MM/YYYY'),1,'Paracetamol');
INSERT INTO Traitements VALUES (4,3,TO_DATE('20/03/2019','DD/MM/YYYY'),3,'Dafalgan');
INSERT INTO Traitements VALUES (5,3,TO_DATE('21/05/2019','DD/MM/YYYY'),3,'Ketoralaco');
COMMIT;
