-- Affiche le nom du fournisseur, le numero du fournisseur, le numero de commande, le code article du produit, le produit
-- On affiche à ce moment ces données pour le fournisseur 9120

SELECT fournis.nomfou, fournis.numfou, entcom.numcom, produit.codart, produit.libart
FROM fournis
INNER JOIN vente
	ON fournis.numfou=vente.numfou
INNER JOIN produit
	ON vente.codart=produit.codart
INNER JOIN entcom
	ON entcom.numfou=fournis.numfou
WHERE fournis.numfou = 9120
;

-- Les commandes du fournisseur 9120

SELECT entcom.numcom, entcom.numfou
FROM entcom
WHERE entcom.numfou = 9120
;

-- Liste des fournisseurs qui ont déja passés commande 

SELECT entcom.numfou
FROM entcom
WHERE entcom.datcom < CURDATE()
GROUP BY entcom.numfou
;

-- Affiche le numero du fournisseur et le nombre de commandes qu'il a passé

SELECT entcom.numfou, COUNT(entcom.numcom) AS nbre_commande
FROM entcom
GROUP BY(entcom.numfou)
;

-- Affiche le n°produit, le libélé, le stock actuel, le stock d alerte, la quantité annuelle 
-- avec stock actuel inferieur a stock d alerte et quantité annuelle inférieure à 1000

SELECT produit.codart AS code_produit, produit.libart AS libelle, produit.stkphy AS stock, produit.stkale AS stock_alerte, produit.qteann AS quantité_annuelle
FROM produit
WHERE produit.stkphy<=produit.stkale AND produit.qteann < 1000
;

-- Liste des fournisseurs dans le 75,78,92,77 triés par departement decroissant et ordre alphabétique

SELECT fournis.nomfou AS Nom, fournis.numfou AS Id, fournis.posfou AS Departement
FROM fournis
WHERE fournis.posfou IN (75014, 78250, 92200)
ORDER BY fournis.posfou DESC, fournis.nomfou ASC 
;

-- Liste des commandes passées aux mois de Mars ou Avril*

SELECT entcom.numcom
FROM entcom
WHERE MONTH(entcom.datcom) IN (03,04)
;

-- Liste les commandes du jour qui ont des observations particulières, on aurait du utiliser IS NOT NULL mais la base est male faite...

SELECT entcom.numcom, entcom.datcom, entcom.obscom
FROM entcom
WHERE entcom.obscom != ''
;

-- Liste le total de la commande pour chaque commande

SELECT ligcom.numcom, sum(ligcom.qtecde * ligcom.priuni) AS Prix
FROM ligcom
GROUP BY ligcom.numcom
;


-- Numero de commande, prix total des commandes à moins de 1000 articles commandés et dont le prix total dépasse 10000

SELECT ligcom.numcom AS num_com, sum(ligcom.qtecde * ligcom.priuni) AS prix
FROM ligcom
WHERE ligcom.qtecde < 1000
GROUP BY ligcom.numcom
HAVING sum(ligcom.qtecde * ligcom.priuni) >10000
;

-- Affiche le nom du fournisseur, le num de commande et la date

SELECT fournis.nomfou AS fournisseur, entcom.numcom AS numero_commande, entcom.datcom AS date_commande
FROM fournis
INNER JOIN entcom
	ON fournis.numfou=entcom.numfou
;

-- Produit avec urgent, numero de commande, nom fournisseur, libellé produit, sous total

SELECT entcom.numcom AS Commande, entcom.obscom AS Observation,fournis.nomfou AS Fournisseur, produit.libart AS Produit,ligcom.qtecde * ligcom.priuni AS Total
FROM entcom
INNER JOIN fournis
	ON entcom.numfou=fournis.numfou
INNER JOIN ligcom
	ON entcom.numcom=ligcom.numcom
INNER JOIN produit
	ON ligcom.codart=produit.codart
WHERE entcom.obscom LIKE '%urgente%'
;

-- Augmentation de 4% du prix1 et de 2% du prix2 du fournisseur 9180

UPDATE vente
SET vente.prix1=vente.prix1 + 0.4 * vente.prix1, vente.prix2=vente.prix2 + 0.2 * vente.prix2
WHERE vente.numfou = 9180
;

