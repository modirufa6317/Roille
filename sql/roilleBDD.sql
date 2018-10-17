DROP DATABASE IF EXISTS Roille;
 
CREATE DATABASE Roille;
 
USE Roille;
 
CREATE TABLE Agences
(
    code_ag INT(3) AUTO_INCREMENT NOT NULL,
    nom_ag VARCHAR(25) NOT NULL,
    adresse_ag VARCHAR(50) NOT NULL,
    email_ag VARCHAR(30) NOT NULL,
    tel_ag VARCHAR(10) NOT NULL,
    cp_ag VARCHAR(25) NOT NULL,
    ville_ag VARCHAR(25) NOT NULL,
    representant VARCHAR(25) NOT NULL,
    PRIMARY KEY (code_ag)
);
 
CREATE TABLE Clients (
    ref_cli INT(3) AUTO_INCREMENT NOT NULL,
    code_ag INT(3),
    nom_cli VARCHAR(25) NOT NULL,
    prenom_cli VARCHAR(25) NOT NULL,
    mdp_cli VARCHAR(25) NOT NULL,
    adresse_cli VARCHAR(50) NOT NULL,
    cp_cli VARCHAR(8) NOT NULL,
    email_cli VARCHAR(30) NOT NULL,
    ville_cli VARCHAR(25) NOT NULL,
    tel_cli VARCHAR(10) NOT NULL,
    PRIMARY KEY(ref_cli),
    FOREIGN KEY(code_ag) REFERENCES Agences(code_ag)
);
  
CREATE TABLE Commandes_contrats(
    ref_comct INT(3) AUTO_INCREMENT NOT NULL,
    ref_cli INT(3) NOT NULL,
    tarif_location FLOAT(7,2) NOT NULL,
    date_deb DATE NOT NULL,
    date_fin DATE NOT NULL, 
    montant_tva FLOAT(6,2) NOT NULL,
    montant_ht FLOAT(8,2) NOT NULL,
    montant_ttc FLOAT(8,2) NOT NULL,
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
    secteur VARCHAR(30) NOT NULL,
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
    usagev VARCHAR(30) NOT NULL,
    matricule VARCHAR(30) NOT NULL,
    libelle VARCHAR(25),
    PRIMARY KEY (code_cat)
);
 
CREATE TABLE Materiels(
    ref_mat INT(3) AUTO_INCREMENT NOT NULL,
    code_cat INT(3) NOT NULL,
    nom_mat VARCHAR(25) NOT NULL,
    type_mat VARCHAR(25) NOT NULL,
    prix_unitaire FLOAT(6,2) NOT NULL,
    desc_mat TEXT NOT NULL,
    qte_stock INT(6) NOT NULL,
    caution FLOAT(6,2) NOT NULL,
    PRIMARY KEY (ref_mat),
    FOREIGN KEY(code_cat) REFERENCES Categories(code_cat)
);
 
CREATE TABLE Interventions(
    ref_inter INT(3) auto_increment NOT NULL,
    date_inter DATE NOT NULL,
    type_inter ENUM('installation', 'entretien', 'reparation') NOT NULL,
    motif_inter TEXT NOT NULL,
    tarif_inter FLOAT(6,2) NOT NULL,
    PRIMARY KEY (ref_inter)
);
 
CREATE TABLE Techniciens(
    ref_tech INT(3) auto_increment NOT NULL,    
    nom_tech VARCHAR(25) NOT NULL,
    prenom_tech VARCHAR(25) NOT NULL,
    qualification VARCHAR(30) NOT NULL,
    PRIMARY KEY (ref_tech)
);
 
CREATE TABLE Paniers(
    ref_comct INT(3) NOT NULL,
    ref_mat INT(3) NOT NULL,
    qte_mat INT(4) NOT NULL,
    PRIMARY KEY (ref_comct,ref_mat),
    FOREIGN KEY (ref_mat) REFERENCES Materiels(ref_mat),
    FOREIGN KEY (ref_comct) REFERENCES Commandes_contrats(ref_comct)
);
 
CREATE TABLE Plannings(
    ref_mat INT(3) NOT NULL,
    ref_tech INT(3) NOT NULL,
    ref_inter INT(3) NOT NULL,
    date_deb DATE NOT NULL,
    date_fin DATE,
    PRIMARY KEY (ref_mat,ref_tech,ref_inter,date_deb),
    FOREIGN KEY (ref_mat) REFERENCES Materiels(ref_mat),
    FOREIGN KEY (ref_tech) REFERENCES Techniciens(ref_tech),
    FOREIGN KEY (ref_inter) REFERENCES Interventions(ref_inter)
);

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

