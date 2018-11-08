DROP DATABASE IF EXISTS Roille;
 
CREATE DATABASE Roille;
 
USE Roille;
 
 -- créations des tables
CREATE TABLE Agences
(
    code_ag INT(3) AUTO_INCREMENT NOT NULL,
    nom_ag VARCHAR(25),
    adresse_ag VARCHAR(50),
    email_ag VARCHAR(30),
    tel_ag VARCHAR(10),
    cp_ag VARCHAR(25),
    ville_ag VARCHAR(25),
    representant VARCHAR(25),
    PRIMARY KEY (code_ag)
);
 
CREATE TABLE Clients (
    ref_cli INT(3) AUTO_INCREMENT NOT NULL,
    code_ag INT(3) NOT NULL,
    nom_cli VARCHAR(25),
    prenom_cli VARCHAR(25),
    mdp_cli VARCHAR(25),
    adresse_cli VARCHAR(50),
    cp_cli VARCHAR(8),
    email_cli VARCHAR(30),
    ville_cli VARCHAR(25),
    tel_cli VARCHAR(10),
    PRIMARY KEY(ref_cli),
    FOREIGN KEY(code_ag) REFERENCES Agences(code_ag)
);
  
CREATE TABLE Commandes_contrats(
    ref_comct INT(3) AUTO_INCREMENT NOT NULL,
    ref_cli INT(3) NOT NULL,
    tarif_location FLOAT(7,2),
    date_deb DATE,
    date_fin DATE, 
    montant_tva FLOAT(6,2),
    montant_ht FLOAT(8,2),
    montant_ttc FLOAT(8,2),
    PRIMARY KEY (ref_comct),
    FOREIGN KEY (ref_cli) REFERENCES Clients(ref_cli)
);
  
CREATE TABLE Categories(
    code_cat INT(3) AUTO_INCREMENT NOT NULL,
    libelle VARCHAR(25),
    PRIMARY KEY (code_cat)
);
 
CREATE TABLE machines(
    code_cat INT(3) AUTO_INCREMENT NOT NULL,
    secteur VARCHAR(30),
    libelle VARCHAR(25),
    PRIMARY KEY (code_cat)
);
 
CREATE TABLE outillage(
    code_cat INT(3) AUTO_INCREMENT NOT NULL,
    libelle VARCHAR(25),
    PRIMARY KEY (code_cat)
);
 
CREATE TABLE vehicules(
    code_cat INT(3) AUTO_INCREMENT NOT NULL,
    usagev VARCHAR(30),
    matricule VARCHAR(30),
    libelle VARCHAR(25),
    PRIMARY KEY (code_cat)
);
 
CREATE TABLE Materiels(
    ref_mat INT(3) AUTO_INCREMENT NOT NULL,
    code_cat INT(3) NOT NULL,
    nom_mat VARCHAR(25),
    prix_unitaire FLOAT(6,2),
    desc_mat TEXT,
    qte_stock INT(6),
    caution FLOAT(6,2),
    PRIMARY KEY (ref_mat),
    FOREIGN KEY(code_cat) REFERENCES Categories(code_cat)
);
 
CREATE TABLE Interventions(
    ref_inter INT(3) auto_increment NOT NULL,
    date_inter DATE,
    type_inter ENUM('installation', 'entretien', 'reparation'),
    motif_inter TEXT,
    tarif_inter FLOAT(6,2),
    PRIMARY KEY (ref_inter)
);
 
CREATE TABLE Techniciens(
    ref_tech INT(3) auto_increment NOT NULL,    
    nom_tech VARCHAR(25),
    prenom_tech VARCHAR(25),
    qualification VARCHAR(30),
    PRIMARY KEY (ref_tech)
);
 
CREATE TABLE Paniers(
    ref_comct INT(3) NOT NULL,
    ref_mat INT(3) NOT NULL,
    qte_mat INT(4),
    PRIMARY KEY (ref_comct,ref_mat),
    FOREIGN KEY (ref_mat) REFERENCES Materiels(ref_mat),
    FOREIGN KEY (ref_comct) REFERENCES Commandes_contrats(ref_comct)
);
 
CREATE TABLE Plannings(
    ref_mat INT(3) NOT NULL,
    ref_tech INT(3) NOT NULL,
    ref_inter INT(3) NOT NULL,
    date_deb DATE,
    date_fin DATE,
    PRIMARY KEY (ref_mat,ref_tech,ref_inter,date_deb),
    FOREIGN KEY (ref_mat) REFERENCES Materiels(ref_mat),
    FOREIGN KEY (ref_tech) REFERENCES Techniciens(ref_tech),
    FOREIGN KEY (ref_inter) REFERENCES Interventions(ref_inter)
);


-- création des triggers
drop trigger if exists MATERIEL_OUT;
DELIMITER //
CREATE TRIGGER MATERIEL_OUT
AFTER INSERT ON Paniers
FOR EACH ROW
BEGIN
	update Materiels
	set qte_stock=qte_stock-new.qte_mat
	where ref_mat=new.ref_mat;
END //
DELIMITER ;

drop trigger if exists MATERIEL_IN_insert;
DELIMITER //
create trigger MATERIEL_IN_insert
after insert on Commandes_contrats
for each row
begin
	if  new.date_fin<= curdate() then
		update Materiels
		set qte_stock=qte_stock+qte_mat
		where ref_mat=(select ref_mat from Paniers
		where ref_comct=new.ref_comct);
	end if;
end //
DELIMITER ;

drop trigger if exists MATERIEL_IN_update;
DELIMITER //
create trigger MATERIEL_IN_update
after update on Commandes_contrats
for each row
begin
	if  new.date_fin<= curdate() then
		update Materiels
		set qte_stock=qte_stock+qte_mat
		where ref_mat=(select ref_mat from Paniers
		where ref_comct=new.ref_comct);
	end if;
end //
DELIMITER ;

-- insertion des données
insert into Agences(code_ag) values
	(1);

insert into Clients(ref_cli, code_ag) values
	(1, 1);

insert into Commandes_contrats(ref_comct, ref_cli) values
	(1, 1),
	(2, 1);
	
insert into Categories(code_cat) values
	(1);
	
insert into machines(code_cat) values
	(1);

insert into vehicules(code_cat) values
	(1);

insert into outillage(code_cat) values
	(1);
	
insert into Materiels values
	(1, 1, "truc", 20.33, "ceci est un machin", 100, 150.00),
	(2, 1, "ekah", 41.65, "ceci est un cuab", 100, 150.00);

insert into Paniers values -- ref contrat -> ref matériel -> qte matériels commandé
	(1, 1, 10),
	(2, 2, 30);
/*
insert into Techniciens(ref_tech) values
	(1);

insert into Interventions(ref_inter) values
	(1);

insert into Plannings(ref_mat, ref_tech, ref_inter) values
	(1, 1, 1);
*/
	
-- autre modifications
update Commandes_contrats
set date_fin=CURRENT_DATE()
where ref_comct=1;

