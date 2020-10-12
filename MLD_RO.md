**Type Ty_TaillePoids** : <dateC : Date, taille : float, poids : float>

**Type L_TaillePoids** : collection de Ty_TaillePoids



**ClasseEspeces**(#classe : str)

**Especes**(#nom_espece : str, typeEspece=>ClassEspece) avec <typeEspece NOT NULL, Projection(Especes, typeEspece) = Projection(ClassEspece, classe)>

**Clients**(#code : int, nom : str, prenom : str, date_naissance : date, adresse : str, num_tel : int) *avec <(nom, prenom, date_naissance, num_telephone) NOT NULL et num_tel avec 10 chiffres>*

**Veterinaires**(#code : int, nom : str, specialite=>ClasseEspeces) *avec <nom NOT NULL et Projection(Veterinaires, specialite) = Projection (ClassEspece, classe)>*

**Animal**(#code_animal : int, proprietaire=>Clients(code), espece=>Espece(nom_espece), nom : str, date_naissance : date, tailles_poids : L_TaillePoids) *avec <(propietaire, espece, nom) NOT NULL, Projection(Animal, espece)=Projection(Especes, nom_espece) et Projection(Client, code)=Projection(Animal, proprietaire)>*

**Medicaments**(#nom_molecule : str)

**Traitements**(#num_traitement : int, veterinaire=>Veterinaires(code), date_debut : date, code_animal=>Animal(code_animal), medicament=>Medicaments) *avec <(veterinaire, date_debut, code_animal) NOT NULL, Projection(Traitements, veterinaire)=Projection(Veterinaires, code, Projection(Traitements, code_animal)=Projection(Animal, codeAnimal) et Projection(Traitements, medicament)=Projection(Medicaments, nom_molecule) >*