CREATE DATABASE OpereMuseiArtisti;

USE OpereMuseiArtisti;

CREATE TABLE Musei(
    NomeM VARCHAR(16) NOT NULL,
    Citta VARCHAR(16),
    Indirizzo VARCHAR(16),
    NomeD VARCHAR(16),
    PRIMARY KEY(NomeM)
);

CREATE TABLE Artisti(
    NomeA VARCHAR(16) NOT NULL,
    DataN DATE,
    DataM DATE,
    PRIMARY KEY(NomeA)
);

CREATE TABLE Opere(
    IDOpere INT AUTO_INCREMENT NOT NULL,
    Anno YEAR,
    Titolo VARCHAR(16),
    Dipinto BOOLEAN,
    Scultura BOOLEAN,
    NomeA VARCHAR(16) NOT NULL,
    NomeM VARCHAR(16) NOT NULL,
    PRIMARY KEY(IDOpere),
    Foreign Key (NomeA) REFERENCES (Artisti),
    Foreign Key (NomeM) REFERENCES (Musei)
);

CREATE TABLE Personaggi(
    IDOpere INT NOT NULL,
    IDPeronaggio INT AUTO_INCREMENT NOT NULL,
    PRIMARY KEY(IDOpere, IDPeronaggio),
    Foreign Key (IDOpere) REFERENCES (Opere)
);

CREATE TABLE Dipinto(
    IDOpere INT NOT NULL,
    TipoP VARCHAR(16);
    
);