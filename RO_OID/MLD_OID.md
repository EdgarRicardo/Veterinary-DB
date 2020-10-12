**Type Ty_TaillePoids** : <dateC : Date, taille : float, poids : float>

**Type Col_TaillePoids** : collection de Ty_TaillePoids


**Type Ty_ClassEspece** : <class_espece : str>

**ClassEspece** de Ty_ClassEspece(#class_espece)


**Type Ty_Espece** : <nom_espece : str, classe =>o ClassEspece>

**Espece** de Ty_Espece(#nom_espece) avec < classe NOT NULL>


**Type Ty_Medicament** : < nom_molecule : str, effet : str>

**Medicament** de Ty_Medicament(#nom_molecule) avec < effet NOT NULL>


**Type Ty_Veterinaire** : <code : int, nom : str, prenom : str, date_naissance : date, adresse : str, num_telephone : int, specialite =>o ClassEspece)

**Veterinaire** de Ty_Veterinaire(#code) avec <nom,prenom,date_naissance,adresse,num_telephone,specialite) NOT NULL et num_tel avec 10 chiffres>


**Type Ty_DosageMed** : <medicament =>o Medicament, duree : int, doseXjour : int)>

**Type Col_DosageMed** : collection de Ty_DosageMed


**Type Ty_Traitement** : <num_traitement : int, date_debut : date, listeDosage : Col_DosageMed, veterinaire=>o Veterinaire>

**Traitement** de Ty_Traitement(#num_traitement) avec <(date_debut,med,veterinaire) NOT NULL>


**Type RListeTraitements** : <rLTraitement =>o Traitements>

**Type ListeTraitements** : collection de RListeTraitements


**Type Ty_Animal** : <codeAnimal : int, nom : str, date_naissance : date, traitements : ListeTraitements, espece =>o Espece, taillepoids : Col_TaillePoids>

**Animal** de Ty_Animal(#codeAnimal) avec <(nom,espece) NOT NULL>


**Type refAnimal** : <rAnimal =>o Animal>

**Type ListeAnimaux** : collection de refAnimal


**Type Ty_Client** : <code : int, nom : str, prenom : str, date_naissance : date, adresse : str, num_telephone : int>

**Client** de Ty_Client(#code) avec <(nom,prenom,date_naissance,adresse,num_telephone) NOT NULL et num_tel avec 10 chiffres>


**Assistant**(code : int, nom : str, prenom : str, date_naissance : date, adresse : str, num_telephone : int, specialite =>o ClassEspece) avec <(nom,prenom,date_naissance,adresse,num_telephone,specialite) NOT NULL et num_tel avec 10 chiffres>
