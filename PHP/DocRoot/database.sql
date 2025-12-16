CREATE DATABASE market;

USE market;

CREATE TABLE utenti(
    idUtente INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(16),
    sname VARCHAR(16),
    eMail VARCHAR(16),
    pwd VARCHAR(32),
    PRIMARY KEY(idUtente)
);

CREATE TABLE prodotti(
    idProdotto INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(16),
    prezzo INT,
    qt INT,
    PRIMARY KEY(idProdotto)
);

CREATE TABLE vedite(
    idVendite INT AUTO_INCREMENT NOT NULL,
    idUtente INT,
    PRIMARY KEY(idVendite),
    Foreign Key (idUtente) REFERENCES utenti(idUtente)
);

CREATE TABLE prodottiVendite(
    idProdVen INT AUTO_INCREMENT NOT NULL,
    idVendite INT,
    idProdotto INT,
    PRIMARY KEY(idProdVen),
    Foreign Key (idVendite) REFERENCES vedite(idVendite),
    Foreign Key (idProdotto) REFERENCES prodotti(idProdotto)
);