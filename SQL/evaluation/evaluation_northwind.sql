-- 1 Liste des contacts français
-- On travail sur la table Custommers, on affiche la liste des contacts français

SELECT customers.CompanyName AS Société, customers.ContactName AS Contact, customers.ContactTitle AS Fonction, customers.Phone AS Téléphone
FROM customers
WHERE customers.Country LIKE '%France%'
;

-- 2 Produits vendus par le fournisseur "Exotic liquids"
-- J'ai choisi de faire un INNER JOIN entre les tables Products et Suppliers pour pouvoir mettre une condition WHERE qui porte sur le nom de la companie
-- et ne pas avoir besoin de retrouver son id 

SELECT products.ProductName AS Produit, products.UnitPrice AS Prix
FROM products
INNER JOIN suppliers
	ON products.SupplierID=suppliers.SupplierID
WHERE suppliers.CompanyName = 'Exotic Liquids'
;

-- 3 Nombre de produits vendus par les fournisseurs Français dans l'ordre décroissant
-- WHERE puis GROUP BY puis ORDER BY, ordre à respecter

SELECT suppliers.CompanyName AS Fournisseur, COUNT(products.ProductID) AS Nbre_Produit
FROM suppliers
INNER JOIN products
	ON suppliers.SupplierID=products.SupplierID
WHERE suppliers.Country LIKE '%France%'
GROUP BY(suppliers.CompanyName)
ORDER BY Nbre_Produit DESC 
;

-- 4 Liste des clients Français avec plus de 10 commandes

-- On travaille sur l'intersection de 2 tables, on met nos condition, on compte et on groupe, condition sur le groupe

SELECT customers.CompanyName AS CLIENT, COUNT(orders.OrderID) AS Nbre_Commandes
FROM customers
INNER JOIN orders
	ON customers.CustomerID=orders.CustomerID
WHERE customers.Country LIKE '%France%'
GROUP BY(customers.CompanyName)
HAVING Nbre_Commandes >10
;

-- 5 Liste des clients ayant un chiffre d'affaires > 30 000
-- On fait la somme sur une opération entre 2 colonnes, GROUP BY sur 2 colonnes car sinon la taille des différents éléments dans le select n'est plus
-- compatible (plus de lignes pays que de lignes autres), condition sur le CA, classement par ordre decroissant

SELECT customers.CompanyName AS Clients, SUM(`order details`.UnitPrice * `order details`.Quantity) AS CA, customers.Country AS Pays
FROM customers
INNER JOIN orders
	ON customers.CustomerID=orders.CustomerID
INNER JOIN `order details`
	ON orders.OrderID=`order details`.OrderID
GROUP BY Clients, Pays
HAVING CA>30000
ORDER BY CA DESC
;


-- 6 Liste des pays dont les clients ont passé commande de produits fournis par "Exotic Liquids"
-- On fait en sorte de relier les tables Customers et Suppliers, on affiche les pays distincts qui ont commandés chez "Exotic Liquids", on classe par ordre alphabétique
-- '' sert a forcer les choses, sert ici a utiliser order details comme table malgrès l'espace

SELECT DISTINCT customers.Country AS Pays
FROM customers
INNER JOIN orders
	ON customers.CustomerID=orders.CustomerID
INNER JOIN `order details`
	ON orders.OrderID=`order details`.OrderID
INNER JOIN products
	ON `order details`.ProductID=products.ProductID
INNER JOIN suppliers
	ON products.SupplierID=suppliers.SupplierID
WHERE suppliers.CompanyName LIKE '%Exotic Liquids%'
ORDER BY Pays
;

-- 7 Montant des ventes de 1997
-- Je ne suis pas surt de comprendre pourquoi la condition WHERE n'a pas besoin d'être dans une sous requête... J'ai essayé d'écrire la même chose avec une sous requête
-- mais je n'ai pas réussi...

SELECT SUM(`order details`.UnitPrice * `order details`.Quantity) AS Montant_Ventes_97
	FROM orders
	INNER JOIN `order details`
		ON orders.OrderID=`order details`.OrderID
WHERE YEAR(orders.OrderDate)=1997
; 

-- Montant des ventes de 1997 mois par mois
-- Il a suffit de modifier légèrement la requête précédente, notons l'usage des fonction YEAR() et MONTH(), bien pratiques !

SELECT MONTH(orders.OrderDate) AS Mois_97, SUM(`order details`.UnitPrice * `order details`.Quantity) AS Montant_Ventes_97
	FROM orders
	INNER JOIN `order details`
		ON orders.OrderID=`order details`.OrderID
WHERE YEAR(orders.OrderDate)=1997
GROUP BY MONTH(orders.OrderDate)
; 

-- 9 Depuis quelle date le client "Du monde entier" n'a plus commandé ?
-- La fonction DATE() extrait la date, MAX() sélectionne la plus grande, la dernière donc

SELECT MAX(date(orders.OrderDate)) AS Dernière_commande_Du_Monde_Entier
FROM orders
INNER JOIN customers
	ON orders.CustomerID=customers.CustomerID
WHERE customers.CompanyName LIKE '%Du monde entier%' 
;

-- 10 Quel est le délai moyen de livraison en jours ?
-- Ici j'ai imbriqué une sous requête car j'avais un message d'erreur si j'essayais d'utiliser la fonction ROUND() directement
-- dans le 1er SELECT

SELECT
ROUND(Délai_Moyen_Livraison_Jours) AS Délai_Moyen_Livraison_Jours
FROM(
	SELECT AVG(DATEDIFF(orders.ShippedDate, orders.OrderDate)) AS Délai_Moyen_Livraison_Jours
	FROM orders
) AS Moy 
;