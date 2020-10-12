**Clients**(#code : int, nom : str, prenom : str, date_naissance : date, adresse : str, num_telephone : int) 
*avec <(nom, prenom, date_naissance, num_telephone) NOT NULL et num_tel avec 10 chiffres*

**Assistants**(#code : int, nom : str, prenom : str, specialite=>ClasseEspeces, date_naissance : date, adresse : str, num_telephone : int) 
*avec <(nom, prenom, date_naissance, num_telephone) NOT NULL et num_tel avec 10 chiffres, specialite NOT NULL Projection(Assistants, specialite) = Projection (ClassEspece, class_espece) >*

**Veterinaires**(#code : int, nom : str, prenom : str, specialite=>ClasseEspeces, date_naissance : date, adresse : str, num_telephone : int) 
*avec <(nom, prenom, date_naissance, num_telephone) NOT NULL et num_tel avec 10 chiffres, specialite NOT NULL, Projection(Veterinaires, specialite) = Projection (ClassEspece, class_espece) >*

**ClasseEspeces**(#classe : str)

**Animal**(#code_animal : int, proprietaire=>Clients(code), espece=>Espece(nom_espece), nom : str, date_naissance : date) 
*avec <(propietaire, espece, nom) NOT NULL, Projection(Animal, espece)=Projection(Especes, nom_espece), Projection(Client, num_client)=Projection(Animal, proprietaire)>*

**Traitements**(#num_traitement : int, veterinaire=>Veterinaires(code), date_debut : date, code_animal=>Animal(code_animal)) 
*avec <(date_debut, code_animal,code) NOT NULL>*

**Medicaments**(#nom_molecule : str, effet : str) *avec < effet NOT NULL >*

**DosageMed**(#code_Traitement=>Traitement(num_Traitement), #nom_molecule=>Medicament(nom_molecule), duree : int, doseXjour : int) 
*avec < (duree, doseXjour) > 0 and NOT NULL, Projection(Traitement, code_Traitement) = Projection(DosageMed, code_Traitement) AND Projection(DosageMed, nom_molecule) = Projection(Medicament, nom_molecule)>*

**Medicament_Espece**(#nom_molecule=>Medicament(nom_molecule), #nom_espece=>Espece(nom_espece)) *avec <(Projection(Medicament, nom_molecule) = Projection(Medicament_Espece, nom_molecule) AND Projection(Medicament_Espece, nom_espece) = Projection(Espece, nom_espece) )>*

**Especes**(#nom_espece : str, typeEspece=>ClassEspece) *avec <typeEspece NOT NULL, Projection(Especes, typeEspece) = Projection(ClassEspece, class_espece)>*

**Taille_Poids**(#code_animal=>Animal(code_animal), #date : date, poids: float, taille: float)
*avec <Projection(Animal, code_animal) = Projection(Taille_Poids, code_animal)>*

----------------------------------------------------------------

**vPersonnel** = Union(Assistants, Veterinaires)

**vPersonne** =  Union(Clients, (Projection(vPersonnel, code, nom, prenom, date_naissance, adresse,  num_telephone))