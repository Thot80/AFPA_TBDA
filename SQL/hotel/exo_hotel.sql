-- 1 - Afficher la liste des hôtels. Le résultat doit faire apparaître le nom de l’hôtel et la ville
SELECT hotel.hot_nom AS nom_hotel, hotel.hot_ville AS Ville 
FROM hotel ;

-- 2 - Afficher la ville de résidence de Mr White Le résultat doit faire apparaître le nom, le prénom, et l'adresse du client

SELECT client.cli_nom AS Nom, client.cli_prenom AS Prenom, client.cli_ville AS Adresse
FROM client
WHERE client.cli_nom='White' ;

-- 3 - Afficher la liste des stations dont l’altitude < 1000 Le résultat doit faire apparaître le nom de la station et l'altitude

SELECT station.sta_nom AS Nom, station.sta_altitude AS Altitude
FROM station
WHERE station.sta_altitude < 1000 ;

-- 4 - Afficher la liste des chambres ayant une capacité > 1 Le résultat doit faire apparaître le numéro de la chambre ainsi que la capacité

SELECT chambre.cha_numero AS Numero_chambre, chambre.cha_capacite AS Capacite
FROM chambre
WHERE chambre.cha_capacite >1 ;

-- 5 - Afficher les clients n’habitant pas à Londre Le résultat doit faire apparaître le nom du client et la ville

SELECT client.cli_nom AS Nom, client.cli_ville AS Ville
FROM client
WHERE client.cli_ville != 'Londre' ;

-- 6 - Afficher la liste des hôtels située sur la ville de Bretou et possédant une catégorie>3 Le résultat doit faire apparaître le nom de l'hôtel, ville et la catégorie

SELECT hotel.hot_nom AS Nom, hotel.hot_categorie AS Categorie, hotel.hot_ville AS Ville
FROM hotel
WHERE hotel.hot_ville = 'Bretou' AND hotel.hot_categorie >3 ;

-- 7 - Afficher la liste des hôtels avec leur station Le résultat doit faire apparaître le nom de la station, le nom de l’hôtel, la catégorie, la ville

SELECT station.sta_nom AS Station, hotel.hot_nom AS Hotel, hotel.hot_categorie AS categorie, hotel.hot_ville AS Ville
FROM hotel
INNER JOIN station
	ON hotel.hot_sta_id = station.sta_id
;

-- 8 - Afficher la liste des chambres et leur hôtel Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre

SELECT hotel.hot_nom AS nom, hotel.hot_categorie AS categorie, chambre.cha_numero AS chambre, hotel.hot_ville AS ville
FROM hotel
INNER JOIN chambre
	ON hotel.hot_id=chambre.cha_hot_id
;

-- 9 - Afficher la liste des chambres de plus d'une place dans des hôtels situés sur la ville de Bretou 
-- Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre et sa capacité

SELECT hotel.hot_nom AS Hotel, hotel.hot_categorie AS Categorie, hotel.hot_ville AS Ville, chambre.cha_numero AS Chambre, chambre.cha_capacite AS Capacite
FROM hotel
INNER JOIN chambre
	ON hotel.hot_id = chambre.cha_hot_id
WHERE chambre.cha_capacite > 1
;


-- 10 - Afficher la liste des réservations avec le nom des clients Le résultat doit faire apparaître le nom du client, le nom de l’hôtel, la date de réservation
-- J'ai ajouté le num de chambre

SELECT client.cli_nom AS nom_client, hotel.hot_nom AS Hotel, chambre.cha_numero AS Chambre, reservation.res_date AS date_reservation
FROM reservation
INNER JOIN client
	ON reservation.res_cli_id = client.cli_id
INNER JOIN chambre
	ON reservation.res_cha_id=chambre.cha_id
INNER JOIN hotel
	ON chambre.cha_hot_id = hotel.hot_id
	;

    -- 11 - Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station 
    -- Le résultat doit faire apparaître le nom de la station, le nom de l’hôtel, le numéro de la chambre et sa capacité

SELECT station.sta_nom AS Station, hotel.hot_nom AS Hotel, chambre.cha_numero AS Chambre, chambre.cha_capacite AS Capacité
FROM chambre
INNER JOIN hotel
	ON chambre.cha_hot_id=hotel.hot_id
INNER JOIN station
	ON hotel.hot_sta_id=station.sta_id
;

-- 12 - Afficher les réservations avec le nom du client et le nom de l’hôtel 
-- Le résultat doit faire apparaître le nom du client, le nom de l’hôtel, la date de début du séjour et la durée du séjour

SELECT client.cli_nom AS Nom, hotel.hot_nom AS Hotel, reservation.res_date_debut AS Arrivée, datediff(reservation.res_date_fin,reservation.res_date_debut) AS durée
FROM reservation
INNER JOIN client
	ON reservation.res_cli_id=client.cli_id
INNER JOIN chambre
	ON reservation.res_cha_id=chambre.cha_id
INNER JOIN hotel
	ON chambre.cha_hot_id=hotel.hot_id
;


-- 13 - Compter le nombre d’hôtel par station
SELECT station.sta_nom, count(hotel.hot_id)
FROM station
INNER JOIN hotel
	ON station.sta_id=hotel.hot_sta_id
GROUP BY station.sta_nom
;

-- 14 - Compter le nombre de chambre par station

SELECT station.sta_nom, COUNT(chambre.cha_id) AS Nbre_chambre_station
FROM station
INNER JOIN hotel
	ON station.sta_id=hotel.hot_sta_id
INNER JOIN chambre
	ON hotel.hot_id=chambre.cha_hot_id
GROUP BY(station.sta_nom)
;

-- 15 - Compter le nombre de chambre par station ayant une capacité > 1

SELECT station.sta_nom, COUNT(chambre.cha_id) AS Nbre_chambre_station
FROM station
INNER JOIN hotel
	ON station.sta_id=hotel.hot_sta_id
INNER JOIN chambre
	ON hotel.hot_id=chambre.cha_hot_id
WHERE chambre.cha_capacite >1
GROUP BY(station.sta_nom)
;

-- 16 - Afficher la liste des hôtels pour lesquels Mr Squire a effectué une réservation

SELECT hotel.hot_nom, client.cli_nom
FROM client
INNER JOIN reservation
	ON client.cli_id=reservation.res_cli_id
INNER JOIN chambre
	ON reservation.res_cha_id=chambre.cha_id
INNER JOIN hotel
	ON hotel.hot_id=chambre.cha_hot_id
WHERE client.cli_nom='Squire'
;

-- 17 - Afficher la durée moyenne des réservations par station

SELECT station.sta_nom, AVG(DATEDIFF(reservation.res_date_fin,reservation.res_date_debut)) AS Duree_moy
FROM reservation
INNER JOIN chambre
	ON reservation.res_cha_id=chambre.cha_id
INNER JOIN hotel
	ON hotel.hot_id=chambre.cha_hot_id
INNER JOIN station
	ON hotel.hot_sta_id=station.sta_id
	GROUP BY(station.sta_nom)
;