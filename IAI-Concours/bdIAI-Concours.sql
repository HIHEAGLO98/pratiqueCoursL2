CREATE DATABASE inscription
USE INSCRIPTION;
CREATE TABLE etudiant(
	id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
	nom varchar(30) NOT NULL,
	prenom varchar(30) NOT NULL,
	sexe char(1),
	dateNaissance DATE,
	nationalite varchar(50),
	serie varchar(10),
	annee_Bac year,
	diplome varchar(80), 
	primary key(id)
	);

CREATE TABLE admin(
	id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
	nom varchar(30) NOT NULL,
	prenom varchar(30) NOT NULL,
	login varchar(50) NOT NULL,
	password varchar(8) NOT NULL,
	primary key(id)
	);
	
insert into admin (nom, prenom, login, password)
    values ('HIHEAGLO', 'Augustin', 'Ghust', '1234');

