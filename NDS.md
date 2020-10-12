# **Note de clarification**

### **Contexte :**

---
##### Une clinique vétérinaire a besoin d’une base de données pour gérer sa structure.
-----

### **Fonctionnement de la clinique :**
---
La clinique a besoin de répertorier : 
* Ses clients.
* Son personnel. 
* Les animaux soignés.
* Les médicaments qu’elle emploie.
* Les traitements suivis par les animaux.


### **Données à répertorier :**

Or les attributs pour chaque besoin sont :
* Un client est répertorié par : un nom, un prénom, une date de naissance, une adresse et un numéro de téléphone. 
* Le personnel aura les mêmes données qu’un client et en plus un poste (vétérinaire ou assistant) et leur spécialité (une espèce qu'ils savent le mieux traiter). 
* Un animal sera répertorié grâce à : un nom, une espèce, un dernier poids mesuré, une dernière taille mesurée, une année de naissance (qui n’est pas nécessaire) et un client propriétaire. 
* Un médicament aura : un nom de molécule et des effets. 
* Un traitement aura: un animal, une date de début, une durée, le vétérinaire qui fait la prescription, les molécules prescrites et la quantité à prendre par jour de ces dernières.
  


### **Hypothèses :**

Pour créer le système, nous utiliserons les hypothèses suivantes :
1. On suppose qu’un animal a un seul propriétaire.
1. Un membre du personnel possède une seule spécialité. 
1. Un traitement sera prescrit par un seul vétérinaire pour un animal.
1. Le personnel peut traiter d'autres espèces que celle de sa spécialité.



### **Contraintes :** 

Pour le système, il y a certaines restrictions, qui sont :
1. Seul les vétérinaires peuvent prescrire un traitement. 
1. Un médicament est autorisé pour certaines espèces. 
1. Le personnel de la clinique ne peut pas avoir d’animaux de compagnie traités dans la clinique.



### **Besoins :**

Le gestionnaire de la base de donnés doit pouvoir : 
1. Ajouter et mettre à jour le personnel, les clients, les animaux et les médicaments.
1. Obtention de statistiques: 
    * Quantité utilisée de chaque médicament pour traitement,
    * La quantité d'un médicament prescrit au total dans la clinique,
    * Les poids et taille moyenne des animaux d'une espèce traités,



### **Ajouts :**

Nous considérons les propositions suivantes pour le système :
1. A chaque client, personnel et animal sera attribué une code numérique unique pour les identifier plus facilement.
1. Chaque poids et taille mesuré seront sauvegarder pour construire un historique pour chaque animal, à des fins statistiques.  

