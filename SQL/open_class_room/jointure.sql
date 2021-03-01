
-- On sélectionne la colonne nom d la table Race, on la renome Race, jointure interne avec la Table Espece
-- grace aux colonnes id de Espece et espece_id de Race
-- Condition, le nom de l'espece est 'chien' la race contient 'berger'
SELECT Race.nom AS Race
FROM Race 
INNER JOIN Espece
	ON Espece.id=Race.espece_id
	WHERE Espece.nom_courant='chien' AND Race.nom LIKE '%berger%' ;


-- Selection des colonne Nom et date de naissance de la table Animal et nom de la table Race
-- Jointure externe des tables Animal et Race (pour que les lignes d'Animal qui n'ont pas de race renseignées apparaissent quand même)
-- Conditions, pas de renseignement sur le pelage
SELECT Animal.nom AS nom_animal, Animal.date_naissance, Race.nom AS race
FROM Animal
LEFT JOIN Race
    ON Animal.race_id = Race.id
WHERE (Race.description NOT LIKE '%poil%' 
        AND Race.description NOT LIKE '%robe%'
        AND Race.description NOT LIKE '%pelage%'
      )
      OR Race.id IS NULL;



-- Selection des chats et perroquet, classemnt par espece puis race
SELECT Espece.nom_courant AS espece, Espece.nom_latin, Race.nom AS race, Animal.sexe 
FROM Animal
INNER JOIN Espece
	ON Animal.espece_id = Espece.id
LEFT JOIN Race
	ON Animal.race_id = Race.id

WHERE Espece.nom_courant IN ('Chat', 'Perroquet amazone')
ORDER BY Espece, Race.nom
;

-- Objectif  Obtenir la liste des cjiennes dont on connait la race, en age de procréer (nées avant juilet 2010)
--           Afficher leurs nom date de naissance et race

SELECT Animal.nom AS nom_chienne, Animal.date_naissance, Race.nom AS race
FROM Animal
INNER JOIN Race
	ON Animal.race_id = Race.id
INNER JOIN Espece
	ON Animal.espece_id = Espece.id
WHERE Espece.nom_courant = 'chien' AND Animal.sexe = 'F' AND Animal.date_naissance < '2010-07-01'
;

-- Vous devez obtenir la liste des chats dont on connaît les parents, ainsi que le nom de ces parents.

SELECT Animal.nom, Pere.nom AS Papa, Mere.nom AS Maman
FROM Animal
INNER JOIN Animal AS Pere
    ON Animal.pere_id = Pere.id
INNER JOIN Animal AS Mere
    ON Animal.mere_id = Mere.id
INNER JOIN Espece
    ON Animal.espece_id = Espece.id
WHERE Espece.nom_courant = 'chat';