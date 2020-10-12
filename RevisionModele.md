**Dans la relation client(code,nom,prenom,dateNaissance,num_telephone,adresse)**

	C+={
		code --> nom
		code --> prenom
		code --> dateNaissance
		code --> adresse
		code --> num_telephone
		nom,prenom,dateNaissance --> code
		nom,prenom,dateNaissance --> adresse
		nom,prenom,dateNaissance --> num_telephone
	}

**Dans la relation veterinaire(code,nom,prenom,dateNaissance,num_telephone,adresse,specialite)**

	V+={
		code --> nom
		code --> prenom
		code --> dateNaissance
		code --> adresse
		code --> num_telephone
		code --> specialite
		nom,prenom,dateNaissance --> code
		nom,prenom,dateNaissance --> adresse
		nom,prenom,dateNaissance --> num_telephone
		nom,prenom,dateNaissance --> specialite
	}


**Dans la relation assistant(code,nom,prenom,dateNaissance,num_telephone,adresse,specialite)** 

	A+={
		code --> nom
		code --> prenom
		code --> dateNaissance
		code --> adresse
		code --> num_telephone
		code --> specialite
		nom,prenom,dateNaissance --> code
		nom,prenom,dateNaissance --> adresse
		nom,prenom,dateNaissance --> num_telephone
		nom,prenom,dateNaissance --> specialite
	}
	

***Dans la relation ClasseEspece(class) //Classe avec un seul attribut***


**Dans la relation Animal(code_animal,propietaire,espece,nom,dateNaissance)**

	An+={
		code_animal --> propietaire
		code_animal --> espece
		code_animal --> nom
		code_animal --> dateNaissance
		propietaire,nom --> espece
		propietaire,nom --> dateNaissance
	}

**Dans la relation Traitement(num_traitement,veterinaire,date_debut,code_animal)**

	T+={
		num_traitement --> veterinaire
		num_traitement --> date_debut
		num_traitement --> code_animal		
	}	

**Dans la relation Medicaments(nom_molecule,effet)**

	M+={
		nom_molecule --> effet	
	}	

**Dans la relation DosageMed(code_traitement,nom_molecule,duree,doseXjour)**

	DM+={
		code_traitement,nom_molecule --> duree
		code_traitement,nom_molecule --> doseXjour	
	}	
	

***Dans la relation Medicament_Espece(nom_molecule,nom_espece) //Relation d'association (Tous les élements sont des clès)***

	
**Dans la relation Espece(nom_espece,typeEspece)**

	E+={
		nom_espece --> typeEspece	
	}	

**Dans la relation Taille_Poids(code_animal,dateC,poids,taille)**

	TP+={
		code_animal,dateC --> poids
		code_animal,dateC --> taille
	}	


**Dans les Fermetures Transitives T+, M+, DM+, E+, TP+, elles sont déjà Couvertures Minimales**

**Or pour:**


	CM(C+)={
		code --> nom
		code --> dateNaissance
		code --> adresse
		code --> num_telephone
		nom,prenom,dateNaissance->code
	}

	CM(V+)={
		code --> nom
		code --> prenom
		code --> dateDaissance
		code --> adresse
		code --> num_telephone
		code --> specialite
		nom,prenom,dateNaissance->code
	}
 
	CM(A+)={
		code --> nom
		code --> prenom
		code --> dateDaissance
		code --> adresse
		code --> num_telephone
		code --> specialite
		nom,prenom,dateNaissance->code
	}

	CM(An+)={
		code_animal --> propietaire
		code_animal --> espece
		code_animal --> nom
		code_animal --> dateNaissance
		nom,proprietaire->code_animal
	}


**Analyse Decomposition 3NF - BCNF**

	1NF : 
		*Tous les attributs de toutes les relations sont atomiques.
		*Chaque relation a une clé.

	2NF :
		* On est en 1NF.
		* Dans tous les cas, on a des clés avec un seul attribut et en cas contraire si la clé est composée de 
		  plusieurs attributs, aucun de ces dérniers définissent un attribut non clé par soi-même.

	3NF:
		* On est en 2NF.
		* Chaque relation ne contient aucun attribut non clé qui permet d'obtenir un autre attribut non clé.

	BCNF: 
		* En première instance nos relations n'ont pas des attributs non clés qui déterminent un attribut clé.
		* Deuxièmement toutes les relation sont de la forme K --> A où K est une clé candidate et s'il est composée,
		  il ne partage pas des attributs avec une autre clé candidate. 
