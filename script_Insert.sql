--Insert data for each table

INSERT INTO ClasseEspeces(classe) VALUES
('Mammifere'),
('Reptile'),
('Oiseaux');

INSERT INTO Especes(nom_espece,typeEspece) VALUES
('Chat','Mammifere'),
('Chien','Mammifere'),
('Serpent','Reptile'),
('Perroquet','Oiseaux');

INSERT INTO Clients(code,nom,prenom,date_naissance,adresse,num_tel) VALUES
(1,'Corona','Ricardo',TO_DATE('23/08/1998','DD/MM/YYYY'),'Residence Roberval 15',5517001249),
(2,'Murillo','Miguel',TO_DATE('14/04/1998','DD/MM/YYYY'),'Residence Roberval 157',1664595181),
(3,'Rekik','Ines',TO_DATE('28/11/1998','DD/MM/YYYY'),'Residence Roberval 247',1785693211),
(4,'Mendoza','Paquito',TO_DATE('27/10/1997','DD/MM/YYYY'),'Residence Roberval 356',1485624785),
(5,'Laclau','Pierre ',TO_DATE('01/09/1994','DD/MM/YYYY'),'Residence LeFort 789',3621542951);

INSERT INTO Veterinaires(code,nom,prenom,date_naissance,adresse,num_tel,specialite) VALUES
(1,'Segovia','Jesus',TO_DATE('22/07/1990','DD/MM/YYYY'),'Residence Roberval 150',5517001249,'Mammifere'),
(2,'Jacques','Mateo',TO_DATE('14/05/1991','DD/MM/YYYY'),'Residence Roberval 574',1664595181,'Reptile'),
(3,'Murillo','Kevin',TO_DATE('08/06/1987','DD/MM/YYYY'),'Residence Roberval 248',1785693211,'Mammifere');

INSERT INTO Assistants(code, nom, prenom, date_naissance, adresse, num_tel, specialite) VALUES
(1,'Rekik','Yasmine',TO_DATE('31/01/1996','DD/MM/YYYY'),'Georges Charpak',0695528111,'Reptile'),
(2,'Mellouli','Hanen',TO_DATE('12/04/1968','DD/MM/YYYY'),'Georges Charpak',0615121672,'Mammifere'),
(3,'Romeo','Elvis',TO_DATE('08/11/1998','DD/MM/YYYY'),'Bruxelles Vie',0344204536,'Reptile');

INSERT INTO Animal(codeAnimal,propietaire,espece,nom,date_naissance) VALUES
(1,3,'Chat','Milos',TO_DATE('15/11/2016','DD/MM/YYYY')),
(2,1,'Chien','Funky',TO_DATE('24/02/2017','DD/MM/YYYY')),
(3,2,'Serpent','Tssss',TO_DATE('30/05/2013','DD/MM/YYYY'));

INSERT INTO Medicaments(nom_molecule,effet) VALUES
('Paracetamol','Reduit la douleur et la fievre'),
('Antadis','Stoppe les spasmes au ventre'),
('Dafalgan','Ameliore le sommeil');

INSERT INTO Traitements(num_traitement,veterinaire,date_debut,code_animal) VALUES
(1,2,TO_DATE('10/05/2018','DD/MM/YYYY'),1),
(2,1,TO_DATE('17/10/2018','DD/MM/YYYY'),2),
(3,2,TO_DATE('30/11/2018','DD/MM/YYYY'),1),
(4,3,TO_DATE('20/03/2019','DD/MM/YYYY'),3);

INSERT INTO DosageMed(code_traitement,nom_molecule,duree,doseXjour) VALUES
(1,'Dafalgan',5,3),
(2,'Paracetamol',3,1),
(3,'Antadis',10,1),
(4,'Paracetamol',4,1);

INSERT INTO Medicament_Espece(nom_molecule,nom_espece) VALUES
('Antadis','Chien'),
('Antadis','Chat'),
('Dafalgan','Serpent'),
('Paracetamol','Chat'),
('Paracetamol','Chien'),
('Paracetamol','Perroquet');

INSERT INTO Taille_Poids(code_animal, dateC,taille,poids) VALUES
(2,TO_DATE('13/06/2018','DD/MM/YYYY'),0.45,1.2),
(1,TO_DATE('27/10/2018','DD/MM/YYYY'),0.65,1.69),
(3,TO_DATE('18/02/2019','DD/MM/YYYY'),0.98,3.5);




INSERT INTO Animal VALUES (4,2,'Chien','Pelucy',NULL), (5,2,'Chien','Morita',NULL);
INSERT INTO Taille_Poids(code_animal, dateC,taille,poids) VALUES
(4,TO_DATE('13/06/2018','DD/MM/YYYY'),1.3,2),
(5,TO_DATE('27/10/2018','DD/MM/YYYY'),6.2,5);
