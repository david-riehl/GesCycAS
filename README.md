#GesCycAS
*Gestion des Cycles d'Activités Sportives*

##Sommaire
- [Contexte](#contexte)
- [Objectif](#objectif)
- [Tableau des Activités](#tableau-des-activit%C3%A9s)
- [Activités Extra-Scolaires](#activit%C3%A9s-extra-scolaires)
- [Inscription](#inscription)
- [Pointage des étudiants présents](#pointage-des-%C3%A9tudiants-pr%C3%A9sents)
- [Quota](#quota)
- [Notification](#notification)
- [Bilan](#bilan)
- [Fonctionnalités](#fonctionnalit%C3%A9s)
- [Contraintes Techniques](#contraintes-techniques)
- [Charte Graphique](#charte-graphique)
- [Contrainte d’organisation](#contrainte-dorganisation)

##Contexte
Au cours de leur cursus, les étudiants inscrits en Classe Préparatoire aux Grandes Ecoles (CPGE) doivent avoir une pratique sportive.
Les enseignants d’Education Physique et Sportive proposent des activités sportives sur un ensemble de 5 cycles à chaque année de formation&nbsp;:
- «&nbsp;sup&nbsp;» pour les étudiants de première année
- «&nbsp;spé&nbsp;» pour les étudiants de deuxième année

En ce qui concerne le volume des informations à gérer, on vous informe qu’au Lycée Henri Wallon de Valenciennes on comptait 14 classes préparatoires aux grandes écoles qui représentaient environ 450 étudiants, pour l’année scolaire 2012-2013.

[Retour au Sommaire](#sommaire)

##Objectif
Ce projet a pour objectif de fournir une application web permettant aux établissements scolaires de vérifier de manière plus efficace l’assiduité des étudiants à ces ateliers.

**Attention**

- A la suite du document certaines informations apparaissent en **gras**. Ces informations peuvent faire l’objet d’une précision ou d’une modification ultérieure !


[Retour au Sommaire](#sommaire)

##Tableau des Activités
Pour chaque année («&nbsp;sup&nbsp;», et «&nbsp;spé&nbsp;») les enseignants proposent un ensemble d’activités qu’ils se répartissent entre eux.

<table>
<caption>Tableau d’Activité des «&nbsp;sup&nbsp;»</caption>
<tr><th>C1</th><th>C2</th><th>C3</th><th>C4</th><th>C5</th></tr>
<tr><td>
<strong>Escalade</strong><br>
M. DUPONT<br>
<em>Salle des Sports</em>
</td><td>
<strong>Escalade</strong><br>
M. DUPONT<br>
<em>Salle des Sports</em>
</td><td>
<strong>Football</strong><br>
M. DESCHAMPS<br>
<em>Stade XYZ</em>
</td><td>
<strong>Football</strong><br>
M. DESCHAMPS<br>
<em>Stade XYZ</em>
</td><td>
<strong>Football</strong><br>
M. DESCHAMPS<br>
<em>Stade XYZ</em>
</td></tr>
<tr><td>
<strong>Badminton</strong><br>
Mme DUPUIS<br>
<em>Gymnase</em>
</td><td>
<strong>Badminton</strong><br>
Mme DUPUIS<br>
<em>Gymnase</em>
</td><td>
<strong>Handball</strong><br>
Mme DUPUIS<br>
<em>Salle des Sports</em>
</td><td>
<strong>Handball</strong><br>
Mme DUPUIS<br>
<em>Terrain Sport</em>
</td><td>
<strong>Athlétisme</strong><br>
M. DUBRULLE<br>
<em>Stade XYZ</em>
</td></tr>
<tr><td>
<strong>Pétanque</strong><br>
M. DUCHEMIN<br>
<em>Terrain</em>
</td><td>
<strong>Athlétisme</strong><br>
M. DUBRULLE<br>
<em>Stade XYZ</em>
</td><td>
<strong>PPG</strong><br>
M. SCHWARTZ<br>
<em>Gymnase</em>
</td><td>
<strong>Escalade</strong><br>
M. DUCHEMIN<br>
<em>Mur Escalade Ext.<em>
</td><td>
<strong>PPG</strong><br>
M. SCHWARTZ<br>
<em>Gymnase</em>
</td></tr>
<tr><td>
<strong>Natation</strong><br>
Mlle SMITH<br>
<em>Piscine Municipale</em>
</td><td>
<strong>PPG</strong><br>
M. SCHWARTZ<br>
<em>Gymnase</em>
</td><td>
<strong>Natation</strong><br>
Mlle SMITH<br>
<em>Piscine Municipale</em>
</td><td>
<strong>Athlétisme</strong><br>
M. DUBRULLE<br>
<em>Stade XYZ</em>
</td><td>
<strong>Gymnastique</strong><br>
Mlle SMITH<br>
<em>Gymnase</em>
</td></tr>
</table>

<table>
<caption>Tableau d’Activité des «&nbsp;spé&nbsp;»</caption>
<tr><th>C1</th><th>C2</th><th>C3</th><th>C4</th><th>C5</th></tr>
<tr><td>
<strong>Football</strong><br>
M. DESCHAMPS<br>
<em>Stade XYZ</em>
</td><td>
<strong>Football</strong><br>
M. DESCHAMPS<br>
<em>Stade XYZ</em>
</td><td>
<strong>Gymnastique</strong><br>
M. DUPONT<br>
<em>Gymnase</em>
</td><td>
<strong>Gymnastique</strong><br>
M. DUPONT<br>
<em>Gymnase</em>
</td><td>
<strong>Athlétisme</strong><br>
M. DUPONT<br>
<em>Stade XYZ</em>
</td></tr>
<tr><td>
<strong>Athlétisme</strong><br>
M. DUBRULLE<br>
<em>Stade XYZ</em>
</td><td>
<strong>Natation</strong><br>
Mlle SMITH<br>
<em>Piscine Municipale</em>
</td><td>
<strong>Athlétisme</strong><br>
M. DUBRULLE<br>
<em>Stade XYZ</em>
</td><td>
<strong>Natation</strong><br>
Mlle SMITH<br>
<em>Piscine Municipale</em>
</td><td>
<strong>Badminton</strong><br>
Mme DUPUIS<br>
<em>Salle des Sports</em>
</td></tr>
<tr><td>
<strong>PPG</strong><br>
M. SCHWARTZ<br>
<em>Gymnase</em>
</td><td>
<strong>Pétanque</strong><br>
M. DUCHEMIN<br>
<em>Terrain</em>
</td><td>
<strong>Escalade</strong><br>
M. DUCHEMIN<br>
<em>Salle des Sports</em>
</td><td>
<strong>PPG</strong><br>
M. SCHWARTZ<br>
<em>Gymnase</em>
</td><td>
<strong>Escalade</strong><br>
M. DUCHEMIN<br>
<em>Mur Escalade Ext.</em>
</td></tr>
<tr><td>
<strong>Escrime</strong><br>
Mme LAPOINTE<br>
<em>Salle des Sports</em>
</td><td>
<strong>Escrime</strong><br>
Mme LAPOINTE<br>
<em>Salle des Sports</em>
</td><td>
<strong>Badminton</strong><br>
Mme LAPOINTE<br>
<em>Salle des Sports</em>
</td><td>
<strong>Badminton</strong><br>
Mme LAPOINTE<br>
<em>Salle des Sports</em>
</td><td>
<strong>Handball</strong><br>
Mme LAPOINTE<br>
<em>Terrain Sport</em>
</td></tr>
</table>

**A noter&nbsp;:**

- Un même lieu peut accueillir plusieurs activités, parfois en même temps
- Une activité ne peut se dérouler que dans un lieu qui peut l’accueillir
- Les étudiants en «&nbsp;sup&nbsp;» ont sport le jeudi
- Les étudiants en «&nbsp;spé&nbsp;» ont sport le mardi


[Retour au Sommaire](#sommaire)

##Activités Extra-Scolaires
Certains étudiants suivent une ou plusieurs activités sportives extra-scolaires&nbsp;: en UNSS, ou en Club.
L’UNSS étant organisée par des enseignants du lycée, ces heures peuvent être prises en charge sous la forme d’un cycle à part entière.
Un cycle «&nbsp;extra-scolaire&nbsp;» peut impliquer des étudiants de «&nbsp;sup&nbsp;» et de «&nbsp;spé&nbsp;». Il est effectué un jour de la semaine qui n’est pas forcément l’un des jours affectés aux «&nbsp;sup&nbsp;» ou aux «&nbsp;spé&nbsp;».

- **Comment intégrer les activités sportives pratiquées en Club&nbsp;?**
	- **Utilise-t-on un mécanisme similaire à celui d’une dispense annuelle&nbsp;?**
	- **Attribue-t-on un quota minimum de participation aux étudiants qui ont une activité en Club&nbsp;?**
	- **Utilise-t-on le même mécanisme que celui de l’UNSS&nbsp;?**
		- **Un entraineur d’un club pourrait-il faire le pointage des présences et des dispenses sur l’application&nbsp;?**


[Retour au Sommaire](#sommaire)

##Inscription
Les activités proposées pendant un cycle sont définies préalablement et les étudiants doivent s’inscrire pour chaque cycle à une (**ou plusieurs&nbsp;?**) activités, et ce entre la date d’ouverture et la date de clôture des inscriptions.

**A noter&nbsp;:**

- Tout changement d’atelier sportif après la date de clôture des inscriptions devra passer par un enseignant qui pourra modifier l’inscription d’un étudiant. Une inscription à donc une date de début et peut avoir une date de fin. Cette date de fin doit être définie au moment de la nouvelle inscription.


[Retour au Sommaire](#sommaire)

##Pointage des étudiants présents
A chaque séance d’une activité sportive, l’enseignant en charge de l’activité doit pouvoir&nbsp;:

- Editer la liste d’appel
- Saisir les présents et les dispensés exceptionnels
- Noter un changement d’activité pour un étudiant

**Sur un même cycle, un étudiant peut-il suivre plusieurs ateliers en alternance encadrés par des enseignants différents&nbsp;?**
 

[Retour au Sommaire](#sommaire)

##Quota
La présence systématique à une séance de sport n’est pas requise. Les étudiants doivent cependant suivre un certain nombre de séances au minimum en fonction de leur année&nbsp;:

- Les étudiants en «&nbsp;sup&nbsp;» (première année) doivent faire un minimum de 20 séances
- Les étudiants en «&nbsp;spé&nbsp;» (deuxième année) doivent faire un minimum de 16 séances

**Qu’en est-il des «&nbsp;5/2&nbsp;»&nbsp;?**


[Retour au Sommaire](#sommaire)

##Notification
On peut également pour chacune de ces années fixer un seuil d’alerte, par exemple&nbsp;:

- Pour les étudiants en «&nbsp;sup&nbsp;»&nbsp;: seul d’alerte = 5
- Pour les étudiants en «&nbsp;spé&nbsp;»&nbsp;: seuil d’alerte = 3

**Qu’en est-il des «&nbsp;5/2&nbsp;»&nbsp;?**

On déclenche une première alerte si on a franchi le seuil&nbsp;:

- «&nbsp;nombre de séances effectuées&nbsp;» + «&nbsp;nombre de séances restantes&nbsp;» < «&nbsp;quota&nbsp;» + «&nbsp;seuil&nbsp;»

On déclenche une deuxième alerte si on n’a plus de marge&nbsp;:

- «&nbsp;nombre de séances effectuées&nbsp;» + «&nbsp;nombre de séances restantes&nbsp;» = «&nbsp;quota&nbsp;»

On déclenche une troisième alerte si on passe en dessous du quota:

- «&nbsp;nombre de séances effectuées&nbsp;» + «&nbsp;nombre de séances restantes&nbsp;» < «&nbsp;quota&nbsp;»

Ces alertes sont diffusées&nbsp;:

- Sous forme de notification dans l’application aux utilisateurs&nbsp;:
	- A l’administration
	- **A l’enseignant en charge du cours où l’étudiant est inscrit&nbsp;?**
	- **A l’étudiant&nbsp;?**
- **Par email&nbsp;? (nécessite l’exécution d’une tâche périodique sur le serveur d’hébergement, à vérifier si notre hébergement académique permet ce genre de choses).**


[Retour au Sommaire](#sommaire)

##Bilan
On souhaite pouvoir bénéficier de plusieurs outils de bilan&nbsp;:

- Le bilan «&nbsp;instantané&nbsp;» qui calcul le nombre total de séances suivies pour chaque étudiant sélectionné (globalement, par classe, par année) sous la forme <<nombre>> / <<quota>>
- Le bilan semestriel par étudiant avec un total de chaque cycle inclus 
	- pour le Semestre 1&nbsp;: C1, C2, C3, UNSS + total / quota
	- pour le Semestre 2&nbsp;: C3, C4, C5, UNSS + total / quota
- Un bilan annuel par étudiant avec un total par Cycle (C1, C2, …, UNSS) et par Semestre (S1, S2)
- Un bilan global par étudiant et par année («&nbsp;sup&nbsp;», «&nbsp;spé&nbsp;», «&nbsp;5/2&nbsp;»)
- Un bilan par enseignant de la saisie des présences / dispenses (**sous quelle forme&nbsp;?**)


[Retour au Sommaire](#sommaire)

##Fonctionnalités
###Utilisateur

- Consultation, modification du profil (mot de passe, email)
- Ré-initialisation du mot de passe

###Administration

- Importation Base élève
- Importation Base Personnel
- Consultation, Impression des bilans
- Archivage de l’année écoulée
- Création de la prochaine année scolaire
	- Génération des séances (Prérequis&nbsp;: tous les cours doivent être définis !)
- **Gestion des lieux&nbsp;: Création / Edition / Suppression (&nbsp;?)**
- **Gestion des activités&nbsp;: Création / Edition / Suppression (&nbsp;?)**
- **Gestion des cours&nbsp;: Création / Edition / Suppression (&nbsp;?)**
	- **Affectation du cycle**
	- **Affectation du Jour**
	- **Affectation des «&nbsp;années&nbsp;» («&nbsp;sup&nbsp;», «&nbsp;spé&nbsp;», «&nbsp;5/2&nbsp;»)**
	- **Affectation du lieu**
	- **Affectation des activités**

###Enseignant

- Impression des grilles d’appel des étudiants
- Saisie des présences / dispenses
- Modification des inscriptions étudiants / cours
- **Gestion des lieux&nbsp;: Création / Edition / Suppression (&nbsp;?)**
	- **Affectation des activités**
- **Gestion des activités&nbsp;: Création / Edition / Suppression (&nbsp;?)**
	- **Affectation des lieux**
- **Gestion des cours&nbsp;: Création / Edition / Suppression (&nbsp;?)**
	- **Affectation du cycle**
	- **Affectation du Jour**
	- **Affectation des «&nbsp;années&nbsp;» («&nbsp;sup&nbsp;», «&nbsp;spé&nbsp;», «&nbsp;5/2&nbsp;»)**
	- **Affectation du lieu**
	- **Affectation des activités**

###Etudiant

- Pour chaque cycle&nbsp;: inscription aux activités sportives
 

[Retour au Sommaire](#sommaire)

##Contraintes Techniques
L’application sera développée en utilisant&nbsp;:

- Le langage PHP
- Une base de données MySQL
- Le framework&nbsp;: D [R]iehl Framework 1.1 (ou ultérieur)
- Serveur d’intégration continu&nbsp;: Hudson Jenkins
- Serveur de Version&nbsp;: Git
- Test Unitaire&nbsp;: phpUnit
- Technique de «&nbsp;responsive design&nbsp;» pour adaptation aux écrans de
	- Smart-phone
	- Ordinateur de bureau
	- Ordinateur portable
	- Mini-pc (résolution 1024x600)

[Retour au Sommaire](#sommaire)

##Charte Graphique
Eléments visuels que l’on souhaite retrouver&nbsp;:

- Logo Lycée Henri Wallon (fourni)
- Fond blanc logo (fourni)
- 3 carrés du Logo Lycée Henri Wallon (fourni)

Couleurs du logo&nbsp;:

- Magenta (carré) code hexa&nbsp;: BF2C7A
- Cyan (carré) code hexa&nbsp;: 009DE0
- Vert (carré) code hexa&nbsp;: 97C00E
- Bleu Foncé (texte) code hexa&nbsp;: 0057A6
- Gris (ombre) code hexa&nbsp;: BFBFBF

Police de Caractères par défaut&nbsp;: Verdana<br>
Taille par défaut&nbsp;: 11pt

[Retour au Sommaire](#sommaire)

##Contrainte d’organisation
Au moins un membre de chaque équipe doit participer aux décisions prisent sur le projet général.

[Retour au Sommaire](#sommaire)
