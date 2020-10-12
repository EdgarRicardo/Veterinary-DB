--DELETE TABLES
DROP TABLE Assistants;
DROP TABLE Clientes;
DROP TYPE TyClients;
DROP TABLE Animal;
DROP TYPE ListeAnimaux;
DROP TYPE refAnimal;
DROP TYPE TyAnimal;
DROP TABLE Traitements;
DROP TYPE RListeTraitements;
DROP TYPE ListeTraitements;
DROP TYPE TyTraitements;
DROP TYPE ListeDosageMed;
DROP TYPE TyDosageMed;
DROP TABLE Veterinaires;
DROP TYPE TyVeterinaires;
DROP TABLE Medicaments;
DROP TYPE TyMedicaments;
DROP TABLE Especes;
DROP TYPE TyEspeces;
DROP TYPE L_TaillePoids;
DROP TYPE Ty_TaillePoids;
DROP TABLE ClasseEspeces;
DROP TYPE TyClasseEspeces;


--Create all the tables

CREATE TYPE Ty_TaillePoids AS OBJECT( 
    dateC DATE, 
    taille FLOAT,
    poids  FLOAT
);
/

CREATE TYPE L_TaillePoids AS TABLE OF Ty_TaillePoids;
/

CREATE TYPE TyClasseEspeces AS OBJECT(
    classe VARCHAR(10) 
);
/

CREATE TABLE ClasseEspeces OF TyClasseEspeces(
    PRIMARY KEY(classe) 
);
/

CREATE TYPE TyEspeces AS OBJECT(
    nom_espece VARCHAR(10),
    typeEspece REF TyClasseEspeces
);
/

CREATE TABLE Especes OF TyEspeces(
    nom_espece PRIMARY KEY,
    SCOPE FOR (typeEspece) IS  ClasseEspeces
);
/

CREATE TYPE  TyMedicaments AS OBJECT(
    nom_molecule VARCHAR(25),
    effet VARCHAR(150)
);
/

CREATE TABLE  Medicaments OF TyMedicaments(
    nom_molecule PRIMARY KEY,
    effet NOT NULL
);
/

CREATE TYPE TyVeterinaires AS OBJECT(
    code INTEGER,
    nom VARCHAR(15),
    prenom VARCHAR(15),
    date_naissance DATE,
    adresse VARCHAR(50),
    num_tel NUMERIC(10),
    specialite REF TyClasseEspeces
);
/

CREATE TABLE Veterinaires OF TyVeterinaires(
    code PRIMARY KEY,
    nom NOT NULL,
    prenom NOT NULL,
    date_naissance NOT NULL,
    adresse NOT NULL,
    num_tel NOT NULL,
    SCOPE FOR (specialite) IS ClasseEspeces
);
/

CREATE TYPE TyDosageMed AS OBJECT(
    medicament REF TyMedicaments,
    duree INTEGER,
    doseXjour INTEGER
);
/

CREATE TYPE ListeDosageMed AS TABLE OF TyDosageMed;
/

CREATE TYPE TyTraitements AS OBJECT(
    num_traitement INTEGER,
    veterinaire REF TyVeterinaires,
    listeDosage ListeDosageMed,
    date_debut DATE
);
/

CREATE TABLE Traitements OF TyTraitements(
    num_traitement PRIMARY KEY,
    SCOPE FOR (veterinaire) IS Veterinaires,
    date_debut NOT NULL
)
NESTED TABLE listeDosage STORE AS listeDosageND;
/

CREATE TYPE RListeTraitements AS OBJECT(
    rLTraitement REF TyTraitements
);
/

CREATE TYPE ListeTraitements AS TABLE OF RListeTraitements;
/

CREATE TYPE TyAnimal AS OBJECT(
    codeAnimal INTEGER,
    espece VARCHAR(10),
    nom VARCHAR(15),
    date_naissance DATE,
    tailles_poids L_TaillePoids,
    traitements ListeTraitements
);
/

CREATE TABLE Animal OF TyAnimal(
    codeAnimal PRIMARY KEY,
    espece NOT NULL,
    nom NOT NULL
)
NESTED TABLE traitements STORE AS traitementND
NESTED TABLE tailles_poids STORE AS taillepoidsND;
/

CREATE TYPE refAnimal AS OBJECT (
    rAnimal REF tyAnimal
);
/

CREATE TYPE ListeAnimaux AS TABLE OF refAnimal;
/

CREATE TYPE TyClients AS OBJECT(
    code INTEGER,
    nom VARCHAR(15),
    prenom VARCHAR(15),
    date_naissance date,
    adresse VARCHAR(50),
    num_tel NUMERIC(10),
    lanimaux ListeAnimaux
);
/

CREATE TABLE Clientes OF TyClients(
    code  PRIMARY KEY,
    nom NOT NULL,
    prenom NOT NULL,
    date_naissance NOT NULL,
    adresse NOT NULL,
    num_tel NOT NULL,
    CHECK (num_tel <= 9999999999 AND num_tel >= 100000000)
)
NESTED TABLE lanimaux STORE AS lanimaND;
/

CREATE TABLE Assistants(
code INTEGER PRIMARY KEY,
nom VARCHAR(15) NOT NULL,
prenom VARCHAR(15) NOT NULL,
date_naissance DATE NOT NULL,
adresse VARCHAR(50) NOT NULL,
num_tel NUMERIC(10) NOT NULL,
CHECK (num_tel <= 9999999999 AND num_tel >= 100000000)
);