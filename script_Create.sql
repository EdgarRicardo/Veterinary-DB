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
num_tel bigint NOT NULL,
CHECK (num_tel <= 9999999999 AND num_tel >= 100000000) 
);

CREATE TABLE Assistants(
code int PRIMARY KEY,
nom varchar(15) NOT NULL,
prenom varchar(15) NOT NULL,
date_naissance date NOT NULL,
adresse varchar(50) NOT NULL,
num_tel bigint NOT NULL,
specialite varchar(10),
FOREIGN KEY (specialite) REFERENCES ClasseEspeces (classe),
CHECK (num_tel <= 9999999999 AND num_tel >= 100000000)
);

CREATE TABLE Veterinaires(
code int PRIMARY KEY,
nom varchar(15) NOT NULL,
prenom varchar(15) NOT NULL,
date_naissance date NOT NULL,
adresse varchar(50) NOT NULL,
num_tel bigint  NOT NULL,
specialite varchar(10),
FOREIGN KEY (specialite) REFERENCES ClasseEspeces (classe),
CHECK (num_tel <= 9999999999 AND num_tel >= 100000000)
);

CREATE TABLE  Animal(
codeAnimal int PRIMARY KEY,
propietaire int NOT NULL,
espece varchar(10) NOT NULL,
nom varchar(15) NOT NULL,
date_naissance date,
FOREIGN KEY (espece) REFERENCES Especes (nom_espece),
FOREIGN KEY (propietaire) REFERENCES Clients (code)
);

CREATE TABLE  Medicaments(
nom_molecule varchar(25) PRIMARY KEY,
effet varchar(150) NOT NULL
);

CREATE TABLE Traitements(
num_traitement int PRIMARY KEY,
veterinaire int NOT NULL,
date_debut date NOT NULL,
code_animal int NOT NULL,
FOREIGN KEY (veterinaire) REFERENCES Veterinaires (code),
FOREIGN KEY (code_animal) REFERENCES Animal (codeAnimal)
);

CREATE TABLE DosageMed(
code_traitement int,
nom_molecule varchar(25),
duree int NOT NULL,
doseXjour int NOT NULL,
PRIMARY KEY (code_traitement, nom_molecule),
FOREIGN KEY (code_traitement) REFERENCES Traitements (num_traitement),
FOREIGN KEY (nom_molecule) REFERENCES Medicaments (nom_molecule),
CHECK (duree > 0 AND doseXjour > 0)
);

CREATE TABLE Medicament_Espece(
nom_molecule varchar(25),
nom_espece varchar(10),
PRIMARY KEY (nom_molecule, nom_espece),
FOREIGN KEY (nom_molecule) REFERENCES Medicaments (nom_molecule),
FOREIGN KEY (nom_espece) REFERENCES Especes (nom_espece)
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

--Create all the views

CREATE VIEW vPersonnel AS
(SELECT * FROM Assistants)
UNION
(SELECT * FROM Veterinaires);

CREATE VIEW vPersonne AS
(SELECT * FROM Clients) 
UNION 
(SELECT code,nom,prenom,date_naissance,adresse,num_tel FROM vPersonnel);