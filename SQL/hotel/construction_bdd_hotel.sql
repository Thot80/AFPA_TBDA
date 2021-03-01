CREATE DATABASE hotel_jk ;

USE hotel_jk ;

-- Création de la table Hotel
CREATE TABLE Hotel (
    id INT UNSIGNED AUTO_INCREMENT ,
    id_station INT UNSIGNED ,
    capacite_chambre INT UNSIGNED NOT NULL ,
    categorie_hotel SMALLINT UNSIGNED NOT NULL ,
    nom_hotel VARCHAR(50) NOT NULL ,
    adresse_hotel VARCHAR(50) NOT NULL ,
    PRIMARY KEY(id)
)
ENGINE=INNODB ;


-- Création de la table station
CREATE TABLE Station (
	id INT UNSIGNED AUTO_INCREMENT ,
	nom_station VARCHAR(50) NOT NULL ,
	PRIMARY KEY(id)
	)
	ENGINE=INNODB ;

-- Ajout d'une contrainte étrangère sur la colonne id_station de la table Hotel, cette clef pointe sur l'id (clef primaire) de la table Station
ALTER TABLE Hotel
	ADD CONSTRAINT fk_id_station FOREIGN KEY (id_station)
	REFERENCES Station(id) ;


-- Création de la table Réservation, Condition sur les dates, j'ai choisi de mettre prix_total et montant_arrhes signés car l'hôtel peut être amené à devoir de l'argent à des clients
-- la clé primaire est constitué du couple de clés primaires id_chambre et id_client comme suggéré dans l'exercice, cependant ce couple n'est pas unique d'après mon expérience
-- je ne suis pas vraiment d'accord...
CREATE TABLE Reservation (
	
	id_chambre INT UNSIGNED NOT NULL ,
	id_client INT UNSIGNED NOT NULL ,
	date_debut DATE NOT NULL ,
	date_fin DATE NOT NULL CHECK(date_fin>date_debut) ,
	montant_arrhes INT ,
	prix_total INT ,
	CONSTRAINT pk_reservation PRIMARY KEY(id_chambre, id_client)
	)
	ENGINE=INNODB ;

-- Création de la table Client
CREATE TABLE Client (
    id INT UNSIGNED AUTO_INCREMENT ,
    adresse_client VARCHAR(50) NOT NULL ,
    nom_client VARCHAR(30) NOT NULL ,
    prenom_client VARCHAR(30) NOT NULL ,
    PRIMARY KEY(id)
)
ENGINE=INNODB ;


-- Création de la table Chambre, degre_confort smallint car 255 nuances suffisent, exposition (SS, SE, SO, NN, NO, NE, EE, OO), type_chambre (SMPL, DBLE, TWNI, SUIT)
CREATE TABLE Chambre (
	id INT UNSIGNED AUTO_INCREMENT ,
	capacite_chambre INT UNSIGNED NOT NULL ,
	degre_confort SMALLINT UNSIGNED NOT NULL ,
	exposition CHAR(2) ,
	type_chambre CHAR(4) ,
	id_hotel INT UNSIGNED NOT NULL ,
	PRIMARY KEY(id)
)
ENGINE=INNODB ;

-- On modifie la table Chambre pour y ajouter une clé étrangère qui fait référence à l'id de Hotel
ALTER TABLE Chambre
ADD CONSTRAINT fk_id_hotel FOREIGN KEY(id_hotel) REFERENCES Hotel(id) ;


-- On modifie la table Reservation pour y ajouter 2 clés étrangères
ALTER TABLE Reservation
ADD CONSTRAINT fk_id_chambre FOREIGN KEY(id_chambre) REFERENCES Chambre(id) ,
ADD CONSTRAINT fk_id_client FOREIGN KEY(id_client) REFERENCES Client(id) ;