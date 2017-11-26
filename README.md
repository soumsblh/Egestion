Ce site est destiné à la gestion des bien matériels de l'epsi /oss/wis .

Quelques consignes à respecter afin d'avoir un code lisible et fonctionnel par tous

Ecrire en anglais, sauf les commentaires

Dans le dossier Controller :

nommer les fichiers de la façon suivante DefaultController.php
nommer les class de la façon suivante DefaultController
nommer les fonctions de la façon suivante deleteByArticle
Dans le dossier Model :
nommer les fichiers de la façon suivante DefaultModel.php
nommer les class de la façon suivante DefaultModel
nommer les fonctions de la façon suivante deleteByArticle


Quelques notion simple pour récupérer le Projet depuis la ligne commande 

/* Récupérer le Projet /*
git clone https://github.com/boulouh/Egestion.git chemin/vers/mon_dossier

/* Créer un nouveau Projet /*
echo "# Nouveau Projet" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/boulouh/Egestion.git
git push -u origin master

git remote add origin https://github.com/boulouh/Egestion.git
git push -u origin master

…ou importer depuis une autre repository
You can initialize this repository with code from a Subversion, Mercurial, or TFS project.
"# EGESTION"  
